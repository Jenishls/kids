<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Enq extends Model
{
    protected $guarded = [];

    protected $appends = ['enq_type'];

    public function getEnqTypeAttribute(){
        return str_replace('_',' ', $this->type);
    }
}
