<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    protected $guarded = [];
    protected $with = ['supplier', 'requestedBy'];

    public function supplier()
    {
        return $this->belongsTo(Company::class, 'supplier_id', 'id');
    }

    public function requestedBy()
    {
        return $this->belongsTo(Company::class, 'requested_id', 'id');
    }

    public function poItems()
    {
        return $this->hasMany(POItem::class, 'po_id', 'id');
    }
}
