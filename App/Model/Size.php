<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $fillable = ["size",'high','long','wide','measurement_type','userc_id'];
}
