<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AccountSubHead extends Model
{
    protected $guarded = [];
    public function accountHead()
    {
        return $this->belongsTo(AccountHead::class, 'account_head_id');
    }

    public function accountSubHeadItem()
    {
        return $this->hasMany(AccountSubHeadItem::class, 'account_sub_head_id');
    }
}
