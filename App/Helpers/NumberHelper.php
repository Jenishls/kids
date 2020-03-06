<?php
/**
 * Created By React Rakesh
 */

namespace App\Helpers;

class NumberHelper{

    public static function amount_format(float $amount){
        return number_format($amount, 2, '.', '');
    }

}