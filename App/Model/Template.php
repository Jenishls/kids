<?php

namespace App\Model;

use App\Model\File;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $guarded = [];

    public function preview()
    {
        return $this->morphOne(File::class, 'table', 'table_name', 'table_id', 'id')->where('type', 'preview');
    }
}
