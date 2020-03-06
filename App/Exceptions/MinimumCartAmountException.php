<?php

namespace App\Exceptions;

use App\Helpers\NumberHelper;
use Exception;

class MinimumCartAmountException extends Exception
{
    public function __construct($minAmt){
        parent::__construct("The minimum cart amount for checkout is $ $minAmt");
    }
    
}
