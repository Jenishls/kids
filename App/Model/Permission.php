<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $guarded = [];

    public function pages()
    {
        return $this->belongsToMany(Page::class, 'page_permissions', 'permission_id', 'page_id')->wherePivot('is_deleted', 0);
    }
}
