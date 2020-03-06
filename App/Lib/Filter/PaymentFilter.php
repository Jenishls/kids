<?php

namespace App\Lib\Filter;

use App\Filter\Filter;

use Illuminate\Http\Request;
use Carbon\Carbon;
class PaymentFilter extends Filter{

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function company_name($value = ''){
        if($value != ''){
            return $this->builder->where('company_name',"like", "%$value%");
        }
        return $this->builder;
    }
    public function payment_date($value = false){
        if($value ){
            return $this->builder->where('created_at','<=', Carbon::parse($value)->format('Y-m-d H:i:s'));
        }
        return $this->builder;
    }
    public function order_no($value = ''){
        if($value != '')
        {
           return $this->builder->where('order.order_no','like',"%$value%");
        }
        return $this->builder;
    }
    public function status($value = 0){
        if($value == 0 || $value == 1){
            return $this->builder->where('is_active', $value);
        }
        return $this->builder;
    }

    public function transaction_id($value = ''){
        if($value !== ''){
            return $this->builder->where('transaction_id', $value);
        }
        return $this->builder;
    }
}
