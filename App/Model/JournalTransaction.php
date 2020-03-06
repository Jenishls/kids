<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class JournalTransaction extends Model
{
    protected $guarded = [];
    protected $with = ['accountHead'];
    public function journal()
    {
        return $this->belongsTo(Journal::class, 'journal_id');
    }

    public function accountHead()
    {
        return $this->belongsTo(AccountSubHeadItem::class, 'account_head');
    }
}
