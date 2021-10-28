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
        return $gameData->name;

    }

    public function uploadImage($path,$file,$filename){
            return Storage::disk('public')->putFileAs($path,$file,$filename);
    }


    public function hasFileDir($id){
       return Storage::disk('public')->has($this->game->getDataGameById($id)->image_name);
    }

    public function getPublicDirPath($name){
        return Storage::disk()->url($name);
    }

}
