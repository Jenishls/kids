<?php

namespace App\Model\CMS;

use App\Model\Cms\CmsPost;
use App\Scopes\IsDeletedScope;
use Illuminate\Database\Eloquent\Model;

class CmsPage extends Model
{
    protected $guarded = [];
    protected $appends= ['slug'];
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new IsDeletedScope);
    }
    public function setPageNameAttribute($value)
    {
        return ucwords($value);
    }

    public function posts()
    {
        return $this->hasMany(CmsPost::class, 'page_id', 'id');
    }

    public function getSlugAttribute($value)
    {
        return str_slug($this->title);
    }
}
