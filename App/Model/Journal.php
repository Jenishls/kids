<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    protected $guarded = [];
    protected $with = ['transactions', 'approvedUser', 'preparedUser'];

    public function transactions()
    {
        return $this->hasMany(JournalTransaction::class, 'journal_id');
    }
    public function approvedUser()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function preparedUser()
    {
        return $this->belongsTo(User::class, 'userc_id');
    }
}
