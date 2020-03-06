<?php

namespace App\Lib\Filter;

use App\Filter\Filter;

use Illuminate\Http\Request;

class CampaignActivityFilter extends Filter{

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function campaign_name($value = ''){
        if($value != ''){
            return $this->builder->where('name',"like", "%$value%");
        }
        return $this->builder;
    }
    public function campaign_code($value = ''){
        if($value != ''){
            return $this->builder->where('campaign_code',"like", "%$value%");
        }
        return $this->builder;
    }
    public function status($value = 0){
        if($value == "active"){
            $value = 1;
        }
        if($value == "inactive"){
            $value = 0;
        }
        if($value == 0 || $value == 1){
            return $this->builder->where('is_active', $value);
        }
        return $this->builder;
    }
}
