<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class CashMaster extends Model
{
    protected $guarded = [];
    protected $with = ['user', 'cashbox'];

    public function user()
    {
        return $this->belongsTo(User::class, 'member_id');
    }

    public function cashbox()
    {
        return $this->hasMany(CashBox::class);
    }
}
