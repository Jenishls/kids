<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CompanyBranch extends Model
{
   protected $guarded = [];
   protected $table = 'company_brances';
   protected $dates = ['estd_date'];

   public function address()
   {
   		return $this->hasOne(Address::class,'id','address_id');
   }

   public function contact()
   {
   	return $this->hasOne(Contact::class,'id','contact_id');
   }

}
