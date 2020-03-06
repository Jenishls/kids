<?php

namespace App\Lib\Filter;

use App\Filter\Filter;

use Illuminate\Http\Request;

class CampaignFilter extends Filter{

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
    public function budget($value = ''){
        if($value != ''){
            $budget=  number_format((float)preg_replace("/[^0-9.]/", "", $value), 2, '.', '');
            return $this->builder->where('budget',"like", $budget);
        }
        return $this->builder;
    }
    public function account_since($value = ''){
        if($value != ''){
            return $this->builder->where('created_at',"<=", $value);
        }
        return $this->builder;
    }
    public function phone_no($value ="")
    {
        if($value != '')
        {
           return $this->builder->whereHas('contact', function($q) use($value){
                return $q->where('phone_no', 'like', "%$value%");
                
            });
        }
    }
     public function default_contact($value ="")
    {
        if($value != '')
        {
           return $this->builder->whereHas('contact', function($q) use($value){
            return $q->where('fname', 'like', "%$value%")
                        ->orwhere('lname','like',"%$value%");
            });
        }
    }

     public function city($value ="")
    {
        if($value != '')
        {
           return $this->builder->whereHas('address', function($q) use($value){
                return $q->where('city', 'like', "%$value%");
            });
        }
    }
     public function state($value ="")
    {
        if($value != '')
        {
           return $this->builder->whereHas('address', function($q) use($value){
                return $q->where('state', 'like', "%$value%");
            });
        }
    }
     public function zip($value ="")
    {
        if($value != '')
        {
           return $this->builder->whereHas('address', function($q) use($value){
                return $q->where('zip', 'like', "%$value%");
            });
        }
    }
    public function est_date($value = false){
        if($value){
            return $this->builder->where('start_date',"<=", $value);
        }
        return $this->builder;
    }
    public function ownership($value = false){
        if($value){
            return $this->builder->where('ownership',"like", "%$value%");
        }
        return $this->builder;
    }
    public function account_code($value = false){
        if($value){
            return $this->builder->where('account_code',"like", "%$value%");
        }
        return $this->builder;
    }
    public function industry($value = false){
        if(is_array($value)){
            $lower=[];
            $upper=[];
            foreach($value as $industry){
                $lower[]= strtolower($industry);
                $upper[]= strtoupper($industry);
            }
            return $this->builder->whereIn('industry', array_merge($upper, $lower));
        }
        return $this->builder;
    }
    public function singleIndustry($value = false){
        if($value){
            return $this->builder->where('industry', $value);
        }
        return $this->builder;
    }

    public function url($value = false){
        if($value){
            return $this->builder->where('url',"like", "%$value%");
        }
        return $this->builder;
    }
    public function is_default($value = false){
        if($value){
            return $this->builder->where('is_default', $value);
        }
        return $this->builder;
    }
    public function is_active($value = false){
        if($value){
            return $this->builder->where('is_active', $value);
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
