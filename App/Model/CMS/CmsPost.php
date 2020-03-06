<?php

namespace App\Model\Cms;

use App\Model\CMS\CmsFile;
use App\Model\CMS\CmsComment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class CmsPost extends Model
{
    protected $guarded = [];

    protected $with = ['files'];
    public static function boot()
    {
        parent::boot();

        Relation::morphMap([
            'cms_posts' => static::class
        ]);
    }
    public function comments()
    {
        return $this->hasMany(CmsComment::class, 'post_id', 'id');
    }

    public function file()
    {
        return $this->morphOne(CmsFile::class, 'fileable', 'table_name', 'table_id');
    }

    public function files()
    {
        return $this->morphMany(CmsFile::class, 'fileable', 'table_name', 'table_id');
    }

    // public function singleimage()
    // {
    //     $image = $this->file();
    //     return 
    // }
}
