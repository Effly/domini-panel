<?php

namespace App\Services;

class AdminCollectGameData
{
    /**
     * @var FileManipulationService
     */
    private $uploadImageService;

    public function __construct(FileManipulationService $uploadImageService)
    {
        $this->uploadImageService = $uploadImageService;
    }

    public function setAllData($data): array
    {
        $data_for_model =  [
            'name' => $data['name'],
            'slider' => $data['slider'],
            'published' => $data['published'],
            'version' => $data['version'],
            'platform' => $data['platform'],
            'link' => $data['link'],
            'tech_name' => $data['tech_name'],
            "slot" => (empty($data['slot_big'])) ? $data['slot_small'] : $data['slot_big'],
            "label" => (empty($data['label'])) ? "NULL" : $data['label'],
            "rate" => (!empty($data['rate_big'])) ? $data['rate_big'] : $data['rate_small'],
        ];



        if (isset($data['image'])){
            $data_for_model['image_name'] =  $this->uploadImageService->uploadImage('Images/' . $data['platform'] . '/' . $data['tech_name'], $data['image'], $data['tech_name'] . '.png');
        }

        if (isset($data['image_for_ipad'])) {
            $data_for_model['image_name_ipad'] =  $this->uploadImageService->uploadImage('Images/' . $data['platform'] . '/' . $data['tech_name'], $data['image'], $data['tech_name'] . '_ipad.png');
        }

        return $data_for_model;

    }

    public function sortDataAjax($games,$request){
//        dd( $request->search_text[0]);
        return $games->when(!empty($request->platform), function ($query) use($request){
            $query->whereIn('platform', $request->platform);
        })->when(!empty($request->version), function ($query) use ($request) {
            $query->whereIn('version', $request->version);
        })->when(!empty($slider), function ($query) use ($request) {
            $query->whereIn('slider', $request->slider);
        })->when(!empty($request->slider), function ($query) use ($request) {
            $query->whereIn('published', $request->published);
        })->when(!empty($request->published), function ($query) use ($request) {
            if ($request->sort_date[0] == 'desc') $query->orderBy('updated_at', 'DESC');
            elseif ($request->sort_date[0] == 'asc') $query->orderBy('updated_at', 'ASC');
        })->when(!empty($request->search_text), function ($query) use ($request) {
            $query->where('name', 'LIKE', '%' . $request->search_text[0] . "%");
        })
            ->paginate(20);
//                ->get();
    }


}
