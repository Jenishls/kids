<?php

namespace App\Http\Controllers\CratesOnSkates;

use Illuminate\Http\{Request, Response};
use App\Http\Controllers\Controller;
use App\Model\Inventory;
use Illuminate\Support\Facades\Cookie;

class CartCookieController extends Controller
{
    public function setCookie(Request $request, $name , $value){
        $minutes = 60;
        // $response = new Response('Set Cookie');
        // $response->withCookie(cookie($name, $value, $minutes));
        // return $response;
        return cookie($name, $value, $minutes);
    }

    public function getCookie(Request $request, $name){
        return $request->cookie($name);
    }

    public function clearCookie($cookie){
        return Cookie::queue(Cookie::forget($cookie));
    }

    public function removeFromCookie(Inventory $inventory, $cookie){
        $cookieJSON = $this->getCookie(request(), $cookie);
        if(!$cookieJSON){
            throw new \Exception("Cookie $cookie doesn't exists!");
        }
        $cookieData = json_decode($cookieJSON, true);
        $updatedCart = array_filter($cookieData, function($cookieArray) use($inventory){
            return (int)$cookieArray['inventory_id'] !== $inventory->id;
        });
        return $updatedCart;
    }

    public function updateCookie(int $inventory, int $quantity, $cookie){
        $cookieJSON = $this->getCookie(request(), $cookie);
        if(!$cookieJSON){
            throw new \Exception("Cookie $cookie doesn't exists!");
        }
        $cookieData = json_decode($cookieJSON, true);
        $updatedCart = array_map(function($cookieArray) use($inventory, $quantity){
            if((int)$cookieArray['inventory_id'] === $inventory){
                $cookieArray['quantity'] = $quantity;
            }
            return $cookieArray;
        },$cookieData);
        return $updatedCart;
    }
}
