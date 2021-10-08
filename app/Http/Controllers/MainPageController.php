<?php

namespace App\Http\Controllers;

use App\Models\Games;
use App\Models\Separator;
use App\Models\Settings;
use App\Models\Slides;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class MainPageController extends Controller
{
    public function index(Games $games, Slides $slides, Separator $separator,Settings $settings)
    {
        $agent = new Agent();
        $version = $agent->isTablet();
//        dd($result);
        $result = [];
//            dd($slides->all());
        foreach ($slides->all() as $slide) {

            $name_slide = $slide->name;
            $game = $games->getGameById($slide->game_id);
//            dd($game);
            $result[$name_slide] = ['game' => $game, 'label' => $slide->label, 'rate' => $slide->rate,];
        }
//        dd($result);
        $data_for_big = array_slice($result, 0, 3);
        $data_for_small = array_slice($result, 3);
//        dd($data_for_big);
        $data_for_separator = $separator->find(1);
        $speed_for_big = $settings->where('name','big')->first()->speed;
        $speed_for_small = $settings->where('name','small')->first()->speed;
        return view('welcome', [
            'data_for_big' => $data_for_big,
            'data_for_small' => $data_for_small,
            'data_for_separator' => $data_for_separator,
            'version'=>$version,
            'speed_for_big'=>$speed_for_big,
            'speed_for_small'=>$speed_for_small
            ]);
    }

    public function getGamesByJsonParams(Request $request, Games $games,Slides $slides){
        dd($request->all());
        $agent = new Agent();
        $versionDevice = $agent->isTablet(); // boof
//        $platform = $agent->isiOS(); //bool
        $version = [$request->version];
        $platform = [$request->platform];

        $getGames = $games->when(!empty($platform), function ($query) use ($platform) {
            $query->whereIn('platform', $platform);
        })->when(!empty($version), function ($query) use ($version) {
            $query->whereIn('version', $version);
        })->when(!empty($published), function ($query) {
            $query->whereIn('published', ['yes']);
        })->when(!empty($sort_date), function ($query) {
             $query->orderBy('updated_at', 'desc');
        })
            ->get()->chunk(3);
        foreach ($getGames as $games) {
            foreach ($games as $game){
                if ($game->slider == 'big') dd($game);
            }
        }
        dd($getGames);
        foreach ($slides->all() as $slide) {

            $name_slide = $slide->name;
            $game = $games->getGameById($slide->game_id);
//            dd($game);
            $result[$name_slide] = ['game' => $game, 'label' => $slide->label, 'rate' => $slide->rate,];
        }
    }
}
