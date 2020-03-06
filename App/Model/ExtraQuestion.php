<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ExtraQuestion extends Model
{
    protected $guarded = [];

    public function extra_options()
    {
        return $this->hasMany(ExtrasStreetLevel::class, 'question_id');
    }

    /** Return the option (meaningful function name) */
    public function options(){
        return $this->extra_options()->orderBy('seq');
    }
}
