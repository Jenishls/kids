<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'category_id');
    }
}
