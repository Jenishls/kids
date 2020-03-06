<?php

namespace App\Filter;

use Illuminate\Http\Request;

class UserFilter extends Filter{

    public function __construct(Request $request)
    {
  
        $this->request = $request;
    }

    public function fullname($value = false){
        if($value){
            // return $this->builder->where('name',"like", "%$value%");
            return $this->builder->whereHas('member', function($q) use($value){
                return $q->where('first_name', 'like', "%$value%")
                ->orWhere('middle_name', 'like', "%$value%")
                ->orWhere('last_name', 'like', "%$value%");
                
            });
        }
        
        return $this->builder;
    }

    public function MobileNumber($value = false){
        if($value){
            return $this->builder->whereHas('member', function($q) use($value){
                return $q->where('mobile_no', 'like', "%$value%");
                
            });
        }
        
        return $this->builder;
    }

    public function email($value = false){
        if($value){
            return $this->builder->where('email',"like", "%$value%");
        }
        
        return $this->builder;

    }

    public function name($value = false){
        if($value){
            return $this->builder->where('name',"like", "%$value%");
        }
        
        return $this->builder;

    }

    public function userId($value = false){
        if($value){
            return $this->builder->where('id',"like", "%$value%");
        }
        
        return $this->builder;

    }

    /** 
     * Filter by role
     * @param Array $roles
     * @return Builder
     */
    public function role($roles){
        if($roles){
            return $this->builder->whereHas('roles', function($q) use($roles){
                return $q->whereIn('role_id', $roles);
            });
        }
        return $this->builder;
    }

}
