<?php

namespace App\Http\Controllers;

use App\Models\Games;
use App\Models\Version;
use App\Models\Separator;
use App\Models\Settings;
use App\Models\Slides;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class MainPageController extends Controller
{
    public function index(Games $games, Separator $separator,Settings $settings,Request $request)
    {
//        dd($request->all());
        $agent = new Agent();
        $version = $agent->isTablet();
        $result = [];
        if ($request->payment_version == 'freemium'){
            $game_version = 'premium';
        }else{
            $game_version = 'free';
        }
        if ($request->platform_version == 'amazon'){
            $platform_version = 'amazone';
        }else{
            $platform_version = $request->platform_version;
        }

        $data_for_big = $games->where('published','yes')->where('slider','big')->where("platform",$platform_version)->where("version",$game_version)->orderBy('slot','ASC')->get();
//dd($data_for_big);
        $data_for_small = $games->where('published','yes')->where('slider','small')->where("platform",$platform_version)->where("version",$game_version)->orderBy('slot','ASC')->get();
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


    public function getVersionByTechName(Request $request,Version $version,Games $games){

        $game_id = $request->game_id;
        $payment_version = $request->payment_version;

        if ($request->payment_version == 'freemium'){
            $payment_version = 'prem';
        }else{
            $payment_version = 'free';
        }




        $platform = $request->platform_version;
        if ($request->platform_version == 'amazon'){
            $platform = 'amazone';
        }
        if ($request->platform_version == 'huawei'){
            $platform = 'android';
        }
        $tech_name = $game_id . '.' . $platform . '.' . $payment_version;
        $game = $games->where('tech_name',$tech_name)->first();
//        dd($game);
        if (!empty($game))  return response()->json(['version'=>$game->patch_version]);
        else return response()->json([
            'errorCode'=>1,
            'errorDesc'=>'Game not found'
        ]);


    }


    public function forTest(Games $games, Separator $separator,Settings $settings,Request $request)
    {

        $agent = new Agent();
        $version = $agent->isTablet();
        $platform_version = $request->platform;
        $game_version = $request->version;

        $data_for_big = $games->where('published','yes')->where('slider','big')->where("platform",$platform_version)->where("version",$game_version)->orderBy('slot','ASC')->get();

        $data_for_small = $games->where('published','yes')->where('slider','small')->where("platform",$platform_version)->where("version",$game_version)->orderBy('slot','ASC')->get();

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
}
