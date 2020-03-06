<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class InvoiceHead extends Model
{
   protected $guarded = [];

   public function client()
   {
      return $this->belongsTo(Client::class, 'client_id','id');
   }
   
   public function company()
   {
      return $this->belongsTo(Company::class, 'company_id','id');
   }
   
   public function order()
   {
      return $this->belongsTo(Order::class, 'order_id','id');
   }

   public function items(){
      return $this->hasMany(InvoiceItem::class);
   }

}
