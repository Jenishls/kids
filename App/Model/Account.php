<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
   
   protected $guarded = [];
   protected $dates = ['estd_date'];

   
   public function company()
   {
      return $this->belongsTo(Company::class,'company_id','id');
   }
   public function hOAddress()
   {
      return $this->hasOneThrough(Address::class,AccountAddress::class, 'account_id','id','id','address_id');
   }
   public function contact()
   {
   	return $this->hasOneThrough(Contact::class,AccountAddress::class, 'account_id','id','id','contact_id');
   }
   public function members(){
      return $this->morphMany(Member::class, 'table', 'table', 'table_id', 'id');
   }

   public function attachments()
   {
        return $this->morphMany(File::class, 'fileable', 'table_name', 'table_id')->where('type', 'attachment');
   }
}
