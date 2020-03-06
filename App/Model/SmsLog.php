<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class SmsLog extends Model
{

    protected $guarded = [];
    
    protected $appends = ['sender_name', 'sender_dp'];

    public function getSenderNameAttribute(){
        return $this->sender->fullName();
    }

    public function getSenderDpAttribute(){
        return $this->sender->dp()->file_name ?? null;
    }

    public function sender(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
