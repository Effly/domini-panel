<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class SeparatorCollectDataService
{

    /**
     * @var FileManipulationService
     */
    private $fileManipulationService;

    public function __construct(FileManipulationService $fileManipulationService)
    {

        $this->fileManipulationService = $fileManipulationService;

    }


    public function setAllData($request){
        if ($request->hasFile('inst_image')){
            $data['path_inst_img'] = $this->fileManipulationService->uploadImage('src',$request->file('inst_image'),'inst_image.svg');
        }
        if ($request->hasFile('facebook_image')){
            $data['path_facebook_img'] = $this->fileManipulationService->uploadImage('src',$request->file('facebook_image'),'facebook_image.svg');;
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

        return $data;
    }
}
