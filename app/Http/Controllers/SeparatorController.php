<?php

namespace App\Http\Controllers;

use App\Models\Separator;
use App\Models\Version;
use App\Services\SeparatorCollectDataService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SeparatorController extends Controller
{

    /**
     * @var SeparatorCollectDataService
     */
    private $separatorCollectDataService;

    public function __construct(SeparatorCollectDataService $separatorCollectDataService)
    {
        $this->separatorCollectDataService = $separatorCollectDataService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Separator $separator)
    {

        return view('admin-panel.separator',['separator'=>$separator->where('id',1)->first()]);
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
    public function update(Request $request,Separator $separator,Version $version)
    {


        $separator->where('id',1)->update($this->separatorCollectDataService->setAllData($request));
        $version->patchVersion();
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
