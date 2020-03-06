<?php
/**
 * Created By React Rakesh
 */

namespace App\Helpers;
// fro recrence https://ourcodeworld.com/articles/read/762/how-to-group-an-array-of-associative-arrays-by-key-in-php

class ArrayHelper{

    public static function lvl1_formatter(array $data): array{
        $formattedData = [];
        foreach($data as $key => $valueArray){
            if(is_array($valueArray)){
                foreach($valueArray as $index => $value){
                    $formattedData[$index][$key] = $value;
                }
            }
        }
        return $formattedData;
    }

}