<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\StoreAudit;
use App\Traits\ActivityTrait;
use App\User;
use Carbon\Carbon;

class Order extends Model
{
   use StoreAudit;
   protected static $recordEvents= ['created','updated'];
   
   public $table= 'orders';
   protected $appends= ['hasExtra'];
   public $with= ['detail'];
   protected $dates = ['estd_date','delivery_date','pickup_date'];
   protected $guarded = [];   

   public function setDeliveryDateAttribute($attribute){
      $this->attributes['delivery_date'] = strtotime($attribute)?date('Y-m-d', strtotime($attribute)):NULL;
   }
   
   public function setPickupDateAttribute($attribute){
      $this->attributes['pickup_date'] = strtotime($attribute)?date('Y-m-d', strtotime($attribute)):NULL;
   }

	public function detail(){
   	return $this->hasOne(OrderDetail::class);
   }
   
   public function package(){
   	return $this->hasOne(PackagePrice::class, 'id', 'package_id');
   }
   
   public function user()
   {
      return $this->belongsTo(Client::class, 'user_id','id');
   }
   
   public function client()
   {
      return $this->belongsTo(Client::class, 'client_id','id');
   }
   
   public function sales_representative()
   {
      return $this->belongsTo(User::class, 'sales_rep','id');
   }

   public function company()
   {
      return $this->belongsTo(Company::class,'company_id','id');
   }

	public function billingAddr(){
		return $this->hasOne(Address::class,'id','billing_addr_id');
   }
   
	public function shippingAddr(){
		return $this->hasOne(Address::class,'id','shipping_addr_id');
   }
   
   public function pickupAddr(){
		return $this->hasOne(Address::class,'id','pickup_addr_id');
   }
   
	public function deliveryAddr(){
		return $this->hasOne(Address::class,'id','delivery_addr_id');
   }
   
  public function items()
  {
    return $this->hasMany(OrderItem::class)->orderByDesc('id');
  }
  
  public function addOnItems()
  {
    return $this->hasMany(OrderItem::class)->where('is_addon', 1);
  }

  public function communication()
  {
    return $this->hasOne(OrderCommunication::class);
  }

  public function Payments()
  {
    return $this->hasMany(Payment::class);
  }

   public function payment()
   {
      return $this->hasOne(Payment::class);
   }

   public function extras()
   {
      return $this->hasMany(OrderExtra::class)->where('is_deleted',0);
   }

   public function getHasExtraAttribute()
   {
      if($this->extras->count())
         return 1;
      return 0;
   }

   public function invoices(){
      return $this->hasMany(InvoiceHead::class);
   }
   
   public function drInvoices(){
      return $this->hasMany(InvoiceHead::class)->where('type', "debit");
   }
   
   public function crInvoices(){
      return $this->hasMany(InvoiceHead::class)->where('type', "credit");
   }

   public function discount(){
      return $this->hasOne(OrderDiscount::class);
   }

   public function sms(){
      return $this->hasMany(SmsLog::class);
   }

   /**
    * Formulate order status marked detail
    *
    * @param array $details
    * @return array
    */
   public function markedDetails(array $details) :array{
      return [
         "by" => User::find($details['user']),
         "timestamp" => Date('m/d/Y h:i', strtotime($details['timestamp']))
      ];
   }

   /**
    * Get order delivery details
    *
    * @return array
    */
   public function deliveryDetails() :array{
      $deliveryDetails = json_decode($this->delivery_by, true);
      return $deliveryDetails ? $this->markedDetails($deliveryDetails) : [];   
   }

   /**
    * Get order pickup details
    *
    * @return array
    */
   public function pickupDetails() :array{
      $pickupDetails = json_decode($this->pickup_by, true);
      return $pickupDetails ? $this->markedDetails($pickupDetails) : [];      
   }

   public function notes()
   {
      return $this->hasMany(Note::class, 'table_id', 'id')->where('table', "Order")->where('is_deleted', 0)->latest('updated_at');
   }

   public function rentalDays(){
      return Carbon::parse($this->pickup_date)->diffInDays($this->delivery_date);
   }
   
   // Delivery Signatures
   public function deliverySignature()
   {
      return $this->hasOne(SignatureLog::class, 'order_id', 'id')->where('type', 'Delivery')->where('is_deleted', 0);
   }
   
   // Pickup Signatures
   public function pickupSignature()
    {
        return $this->hasOne(SignatureLog::class, 'order_id', 'id')->where('type', 'Pickup')->where('is_deleted', 0);
    }

   public function tax(){
      return $this->hasOne(OrderTax::class);
   }

  

}
