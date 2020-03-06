<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    public function users()
    {
        return $this->belongsToMany(\App\User::class, 'user_logs', 'user_id', 'id');
    }
}
