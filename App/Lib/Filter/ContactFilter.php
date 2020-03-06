<?php

namespace App\Lib\Filter;

use App\Filter\Filter;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactFilter extends Filter{

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    /**
     * For name of enq
     */
    public function name($value = '')
    {
        if ($value != '') {
          
            return $this->builder->where(function($q) use ($value){
                $q->where('fname', 'like', "%$value%")
                    ->orWhere('lname', 'like', "%$value%");
            });
        }
        return $this->builder;
    }
    /**
    * For name of phone no of enq
    */
    public function phone_no($value = '')
    {
        if ($value != '') {
          
            return $this->builder->where('phone', 'like', "%$value%");
        }
        return $this->builder;
    }

    public function email($value = '')
    {
        if ($value != '') {
          
            return $this->builder->where('email', 'like', "%$value%");
        }
        return $this->builder;
    }
    
    /**
    * For date of enq
    */
    public function date($value = false)
    {
        if ($value) {
            $date = explode('/', $value);
            return $this->builder->where('created_at', '>=', Carbon::parse($date[0])->format('Y-m-d H:i:s'))
                ->where('created_at', '<=', Carbon::parse($date[1])->format('Y-m-d H:i:s'));
        }
        return $this->builder;
    }
}
