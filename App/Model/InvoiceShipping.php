<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class InvoiceShipping extends Model
{
    /** not working on order creating @todo */
    public function setNameAttribute($value){
        if($value === "delivery_appartment"){
            $this->attributes['name'] = 'delivery charge';
        }else{
            $this->attributes['name'] = 'pickup charge';
        }
    }
}
