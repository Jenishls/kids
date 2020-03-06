<?php

namespace App\Services\GoogleCalendar;

use Illuminate\Http\Request;

use App\Services\GoogleCalendar\GoogleClient;

class GoogleCalendarFactory{

    const TOKEN_PATH = "token.json";
    
    public static function createGoogleClient(Request $request){
        $googleClient = new GoogleClient();
        $guzzleClient = $googleClient->setSSLFalse();
        $googleClient->setHttpClient($guzzleClient);
        if($token = $googleClient->tokenizedFile()){
            $googleClient->setAccessToken($token);
        }

        if($googleClient->isAccessTokenExpired()){
            if($refreshedToken = $googleClient->getRefreshToken()){
                $googleClient->fetchAccessTokenWithRefreshToken($refreshedToken);
            }else{
                if(!$request->has('code')){
                    return redirect($googleClient->getUrl());
                }else{
                    $token = $googleClient->fetchAccessTokenWithAuthCode($request->code);
                    $googleClient->setAccessToken($token);
                    if(!file_exists(dirname(STATIC::TOKEN_PATH))){
                        mkdir(dirname(STATIC::TOKEN_PATH), 0700, true);
                    }
                    file_put_contents(STATIC::TOKEN_PATH, json_encode($googleClient->getAccessToken()));
                }                    
            }
        } 
        return $googleClient;  
    }
}