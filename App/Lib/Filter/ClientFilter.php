<?php

namespace App\Lib\Filter;

use App\Filter\Filter;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ClientFilter extends Filter{

    public function __construct(Request $request)
    {
        /***********Expected function_name*/
            // client_since
            // name
            // phone_no
            // email
            // city
            // zip
            // dob
            // order_since
            // status
        /*******************/
  
        $this->request = $request;
    }

    public function name($value = ''){
        if($value != ''){
            // return $this->builder->where('name',"like", "%$value%");
            return $this->builder->where('fname','like','%'.$value.'%')
                ->orWhere('mname','like','%'.$value.'%')
                ->orWhere('lname','like','%'.$value.'%');
        }
        return $this->builder;
    }
    public function client_since($value = ''){
        if ($value) {
            return $this->builder->where('created_at', '>=', Carbon::parse($value)->format('Y-m-d H:i:s'));
        }
        return $this->builder;
    }
    public function phone_no($value = ''){
        if($value != '')
        {
            if($this->builder->has('contact')){
                return $this->builder->whereHas('contact', function($q) use($value){
                    return $q->where('phone_no', 'like', "%$value%");
                });
            }
            else{
                return $this->builder->where('phone_no',"%$value%");
            }
          
        }
        return $this->builder;
    }
    public function email($value="")
    {
        if($value !='')
        {
            if($this->builder->has('contact'))
            {
                return $this->builder->whereHas('contact', function($q) use($value){
                    return $q->where('email','like',"%$value%"); 
                });
            }
        }
        return $this->builder;
    }

    public function city($value="")
    {
        if($value !='')
        {
            if($this->builder->has('address'))
            {
                return $this->builder->whereHas('address', function($q) use($value){
                    return $q->where('city','like',"%$value%"); 
                });
            }
        }
        return $this->builder;
    }

    public function state($value="")
    {
        if($value !='')
        {
            if($this->builder->has('address'))
            {
                return $this->builder->whereHas('address', function($q) use($value){
                    return $q->where('state','like',"%$value%"); 
                });
            }
        }
        return $this->builder;
    }

    public function dob($value = false)
    {
        if($value) {
            return $this->builder->where('dob', '>=', Carbon::parse($value)->format('Y-m-d H:i:s'));
        }
        return $this->builder;
    }
    
    public function zip($value="")
    {
        if($value !='')
        {
            if($this->builder->has('address'))
            {
                return $this->builder->whereHas('address', function($q) use($value){
                    return $q->where('zip','like',"%$value%"); 
                });
            }
        }
        return $this->builder;
    }

    public function phoneNo($value = ''){
        if($value != '')
        {
           return $this->builder->where('phone_no', 'like', "%$value%");
        }
        return $this->builder;
    }
    public function status($value = ''){
        if($value != '')
        {
           return $this->builder->where('status', $value);
        }
        return $this->builder;
    }
}
