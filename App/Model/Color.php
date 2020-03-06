<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable = ["color",'seq_no','color_code','image'];
}
