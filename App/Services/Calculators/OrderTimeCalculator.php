<?php

namespace App\Services\Calculators;

use App\Model\Order;
use Carbon\Carbon;
use DateTime;

class OrderTimeCalculator{

    public $order;

    public $fetchBy;
    
    public function __construct(Order $order){
        $this->order = $order;
    }   
    
    public function fetch($type){
        $this->fetchBy = $type;
        return $this;
    }    
    
    public function deliveryDateTime(){
        $timeToAdd = $this->amPmDecider($this->order->delivery_time);
        $deliveryTime = explode('-', $this->order->delivery_time);
        $startTime = $this->getRealtime($deliveryTime[0]) < 12 ? $this->getRealtime($deliveryTime[0]) + $timeToAdd : $this->getRealtime($deliveryTime[0]);
        $endTime = $this->getRealtime($deliveryTime[1]) + $timeToAdd;
        $startDateTime = $this->createCalendarDateTime($this->order->delivery_date, $startTime);
        $endDatetime = $this->createCalendarDateTime($this->order->delivery_date, $endTime);
        switch(true){
            case $this->fetchBy === "delivery_start_date":
                return $startDateTime;
            case $this->fetchBy === "delivery_end_date";
                return $endDatetime;
            default:
                if($this->fetchBy){
                    throw new \Exception("The given fetch value is not valid try delivery_start_date & delivery_end_date", 500);
                }else{  
                    throw new \Exception("OrderTimeCalculator::class can only be accessed using the fetch method beforehand", 500);
                }
        }
    }
    
    public function pickupDateTime(){
        $timeToAdd = $this->amPmDecider($this->order->pickup_time);
        $pickupTime = explode('-', $this->order->pickup_time);
        $startTime = $this->getRealtime($pickupTime[0]) < 12 ? $this->getRealtime($pickupTime[0]) + $timeToAdd : $this->getRealtime($pickupTime[0]);
        $endTime = $this->getRealtime($pickupTime[1]) + $timeToAdd;
        $startDateTime = $this->createCalendarDateTime($this->order->pickup_date, $startTime);
        $endDatetime = $this->createCalendarDateTime($this->order->pickup_date, $endTime);

        switch(true){
            case $this->fetchBy === "pickup_start_date":
                return $startDateTime;
            case $this->fetchBy === "pickup_end_date";
                return $endDatetime;
            default:
                if($this->fetchBy){
                    throw new \Exception("The given fetch value is not valid try pickup_start_date & pickup_end_date", 500);
                }else{  
                    throw new \Exception("OrderTimeCalculator::class can only be accessed using the fetch method beforehand", 500);
                }
        }
    }

    public function amPmDecider($time){
        preg_match('/[a-z]./i', $time, $matches);
        if($matches){
            if(strtolower($matches[0]) === "am"){
                return 0;
            }else{
                return 12;
            }
        }
        return 0;
    }

    public function getRealtime($time){
        return preg_replace('/[^0-9]/', "",$time);
    }

    public function pickupLocationCreater(Order $order) : string{
        return "{$order->pickupAddr->add1}, {$order->pickupAddr->city}, {$order->pickupAddr->state} {$order->pickupAddr->zip}";
    }

    public function createCalendarDateTime($date, $time){
        $date = $date->format("Y-m-d");
        $carbonTime = Carbon::createFromTime($time,0,0)->format("H:i:s");
        return Carbon::create($date." ".$carbonTime)->format(DateTime::RFC3339);
    }

}