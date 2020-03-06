<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ZipCode extends Model
{
    protected $guarded = [];

    public static function findZip(int $zipCode){
        return self::where('zipcode', $zipCode)->first();
    }

}
