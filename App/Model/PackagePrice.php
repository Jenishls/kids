<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DateTime;

class PackagePrice extends Model
{
    public function thumb()
    {
      return $this->hasOne(File::class,'table_id','id')->where('table_name', "Package_Thumb")->where('is_deleted', 0);
    }

  /**
   * Caculates the price of the package according to week
   * Subsequent weeks (following weeks from week 1) are 50% off on prices
   *
   * @param int $week
   * @return float / null
   */
  public function priceCalculator($week) : ?float{
    if((int)$week !== 1){
      return round($this->price + (($week - 1)*($this->price/2))); //(50% off) 
    }
    return $this->price;
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
    
  public function packageItems()
  {
    return $this->hasMany(PackagePriceItem::class, 'package_price_id', 'id')->where('is_deleted', 0);
  }
  
  public function packageType()
  {
    return $this->belongsTo(PackageType::class,'package_type_id','id')->where('is_deleted', 0);
  }
    

}
