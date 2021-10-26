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
        return [

            'name' => $data['name'],
            'slider' => $data['slider'],
            'published' => $data['published'],
            'version' => $data['version'],
            'platform' => $data['platform'],
            'link' => $data['link'],
            'image_name' => $this->uploadImageService->uploadImage($data),
            'image_name_ipad' => $this->uploadImageService->uploadImageIpad($data),
            'tech_name' => $data['tech_name'],
            "slot" => (empty($data['slot_big'])) ? $data['slot_small'] : $data['slot_big'],
            "label" => (empty($data['label'])) ? "NULL" : $data['label'],
            "rate" => (!empty($data['rate_big'])) ? $data['rate_big'] : $data['rate_small'],

        ];
    }


}
