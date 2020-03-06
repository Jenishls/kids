<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CartProduct extends Product
{
    protected $appends = ['thumb', 'sales', 'is_rental'];

    public function getThumbAttribute(){
        return $this->thumb()->first()->file_name ?? null;
    }

    public function getSalesAttribute(){
        return $this->addon()->first()->sales ?? "purchase";
    }  

    public function getIsRentalAttribute(){
        return $this->sales === "rent";
    }
  
}
