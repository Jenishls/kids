<?php

namespace App\Lib\Filter;

use App\Filter\Filter;
use Illuminate\Http\Request;
use Carbon\Carbon;

class InventoryFilter extends Filter{

    public function __construct(Request $request)
    {
        /***********Expected function_name*/
            // customer_name
            // conmpany_name
            // phone_no
            // shipping_date
            // return_date
            // date_range
            // status
        /*******************/
  
        $this->request = $request;
    }

    public function customer_name($value = ''){
        if($value != '')
        {
           return $this->builder->whereHas('client', function($q) use($value){
                return $q->where('fname','like','%'.$value.'%')
                ->orWhere('mname','like','%'.$value.'%')
                ->orWhere('lname','like','%'.$value.'%');
                
            });
        }
        return $this->builder;
    }

    public function status($value = false){
        if(is_array($value)){
            return $this->builder->whereIn('order_status', $value);
        }
        return $this->builder;
    }

    public function name($value = ''){
        if($value != ''){
            return $this->builder->where('name', 'like', "%$value%");
        }
        return $this->builder;
    }

    public function price($value = ''){
        if($value != ''){
            return $this->builder->where('price','<=',$value);
        }
        return $this->builder;
    }

    public function company($value = ''){
        if($value != '')
        {
           return $this->builder->whereHas('company', function($q) use($value){
                return $q->where('c_name', 'like', "%$value%");
            });
        }
        return $this->builder;
    }
    public function product($value = ''){
        if($value != '')
        {
           return $this->builder->whereHas('product', function($q) use($value){
                return $q->where('name', 'like', "%$value%");
            });
        }
        return $this->builder;
    }
    
    public function size($value = ''){
        if($value != '')
        {
           return $this->builder->whereHas('size', function($q) use($value){
                return $q->where('size', 'like', "%$value%");
            });
        }
        return $this->builder;
    }
    
    public function color($value = ''){
        if($value != '')
        {
           return $this->builder->whereHas('color', function($q) use($value){
                return $q->where('color', 'like', "%$value%");
            });
        }
        return $this->builder;
    }

    public function created_date($value = false){
        if($value ){
            $date = explode('/', $value);
            return $this->builder->where('created_at','>=', Carbon::parse($date[0])->format('Y-m-d H:i:s'))
                ->where('created_at','<=',Carbon::parse($date[1])->format('Y-m-d H:i:s'));
        }
        return $this->builder;
    }
    

}
