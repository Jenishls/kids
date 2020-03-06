<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BankMaster extends Model
{
    protected $guarded = [];
    protected $with = ['account', 'statements'];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function statements()
    {
        return $this->hasMany(BankTable::class);
    }
}
