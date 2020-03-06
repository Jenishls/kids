<?php

namespace App\Lib\Filter;
use App\Filter\Filter;

use Illuminate\Http\Request;

class AddressFilter extends Filter{

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function member($value = ''){
        if($value != ''){
            return $this->builder->where('company_name',"like", "%$value%");
        }
        return $this->builder;
    }
    

}
