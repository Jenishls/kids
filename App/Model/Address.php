<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\StoreAudit;
use App\Traits\ActivityTrait;

class Address extends Model
{
    // use ActivityTrait;
    use StoreAudit;
    protected $guarded = [];
    protected static $recordEvents = ['updated', 'created'];
}
