<?php

namespace App\Http\Controllers;

use App\Models\Separator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SeparatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Separator $separator)
    {
        $separator = $separator->where('id',1)->first();
//        dd($separator->html_text);
        return view('admin-panel.separator',['separator'=>$separator]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Separator $separator)
    {
        $data = [];
        if ($request->hasFile('inst_image')){
            $path = Storage::disk('public')->putFileAs('src',$request->file('inst_image'),'inst_image.svg');
            $data['path_inst_img'] = $path;
        }
        if ($request->hasFile('facebook_image')){
            $path = Storage::disk('public')->putFileAs('src',$request->file('facebook_image'),'facebook_image.svg');
            $data['path_facebook_img'] = $path;
        }
        if ($request->has('inst_link')){
            $data['inst_link'] = $request->inst_link;
        }
        if ($request->has('facebook_link')){
            $data['facebook_link'] = $request->facebook_link;
        }
        if ($request->has('data')){
            $data['html_text'] = $request->data;
        }

        $check = $separator->where('id',1)->update($data);
//        dd($check);
        return redirect('/separator')->with('update', 'The separator was successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}