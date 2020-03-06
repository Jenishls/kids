<?php

namespace App\Traits\CratesOnSkates;

use App\Model\ZipCode;

trait AdditionalChargesTrait{
  
    public $deliveryZip = null;
    public $pickupZip = null;
    public $taxAmount = 0;

    public function fetchZip($zip){
        return ZipCode::where('zipcode', $zip)->first();
    }
    
    public function setZipCodes($deliveryZip, $pickupZip){
        if($deliveryZip instanceof ZipCode){
            $this->deliveryZip = $deliveryZip;
        }else{
            $this->setDeliveryZip($deliveryZip);
        }

        if($pickupZip instanceof ZipCode){
            $this->pickupZip = $pickupZip;
        }else{
            $this->setPickupZip($pickupZip);
        }
        return $this;
    }

    public function setDeliveryZip($zipcode){
        $this->deliveryZip = ZipCode::find($zipcode);
        return $this;
    }

    public function getDeliveryZipCharge(){
        return $this->deliveryZip ? $this->deliveryZip->price : 0;
    }

    public function getPickupZipCharge(){
        return $this->pickupZip ? $this->pickupZip->price : 0;
    }

    public function setPickupZip($zipcode){
        $this->pickupZip = ZipCode::find($zipcode);
        return $this;
    }

    public function includeTax($total){
        $this->taxAmount = default_company('sales_tax')/100 * $total;
        return $this;
    }

    public function additionalCharges(){
        $total = $this->zipCharges();
        $total += $this->taxAmount;
        return $total;
    }

    public function zipCharges(){
        $total = 0;
        if(!is_null($this->deliveryZip)){
            $total += $this->deliveryZip->price;
        }
        if(!is_null($this->pickupZip)){
            $total += $this->pickupZip->price;
        }
        return $total;
    }

}