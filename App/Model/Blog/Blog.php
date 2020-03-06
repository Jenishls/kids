<?php

namespace App\Model\Blog;

use App\Model\Category;
use Illuminate\Database\Eloquent\Model;
use App\Model\File;
use Illuminate\Database\Eloquent\Relations\Relation;

class Blog extends Model
{
    protected $guarded = [];
    protected $appends=['hasFile'];

    public static function boot()
    {
        parent::boot();

        Relation::morphMap([
            'blogs' => static::class
        ]);
    }

    public function files()
    {
        // return $this->hasOne(File::class, 'table_id', 'id')->where('table_name', 'blogs')->where('type', 'blog');
        return $this->morphMany(File::class, 'fileable', 'table_name', 'table_id');
    }
    public function file()
    {
        // return $this->hasOne(File::class, 'table_id', 'id')->where('table_name', 'blogs')->where('type', 'blog');
        return $this->morphOne(File::class, 'fileable', 'table_name', 'table_id');
    }

    public function getHasFileAttribute(){
        if($this->file){
            return true;
        }
        return false;
    }
    public function blogImage()
    {
        return $this->file->file_name;
    }

    public function category(){
        
        return $this->belongsTo(Category::class);
    }
}
