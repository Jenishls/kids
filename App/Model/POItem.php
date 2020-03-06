<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class POItem extends Model
{
    protected $guarded = [];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
