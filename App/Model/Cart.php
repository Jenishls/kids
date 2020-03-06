<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = [];

    public function inventory(){
        return $this->belongsto(Inventory::class, 'inventory_id');
    }
}
