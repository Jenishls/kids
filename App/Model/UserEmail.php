<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class UserEmail extends Model
{
    public function getPassword()
    {
        try {
            return Crypt::decryptString($this->attributes['password']);
        } catch (\Throwable $th) {
            return $this->attributes['password'];
        }
    }
}
