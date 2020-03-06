<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AddOn extends Model
{
    public function scopeStep1($query){
        return $query->where('step', 1);
    }

    public function scopeStep2($query){
        return $query->where('step', 2);
    }
}
