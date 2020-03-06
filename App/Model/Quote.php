<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $guarded = [];
    protected $with = ['vendorCompany', 'vendorClient', 'performa_invoice'];
    public function vendorCompany()
    {
        return $this->belongsTo(Company::class, 'supplier_id', 'id');
    }

    public function vendorClient()
    {
        return $this->belongsTo(Client::class, 'supplier_id', 'id');
    }

    public function performa_invoice()
    {
        return $this->hasOne(InvoiceHead::class, 'quot_id', 'id');
    }

    // public function vendor()
    // {
    //     // dd($this);
    //     switch ($this->supplier_type) {
    //         case 'companies':
    //             return $this->belongsTo(Company::class, 'supplier_id', 'id');
    //         case 'clients':
    //             return  $this->belongsTo(Client::class, 'supplier_id', 'id');
    //     }
    // }

    public function quoteItems()
    {
        return $this->hasMany(QuoteItem::class, 'quote_id', 'id');
    }
}
