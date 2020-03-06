<?php

namespace App\Lib\Filter;

use App\Filter\Filter;

use Illuminate\Http\Request;

class ZipCodeFilter extends Filter{
    public function __construct(Request $request)
    {   
        $this->request = $request;
    }
    public function zip_code($value = ''){
        if($value != ''){
            return $this->builder->where('zipcode',"like", "%$value%");
        }
        return $this->builder;
    }
    public function state($value = ''){
        if($value != ''){
            return $this->builder->where('state',"like", "%$value%");
        }
        return $this->builder;
    }
    public function city($value = ''){
        if($value != ''){
            return $this->builder->where('city',"like", "%$value%");
        }
        return $this->builder;
    }
    public function country($value = ''){
        if($value != ''){
            return $this->builder->where('country',"like", "%$value%");
        }
        return $this->builder;
    }
    public function status($value = 0){
        if($value == 0 || $value == 1){
            return $this->builder->where('is_active', $value);
        }
        return $this->builder;
    }
 
}
