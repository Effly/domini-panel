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
     * @var FileManipulationService
     */
    private $fileManipulationService;


    /**
     * @param AdminLinkCheckService $adminLinkCheckService
     * @param AdminCollectGameData $adminCollectGameData
     * @param FileManipulationService $fileManipulationService
     */
    public function __construct(AdminLinkCheckService $adminLinkCheckService, AdminCollectGameData $adminCollectGameData, FileManipulationService $fileManipulationService)
    {
        $this->adminLinkCheckService = $adminLinkCheckService;
        $this->adminCollectGameData = $adminCollectGameData;
        $this->fileManipulationService = $fileManipulationService;
    }


    /**
     * @param Request $request
     * @param Games $games
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|string
     */
    public function index(Request $request, Games $games)
    {
        //Start ajax sort
        if ($request->ajax()) {
            return view('layouts.games', ['all_games' =>  $this->adminCollectGameData->sortDataAjax($games,$request), 'path' => $this->fileManipulationService->getPublicDirPath('Images')])->render();
        }
        //end ajax sort
        return view('admin-panel.index', ['all_games' => $games->paginate(20), 'path' => $this->fileManipulationService->getPublicDirPath('Images')]);
    }


    /**
     * @param AdminStoreRequest $request
     * @param Games $game
     * @param Version $version
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(AdminStoreRequest $request, Games $game, Version $version)
    {
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
        return view('admin-panel.show', ['data' => $game->getDataGameById($id), 'exist' => $this->fileManipulationService->hasFileDir($id)]);

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


}
