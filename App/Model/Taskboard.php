<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Taskboard extends Model
{
    protected  $guarded = [];

    public function taskboardList(){
        return $this->hasMany(TaskboardList::class)->where('is_deleted',0);
    }

    public function members() {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
