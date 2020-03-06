<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $guarded = [];

    public function permissions()
    {
        return $this->hasMany(Permission::class, 'page_id');
    }
}
