<?php

namespace App\Model;

use App\Model\Lookup\Lookup;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];

    public function taskStatus() {
        return $this->belongsTo(Lookup::class,"status","id");
    }
    public function taskType() {
        return $this->belongsTo(Lookup::class,"task_type_id","id");
    }

    public function assignedBy(){
        return $this->belongsTo(User::class,"assigned_by","id");
    }

    public function project(){
        return $this->belongsTo(Project::class,"project_id","id");
    }

    public function members(){
        return $this->belongsToMany(User::class,"task_assignees")->withTimestamps();
    }

    public function files(){
        return $this->morphMany(File::class,'table',"table_name");
    }
}
