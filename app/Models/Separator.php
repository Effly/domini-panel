<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Separator extends Model
{
    protected $fillable = ['html_text','path_inst_img','path_facebook_img'];
    use HasFactory;
}
