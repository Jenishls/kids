<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EmailLog extends Model
{
    public function files()
    {
        return $this->hasMany(File::class, 'table_id', 'id')->where('table_name', "Mail")->where('is_deleted', 0);
    }
}
