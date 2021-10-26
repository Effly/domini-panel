<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    use HasFactory;

    public function patchVersion(){
        return $this->find(1)->increment('patch');
    }

    public function getVersion(){
        return $this->find(1);
    }
}
