<?php

namespace App\Services;

use App\Models\Games;

class GameService
{
    /**
     * @var Games
     */
    private $game;
    /**
     * @var FileManipulationService
     */
    private $fileManipulationService;

    public function __construct(Games $game,FileManipulationService $fileManipulationService)
    {

        $this->game = $game;
        $this->fileManipulationService = $fileManipulationService;

    }


    public function deleteGameWithFile($id)
    {
        $name = $this->game->getName($id);
        $this->fileManipulationService->deleteUploadImageGameById($id);
        $this->game->destroy($id);
        return $name;
    }
}
