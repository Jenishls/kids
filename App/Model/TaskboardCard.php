<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TaskboardCard extends Model
{
    protected  $guarded = [];

    public function taskboardList(){
        return $this->belongsTo(TaskboardList::class,'taskboard_list_id');
    }

    public function attachments(){
        return $this->hasMany(TaskboardCardFile::class)->where('is_deleted',0);
    }

    public function comments() {
        return $this->hasMany(TaskboardCardComment::class)->with('user')->orderBy("created_at","desc")->where('is_deleted',0);
    }
}
