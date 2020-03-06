<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AccountHead extends Model
{
    protected $guarded = [];
    public function accountSubHead()
    {
        return $this->hasMany(AccountSubHead::class, 'account_head_id');
    }

    public function accountSubHeadItem()
    {
        return $this->hasMany(AccountSubHeadItem::class, 'account_head_id');
    }
}
