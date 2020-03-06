<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AccountSubHeadItem extends Model
{
    protected $guarded = [];

    public function accountSubHead()
    {
        return $this->belongsTo(AccountSubHead::class, 'account_sub_head_id');
    }

    public function accountHead()
    {
        return $this->belongsTo(AccountHead::class, 'account_head_id');
    }
}
