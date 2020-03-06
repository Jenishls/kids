<?php

namespace App\Lib\Filter;

use App\Filter\Filter;

use Illuminate\Http\Request;

class CouponFilter extends Filter{
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function coupon_name($value = ''){
        if($value != ''){
            return $this->builder->where('name',"like", "%$value%");
        }
        return $this->builder;
    }
    public function coupon_code($value = ''){
        if($value != ''){
            return $this->builder->where('code',"like", "%$value%");
        }
        return $this->builder;
    }
    public function type($value ="")
    {
        if($value != '')
        {
          return $this->builder->where('type', $value);
        }
    }
     public function start_date($value ="")
    {
        if($value != '')
        {
          return $this->builder->where('start_date','>=',$value);
        }
    }
     public function end_date($value ="")
    {
        if($value != '')
        {
          return $this->builder->where('end_date','<=', $value);
        }
    }
    public function usage($value ="")
    {
        if($value != '')
        {
          return $this->builder->where('usage', $value);
        }
    }
    public function amount($value ="")
    {
        if($value != '')
        {
          return $this->builder->where('amount', $value);
        }
    }

    public function min_value($value ="")
    {
        if($value != '')
        {
          return $this->builder->where('min_value','<=', $value);
        }
    }
    public function status($value = 0){
        if($value == 0 || $value == 1){
            return $this->builder->where('is_active', $value);
        }
        return $this->builder;
    }

 

}
