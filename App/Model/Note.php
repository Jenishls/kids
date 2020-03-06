<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Note extends Model
{
    protected $guarded = [];

   public function createdUser()
   {
   	return $this->belongsTo(User::class,'userc_id','id')
   		->where('is_deleted',0);
   }
}
