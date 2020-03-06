<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    protected $guarded = [];
    protected $with = ['accountHeadItem'];

    public function accountHeadItem()
    {
        return $this->belongsTo(AccountSubHeadItem::class, 'account_head');
    }
}
