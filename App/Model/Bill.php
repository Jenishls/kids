<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Bill extends Model
{
    protected $guarded = [];
    public static function boot()
    {
        parent::boot();
        Relation::morphMap([
            'bills' => static::class
        ]);
    }
    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }

    public function member()
    {
        return $this->belongsTo(User::class, 'member_id');
    }

    public function accountHead()
    {
        return $this->belongsTo(AccountSubHeadItem::class, 'account_head');
    }
}
