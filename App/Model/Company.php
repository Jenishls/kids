<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

   protected $guarded = [];
   protected $appends=['isLatest'];
   public function clients()
   {
     return $this->belongsToMany('App\Model\Client', 'company_clients', 'company_id', 'client_id')
       ->where('clients.is_deleted', 0);
      // return $this->belongsToMany(Client::class, CompanyClient::class, 'client_id', 'id', 'id', 'id')
         
   }
   public function orders()
   {
      return $this->hasMany(Order::class)->where('orders.is_deleted', 0);
   }
   
   public function image()
   {
       return $this->morphOne(File::class, 'fileable', 'table_name', 'table_id')->where('type', 'profile');
   }

   public function payments()
   {
      return $this->hasManyThrough(Payment::class, Order::class, 'company_id', 'order_id', 'id', 'id');
   }

   public function branches()
   {
      return $this->hasMany(CompanyBranch::class)->where('is_deleted', 0);
   }
   public function account()
   {
      return $this->hasOne(Account::class, 'company_id', 'id');
   }

    public function notes()
    {
        return $this->morphMany(Note::class, 'noteable', 'table', 'table_id')->where('is_deleted', 0)->latest('updated_at');
    }

    public function address()
    {
        return $this->morphOne(Address::class, 'addressable', 'table', 'table_id')->where('is_deleted', 0);
    }

    public function contact()
    {
        return $this->morphOne(Contact::class, 'contactable', 'table', 'table_id')->where('is_deleted', 0);
    }
    public function attachments()
    {
      return $this->morphMany(File::class, 'fileable', 'table_name', 'table_id')->where('type', 'attachment')->where('files.is_deleted',0);
    }

   public function getIsLatestAttribute()
   {
      if($this->id == Company::latest('updated_at')->first()->id)
      {
         return true;

      }
      return false;
   }


   public function paymentProfiles(){
      return $this->hasMany(CustomerPaymentProfile::class, 'client_id', 'id');
  }

}
