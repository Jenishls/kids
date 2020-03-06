<?php

namespace App\Services\Payment;
use Illuminate\Http\Request;

class Payment implements PaymentInterface{
    
    protected $data;
    protected $paymentGetaway;

    public function __construct(array $data, PayableInterface $getaway){
        $this->data = $data;
        $this->paymentGetaway = $getaway;
    }

    public function makePayment(){
        return $this->paymentGetaway->pay($this->data);
    }

}