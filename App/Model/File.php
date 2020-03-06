<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $guarded = [];

    public function fileType()
    {
        if (file_exists(storage_path($this->path))) {
               $extension =   mime_content_type(storage_path($this->path));     
               $exp = explode("/",$extension);
               return $exp[0];
        }
        return "file";
    }
}
