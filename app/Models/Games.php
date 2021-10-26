<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Games extends Model
{
    use HasFactory;
    protected $fillable= ['name','slider','published','version','platform','link','image_name'];



    public function store_new_game($name,$platform,$version,$slider,$published,$link,$image_path,$tech_name,$path_ipad){

        $game = new Games();
        $game->name = $name;
        $game->slider = $slider;
        $game->published = $published;
        $game->version = $version;
        $game->platform = $platform;
        $game->link = $link;
        if ($path_ipad !='no'){
            $game->image_name_ipad = $path_ipad;
        }
        $game->image_name = $image_path;
        $game->tech_name = $tech_name;
        $game->save();
    }
    public function getDataGameById($id){
        return $this->where('id',$id)->first();
    }
    public function updateGame($data,$tech_name,$path_ipad)
    {
        $game = $this->where('id',$data['id'])->first();
//        dd($path_ipad);
        if (array_key_exists('image', $data)){
//            Storage::disk('public')->delete($game->image_name);
            $game->update([
                'name'=>$data['title'],
                'slider'=>$data['slider'],
                'published'=>$data['published'],
                'version'=>$data['version'],
                'platform'=>$data['platform'],
                'link'=>$data['link'],
                'image_name'=>$data['path'],
                'image_name_ipad'=>$path_ipad,
                'tech_name'=>$tech_name,
            ]);
        }else{
            $game->update([
                'name'=>$data['title'],
                'slider'=>$data['slider'],
                'published'=>$data['published'],
                'version'=>$data['version'],
                'platform'=>$data['platform'],
                'link'=>$data['link'],
                'image_name_ipad'=>$path_ipad,
                'tech_name'=>$tech_name,]);
        }

    }
    public function getName($id){
        return $this->where('id',$id)->first()->name;
    }
    public function getGameById($id){
        return $this->where('id',$id)->first();
    }
}
