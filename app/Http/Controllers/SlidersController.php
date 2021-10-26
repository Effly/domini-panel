<?php

namespace App\Http\Controllers;

use App\Models\Games;
use App\Models\Settings;
use App\Models\Slides;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SlidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Games $games, Slides $slides, Settings $settings)
    {
        $publ_games_with_big_slider = $games->where('slider', 'big')->where('published', 'yes')->get();
        $publ_games_with_small_slider = $games->where('slider', 'small')->where('published', 'yes')->get();
        $slides = $slides->all();
        $speed_big = $settings->where('name', 'big')->first()->speed;
        $speed_small = $settings->where('name', 'small')->first()->speed;
        $labels = [
            'top_rated'=>Storage::disk('public')->exists('labels/top_rated.png'),
            'hot_realese'=>Storage::disk('public')->exists('labels/hot_realese.png'),
            'friends_favorite'=>Storage::disk('public')->exists('labels/friends_favorite.png'),

            '15'=>Storage::disk('public')->exists('labels/15.png'),
            '25'=>Storage::disk('public')->exists('labels/25.png'),
            '30'=>Storage::disk('public')->exists('labels/30.png'),
            '40'=>Storage::disk('public')->exists('labels/40.png'),
            'free_small'=>Storage::disk('public')->exists('labels/free_small.png'),
            'free_big'=>Storage::disk('public')->exists('labels/free_big.png'),
            'free_big_ipad'=>Storage::disk('public')->exists('labels/free_big_ipad.png'),


        ];
//        dd($slides[6]);
        return view('admin-panel.sliders', [
            'games_for_big' => $publ_games_with_big_slider,
            'games_for_small' => $publ_games_with_small_slider,
            'first_big' => $slides[0],
            'second_big' => $slides[1],
            'third_big' => $slides[2],
            'first_small' => $slides[3],
            'second_small' => $slides[4],
            'third_small' => $slides[5],
            'fourth_small' => $slides[6],
            'fifth_small' => $slides[7],
            'speed_small' => $speed_small,
            'speed_big' => $speed_big,
            'labels' => $labels

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slides $slide)
    {
//        dd($request->all());

        $slide->where('name', $request->slide)->update([
            'game_id' => $request->for_slide,
            'label' => $request->label,
            'rate' => $request->rate
        ]);
        return redirect('/sliders')->with('update', 'The slide was successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function updateSpeed(Request $request, Settings $setting)
    {
        $setting->where('name', $request->slider)->update(['speed' => $request->speed]);
        return redirect('/sliders')->with('update', 'The slider-speed was successfully updated');
    }

    public function updateLabel(Request $request)
    {
        $path = Storage::disk('public')->putFileAs('labels', $request->file('img'), $request->label_name . '.png');
        return redirect('/sliders')->with('update', 'The slide-label was successfully updated');
    }
}
