<?php

namespace App\Model;

use App\Model\Lookup\Lookup;
use Illuminate\Database\Eloquent\Model;

class TaskboardList extends Model
{
    protected $guarded = [];
    public function taskboard(){
        return $this->belongsTo(Taskboard::class,'taskboard_id');
    }
    public function status(){
        return $this->belongsTo(Lookup::class,"status_id","id");
    }
    public function cards(){
        return $this->hasMany(TaskboardCard::class)->where('is_deleted',0)->orderBy("seq_no","asc");
    }
}
