<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use App\Models\Games;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
                $query->where('name','LIKE','%'.$search_text[0]."%");
            })
                ->paginate(20);
//                ->get();


            return view('layouts.games', ['all_games' => $all_games, 'path' => $path])->render();
        }
//        dd($all_games[0]->name);
        return view('admin-panel.index', ['all_games' => $all_games, 'path' => $path]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Games $game)
    {
        $messages = [
            'image.dimensions' => 'The image must have an aspect ratio of 1280x300',
            'image.max' => 'The image must be no more than 2 megabytes in size',
        ];
        $rules = [
            'image' => 'dimensions:min_width=1280,min_height=300|max:2048',
            'image_for_ipad' => 'required_if:slider,big'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)//                ->withInput()
                ;
        }

        $tech_name = $request->tech_title;
        $path = Storage::disk('public')->putFileAs('Images/' . $request->platform . '/' . $tech_name, $request->file('image'), $tech_name . '.png');
        if ($request->hasFile('image_for_ipad')) {
            $path_ipad = Storage::disk('public')->putFileAs('Images/' . $request->platform . '/' . $tech_name, $request->file('image_for_ipad'), $tech_name . '_ipad.png');
        } else $path_ipad = 'no';
        $res = $game->store_new_game($request->title, $request->platform, $request->version, $request->slider, $request->published, $request->link, $path, $tech_name, $path_ipad);

        return redirect('/admin')->with('create', 'The game with the name ' . $request->title . ' was successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Games $game, $id)
    {
        $data_game = $game->getDataGameById($id);
        $exist = Storage::disk('public')->has($data_game->image_name);
//        dd($exist);
        return view('admin-panel.show', ['data' => $data_game, 'exist' => $exist]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Games $game
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Games $game, Request $request)
    {
        $messages = [
            'image.dimensions' => 'The image does not match the aspect ratio for the selected slider',
            'image.max' => 'The image must be no more than 2 megabytes in size',
            'image_for_ipad.dimensions' => 'The image for ipad does not match the aspect ratio 1248x400.',
            'image_for_ipad.max' => 'The image must be no more than 2 megabytes in size',
        ];
        $rules = [
            'image_for_ipad' => 'required_if:slider,big|dimensions:width=1248,height=400|max:2048',
//            'image'=>'required_if:slider,big|dimensions:min_width=1920,min_height=400|max:2048',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        $validator->sometimes('image', 'required|dimensions:width=1920,height=400|max:2048', function ($input) {
            return $input->slider == 'big';
        });
        $validator->sometimes('image', 'required|dimensions:width=470,height=300|max:2048', function ($input) {
            return $input->slider == 'small';
        });
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $tech_name = $request->tech_title;
        if ($request->hasFile('image_for_ipad')) {
            $path_ipad = Storage::disk('public')->putFileAs('Images/' . $request->platform . '/' . $tech_name, $request->file('image_for_ipad'), $tech_name . '_ipad.png');
        } else $path_ipad = 'no';
        $data = $request->all();
        if ($request->has('image')) {
            $path = Storage::disk('public')->putFileAs('Images/' . $request->platform . '/' . $tech_name, $request->file('image'), $tech_name . '.png');
            $data['path'] = $path;
        }
//        dd($data);
        $name = $game->getName($request->id);
        $game->updateGame($data, $tech_name, $path_ipad);
        return redirect('/admin')->with('update', 'The game with the name ' . $name . ' was successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Games $game, $id)
    {
        $name = $game->getName($id);
//        dd($name);
        $game->destroy($id);
        return redirect()->back()->with('delete', 'The game with the name ' . $name . ' was successfully deleted');
    }

    public function show_create_page()
    {
        return view('admin-panel.create');
    }

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

    public function linkCheck(Request $request)
    {
        $link = $request->link;
        $client = new Client([
            'header' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/x-www-form-urlencoded'
            ],
            'verify' => false,
            'http_errors' => true
        ]);

//        $response = $client->get('https://laravel.com/87543');
        try {
            $client->request('GET', $link);
            return view('layouts.link', ['error' => 'no error']);
        } catch (ClientException $e) {

            $error = $e->getCode();
//            dd($error);
            return view('layouts.link', ['error' => $error]);

        }
    }
//'https://github.com/_abc_123_404'
}
