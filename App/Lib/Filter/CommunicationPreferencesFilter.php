<?php

namespace App\Lib\Filter;

use App\Filter\Filter;

use Illuminate\Http\Request;

class CommunicationPreferencesFilter extends Filter{

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function name($value = ''){
        if($value != ''){
            return $this->builder->where('name',"like", "%$value%");
        }
        return $this->builder;
    }

}
