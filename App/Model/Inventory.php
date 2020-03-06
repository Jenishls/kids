<?php

namespace App\Model;

use App\Model\Product;
use App\Model\Company;
use App\Model\Size;
use App\Model\Color;
use App\Traits\StoreAudit;
use DateTime;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use StoreAudit;
    protected static $recordEvents = ['created', 'updated'];
    protected $fillable = ['company_id', 'name', 'product_id', 'color_id', 'size_id', 'price', 'quantity', 'userc_id'];
    protected $guarded = [];
    protected $appends = ["availableQuantity"];

    public function getPriceAttribute($price){
      return number_format($price, 2, '.', '');
    }
    
    public function product()
    {
      return $this->belongsTo(Product::class,'product_id','id');
    }

    public function cartProduct()
    {
      return $this->belongsTo(CartProduct::class,'product_id','id');
    }
    
    public function color()
    {
      return $this->belongsTo(Color::class,'color_id','id');
    }
    
    public function size()
    {
      return $this->belongsTo(Size::class,'size_id','id');
    }
    public function getColorAttribute($color)
    {
      if($color)
      {
        return $color;
      }
      return '-';
    }
    
    public function company()
    {
      return $this->belongsTo(Company::class,'company_id','id');
    }
    
    public function getAvailableQuantityAttribute()
    {
      return $this->quantity - ($this->inv_hold?:0 + $this->inv_sold?:0) + $this->inv_return?:0 ;
    }
    
    /**
     * Caculates the price of the package according to days from pickup and ship date
     * Subsequent weeks (following weeks from week 1) are 50% off on prices
     *
     * @param int $week
     * @return float / null
     */
    public function priceCalculatorWRTDate($delivery_date, $pickup_date) : ?float{
      $datetime1 = new DateTime($delivery_date);
      $datetime2 = new DateTime($pickup_date);
      $interval = $datetime1->diff($datetime2);
      $days = $interval->format('%a');
      
      if((int)$days > 7){
        $days = $days-7;
        return $this->price + (($days/7)*($this->price/2)); //(50% off) 
      }
      return $this->price;
    }
    
}
