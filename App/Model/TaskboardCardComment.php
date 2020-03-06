<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class TaskboardCardComment extends Model
{
    protected $guarded = [];

    public function taskboardCard() {
        return $this->belongsTo(TaskboardCard::class,"taskboard_card_id");
    }
    public function user() {
        return $this->belongsTo(User::class,'userc_id');
    }
    public function userFullname() {
        return $this->user->fullname();
    }
}
