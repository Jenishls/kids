<?php

namespace App\Services\Payment;

use App\Lib\Authorize\AuthorizePay;

class AuthorizeNet implements PayableInterface{

    public function pay($data){
        $authorize = new AuthorizePay;       
        $payment = $authorize->chargeCreditCard($data);
        if(gettype($payment) == "array" && isset($payment['error'])){
            throw new \Exception($payment['error'], 500);                
        }
        return $payment;
    }
   
}