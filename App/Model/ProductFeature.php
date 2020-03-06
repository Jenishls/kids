<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductFeature extends Model
{
    protected $fillable = ['product_id','feature','userc_id'];
}
