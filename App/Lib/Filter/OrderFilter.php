<?php

namespace App\Lib\Filter;

use App\Filter\Filter;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderFilter extends Filter
{

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

    public function customer_name($value = '')
    {
        if ($value != '') {
            return $this->builder->whereHas('client', function ($q) use ($value) {
                return $q->where('fname', 'like', '%' . $value . '%')
                    ->orWhere('mname', 'like', '%' . $value . '%')
                    ->orWhere('lname', 'like', '%' . $value . '%');

            });
        }
        return $this->builder;
    }

    public function statuses($value = false)
    {
        if (is_array($value)) {
            return $this->builder->whereIn('order_status', $value);
        }
        return $this->builder;
    }
    
    // public function status($value = false)
    // {
    //     if ($value) {
    //         return $this->builder->where('order_status', $value);
    //     }
    //     return $this->builder;
    // }

    public function order_no($value = '')
    {
        if ($value != '') {
            return $this->builder->where('order_no', "like", "%$value%");
        }
        return $this->builder;
    }

    public function moving_date($value = '')
    {
        if ($value) {
            $date = explode('-', $value);
            return $this->builder->where('delivery_date', '>=', Carbon::parse($date[0])->format('Y-m-d'))
                ->where('delivery_date', '<=', Carbon::parse($date[1])->format('Y-m-d H:i:s'));
        }
        return $this->builder;
    }
    
    public function moving_date_single($value = '')
    {
        if($value != ''){
            return $this->builder->whereDate('delivery_date','=', Carbon::parse($value)->format('Y-m-d'));
        }
        return $this->builder;
    }
    
    public function both($value = '')
    {
        if($value != ''){
            return $this->builder->where(function($query) use ($value){
               $query->whereDate('delivery_date','=', Carbon::parse($value)->format('Y-m-d'))
               ->orWhereDate('pickup_date','=', Carbon::parse($value)->format('Y-m-d'));
            });
        }
        return $this->builder;
    }

    public function return_date($value = '')
    {
        if ($value) {
            $date = explode('-', $value);
            return $this->builder->where('pickup_date', '>=', Carbon::parse($date[0])->format('Y-m-d'))
                ->where('pickup_date', '<=', Carbon::parse($date[1])->format('Y-m-d H:i:s'));
        }
        return $this->builder;
    }
    
    public function return_date_single($value = '')
    {
        if($value != ''){
            return $this->builder->whereDate('pickup_date','=', Carbon::parse($value)->format('Y-m-d'));
        }
        dd($this->builder);
        return $this->builder;
    }

    public function customer_phone($value = '')
    {
        if ($value != '') {
            return $this->builder->whereHas('client', function ($q) use ($value) {
                return $q->where('phone_no', 'like', "%$value%");
            });
        }
        return $this->builder;
    }

    public function package_name($value = '')
    {
        if ($value != '') {
            return $this->builder->whereHas('package', function ($q) use ($value) {
                return $q->where('package_name', 'like', "%$value%");
            });
        }
        return $this->builder;
    }

    public function order_date($value = false)
    {
        if ($value) {
            $date = explode('-', $value);
            return $this->builder->where('created_at', '>=', Carbon::parse($date[0])->format('Y-m-d H:i:s'))
                ->where('created_at', '<=', Carbon::parse($date[1])->format('Y-m-d H:i:s'));
        }
        return $this->builder;
    }

}
