<?php

namespace App\Model\Lookup;

use Illuminate\Database\Eloquent\Model;

class SectionLookup extends Model
{
    protected $guarded = [];

    public function lookups()
    {
        return $this->hasMany(Lookup::class, 'section_id', 'id')->orderBy('value');
    }
}
