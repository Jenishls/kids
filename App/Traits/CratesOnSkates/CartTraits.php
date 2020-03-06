<?php
namespace App\Traits\CratesOnSkates;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Model\Product;

trait CartTrait{

    public function setCookie(Request $request){
        $minutes = 60;
        $response = new Response('Set Cookie');
        $response->withCookie(cookie('name', 'MyValue', $minutes));
        return $response;
     }
  
  
    public function addToCart(Product $product, $quantity){
        
    }

}