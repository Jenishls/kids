<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AccountAddress extends Model
{
	protected $guarded = [];
    public function address()
    {
    	return $this->hasOne(Address::class,'id','address_id');
    }
}
