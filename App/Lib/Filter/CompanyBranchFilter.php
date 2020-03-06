<?php

namespace App\Lib\Filter;

use App\Filter\Filter;

use Illuminate\Http\Request;

class CompanyBranchFilter extends Filter{

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function branch_name($value = ''){
        if($value != ''){
            return $this->builder->where('branch_name',"like", "%$value%");
        }
        return $this->builder;
    }
    public function branch_no($value = ''){
        if($value != ''){
            return $this->builder->where('branch_no',"like", "#%$value%");
        }
        return $this->builder;
    }
    public function city($value = ''){
        if($value != ''){
            return $this->builder->whereHas('address', function($city) use($value){
                return $city->where('city','like',"%$value%");
            });
        }
        return $this->builder;
    }
  
}
