<?php

namespace App\Models;

use App\Services\AdminUploadImageService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Games extends Model
{
    use HasFactory;
    protected $fillable= ['name','slider','published','version','platform','link','image_name',"label","rate","slot","tech_name"];

    public function getDataGameById($id){
        return $this->where('id',$id)->first();
    }
    public function updateGame($data,$id)
    {
        $game = $this->where('id',$id)->first();
        $game->update($data);

        return $data['name'];

    }
    public function getName($id){
        return $this->where('id',$id)->first()->name;
    }
    public function getGameById($id){
        return $this->where('id',$id)->first();
    }
}
