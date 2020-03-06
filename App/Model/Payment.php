<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\StoreAudit;
use App\Traits\ActivityTrait;
use App\User;

class Payment extends Model
{
   // use ActivityTrait;
   use StoreAudit;
    protected static $recordEvents= ['created','updated'];

	protected $guarded = [];
	
   public function order()
   {
   	return $this->belongsTo(Order::class);
   }
   
   public function creator()
   {
      return $this->belongsTo(User::class, 'userc_id', 'id')->where('is_deleted', 0);
   }
}
