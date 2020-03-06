<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TaskboardCardFile extends Model
{
    protected $guarded = [];

    public function taskboardCard() {
        return $this->belongsTo(TaskboardCard::class,"taskboard_card_id");
    }

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
