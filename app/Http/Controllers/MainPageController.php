<?php

namespace App\Http\Controllers;

use App\Models\Games;
use App\Models\Version;
use App\Models\Separator;
use App\Models\Settings;
use App\Models\Slides;
use App\Services\MainPageCollectAllDataService;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class MainPageController extends Controller
{


    /**
     * @var MainPageCollectAllDataService
     */
    private $allDataService;

    /**
     * @param MainPageCollectAllDataService $allDataService
     */
    public function __construct(MainPageCollectAllDataService $allDataService)
    {

        $this->allDataService = $allDataService;

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {

        return view('welcome', $this->allDataService->setAllDataMainPage($request));
    }


    /**
     * @param Request $request
     * @param Games $games
     * @return \Illuminate\Http\JsonResponse
     */
    public function getVersionByTechName(Request $request, Games $games): \Illuminate\Http\JsonResponse
    {

        $game_id = $request->game_id;
        $payment_version = $request->payment_version;

        if ($request->payment_version == 'freemium') {
            $payment_version = 'prem';
        } else {
            $payment_version = 'free';
        }

        $platform = $request->platform_version;
        if ($request->platform_version == 'amazon') {
            $platform = 'amazone';
        }
        if ($request->platform_version == 'huawei') {
            $platform = 'android';
        }
        $tech_name = $game_id . '.' . $platform . '.' . $payment_version;
        $game = $games->where('tech_name', $tech_name)->first();

        if (!empty($game)) return response()->json(['version' => $game->patch_version]);
        else return response()->json([
            'errorCode' => 1,
            'errorDesc' => 'Game not found'
        ]);


    }


    /**
     * @param Games $games
     * @param Separator $separator
     * @param Settings $settings
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function forTest(Games $games, Separator $separator, Settings $settings, Request $request)
    {

        return view('welcome', $this->allDataService->setAllDataMainPage($request));

    }



}
