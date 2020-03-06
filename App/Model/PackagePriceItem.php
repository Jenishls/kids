<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PackagePriceItem extends Model
{
    public function inventory()
    {
      return $this->belongsTo(Inventory::class,'inv_id','id');
    }
}
