<?php

namespace App\Services;

use App\Models\Games;
use Illuminate\Support\Facades\Storage;

class FileManipulationService
{

    /**
     * @var Games
     */
    private $game;

    public function __construct(Games $game)
    {

        $this->game = $game;

    }

    public function deleteUploadImageGameById($id){
        $gameData = $this->game->getDataGameById($id);

        $dir_name = str_replace($gameData->tech_name.'.png','',$gameData->image_name);
        Storage::disk('public')->deleteDirectory($dir_name);
//        if (Storage::disk('public')->exists($gameData->image_name_ipad)) {
//            Storage::disk('public')->delete($gameData->image_name_ipad);
//        }

        return $gameData->name;

    }

    public function uploadImage($data){
        if (isset($data['image'])){
            return Storage::disk('public')->putFileAs('Images/' . $data['platform'] . '/' . $data['tech_name'], $data['image'], $data['tech_name'] . '.png');
        }
    }

    public function uploadImageIpad($data){
        if (isset($data['image_for_ipad'])) {
            return Storage::disk('public')->putFileAs('Images/' . $data['platform'] . '/' . $data['tech_name'], $data['image_for_ipad'], $data['tech_name'] . '_ipad.png');
        }
    }
}
