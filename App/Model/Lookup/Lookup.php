<?php

namespace App\Model\Lookup;

use Illuminate\Database\Eloquent\Model;

class Lookup extends Model
{
    protected $guarded = [];

    public function sections()
    {
        return $this->belongsTo(SectionLookup::class);
    }
}
