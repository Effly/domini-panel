<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminStoreRequest;
use App\Http\Requests\AdminUpdateRequest;
use App\Services\AdminCollectGameData;
use App\Services\AdminLinkCheckService;
use App\Services\AdminUploadImageService;
use App\Services\FileManipulationService;
use App\Services\GameService;
use Carbon\Carbon;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use App\Models\Games;
use App\Models\Version;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;
use Illuminate\Validation\Rule;


class AdminController extends Controller
{


    /**
     * @var AdminLinkCheckService
     */
    private $adminLinkCheckService;


    /**
     * @var AdminCollectGameData
     */
    private $adminCollectGameData;


    /**
     * @param AdminLinkCheckService $adminLinkCheckService
     * @param AdminCollectGameData $adminCollectGameData
     */
    public function __construct(AdminLinkCheckService $adminLinkCheckService, AdminCollectGameData $adminCollectGameData)
    {
        $this->adminLinkCheckService = $adminLinkCheckService;
        $this->adminCollectGameData = $adminCollectGameData;
    }


    /**
     * @param Request $request
     * @param Games $games
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|string
     */
    public function index(Request $request, Games $games)
    {
        $all_games = $games->paginate(20);
        $path = Storage::disk()->url('Images');
//        if(isset($request->value)) $all_games = $games->where('slider','big')->get();

        $platform = $request->platform;
        $version = $request->version;
        $slider = $request->slider;
        $published = $request->published;
        $sort_date = $request->sort_date;
        $search_text = $request->search_text;
        //Start ajax sort
        if ($request->ajax()) {
            $all_games = $games->when(!empty($platform), function ($query) use ($platform) {
                $query->whereIn('platform', $platform);
            })->when(!empty($version), function ($query) use ($version) {
                $query->whereIn('version', $version);
            })->when(!empty($slider), function ($query) use ($slider) {
                $query->whereIn('slider', $slider);
            })->when(!empty($published), function ($query) use ($published) {
                $query->whereIn('published', $published);
            })->when(!empty($sort_date), function ($query) use ($sort_date) {
                if ($sort_date[0] == 'desc') $query->orderBy('updated_at', 'DESC');
                elseif ($sort_date[0] == 'asc') $query->orderBy('updated_at', 'ASC');
            })->when(!empty($search_text), function ($query) use ($search_text) {
                $query->where('name', 'LIKE', '%' . $search_text[0] . "%");
            })
                ->paginate(20);
//                ->get();


            return view('layouts.games', ['all_games' => $all_games, 'path' => $path])->render();
            //end aja sort
        }
//        dd($all_games[0]->name);
        return view('admin-panel.index', ['all_games' => $all_games, 'path' => $path]);

    }


    /**
     * @param AdminStoreRequest $request
     * @param Games $game
     * @param Version $version
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(AdminStoreRequest $request, Games $game, Version $version)
    {

//        dd($data);

        $game->create($this->adminCollectGameData->setAllData($request->validated()));
        $version->patchVersion();
        return redirect('/admin')->with('create', 'The game with the name ' . $request->validated()['name'] . ' was successfully created');
    }


    /**
     * @param Games $game
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Games $game, $id)
    {
        $exist = Storage::disk('public')->has($game->getDataGameById($id)->image_name);
        return view('admin-panel.show', ['data' => $game->getDataGameById($id), 'exist' => $exist]);

    }


    /**
     * @param Games $game
     * @param AdminUpdateRequest $request
     * @param Version $version
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Games $game, AdminUpdateRequest $request, Version $version)
    {

        $version->patchVersion();
        return redirect('/admin')->with('update', 'The game with the name ' . $game->updateGame($this->adminCollectGameData->setAllData($request->validated()), $request->validated()['id']) . ' was successfully updated');
    }


    /**
     * @param GameService $gameService
     * @param $id
     * @param Version $version
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(GameService $gameService, $id, Version $version)
    {
        $version->patchVersion();
        return redirect()->back()->with('delete', 'The game with the name ' . $gameService->deleteGameWithFile($id) . ' was successfully deleted');
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show_create_page()
    {
        return view('admin-panel.create');
    }


    /**
     * @param Request $request
     * @return string|void
     */
    public function imageCheck(Request $request)
    {
//        dd($request->all());
        $messages = [
            'image.dimensions' => 'The image does not match the aspect ratio for the selected slider',
            'image.max' => 'The image must be no more than 2 megabytes in size',
            'image_for_ipad.dimensions' => 'The image for ipad does not match the aspect ratio 1248x400.',
            'image_for_ipad.max' => 'The image must be no more than 2 megabytes in size',
        ];
        $rules = [
            'image_for_ipad' => 'dimensions:width=1248,height=400|max:2048'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        $validator->sometimes('image', 'dimensions:width=1920,height=400|max:2048', function ($input) {
            return $input->slider == 'big';
        });
        $validator->sometimes('image', 'dimensions:width=470,height=300|max:2048', function ($input) {

            return $input->slider == 'small';
        });

        $errors = $validator->errors();
//        dd($validator->errors());
        if (!empty($errors)) return view('layouts.success', ['errors' => $errors])->render();
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function linkCheck(Request $request)
    {
        return view('layouts.link', ['error' => $this->adminLinkCheckService->checkLink($request->link)]);
    }
//'https://github.com/_abc_123_404'
//,Version $version

}
