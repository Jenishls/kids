<?php

namespace App\Services\GoogleCalendar;

use Google_Client;
use Google_Service_Calendar;
use Google_Service_Plus;
use Illuminate\Http\Request;


class GoogleClient{

    protected $client;

    protected $url;

    const TOKEN_PATH = "token.json";

    public function __construct(){
        
        $this->client = $this->registerClient();
        $this->url = $this->client->createAuthUrl();

    }

    public function getClient(){
        return $this->client;
    }

    public function getUrl(){
        return $this->url;
    }

    protected function registerClient(){
        $client = new Google_Client();
        $client->setApplicationName('Crates on skates calendar');
        $client->setScopes([Google_Service_Calendar::CALENDAR]);
        $client->setIncludeGrantedScopes(true);
        $client->setApprovalPrompt('force'); // automatic token refresh
        $client->setAuthConfig(base_path('client_secret.json'));
        $client->setAccessType('offline');
        return $client;
    }

    public function service($service){
        $classname = "Google_Service_$service";
        return new $classname($this->getClient());
    }

    /** Check valid access token with google */
    public function userHasValidToken(){
        $userAccessToken = auth()->user()->google_access_token;
        return $userAccessToken ?:false;
    }

    public function setSSLFalse(){
        return new \GuzzleHttp\Client(["curl" => [
            CURLOPT_SSL_VERIFYPEER => false
        ]]);    
    }
    
    public function setupClient(Request $request){
        $guzzleClient = $this->setSSLFalse();
        $this->client->setHttpClient($guzzleClient);
        if($token = $this->userHasValidToken()){
            $this->client->setAccessToken($token);
        }
        if($this->client->isAccessTokenExpired()){
            if($refreshedToken = $this->client->getRefreshToken()){
                $this->client->fetchAccessTokenWithRefreshToken($refreshedToken);
            }else{
                if(!$request->has('code')){
                    return redirect($this->getUrl());
                }else{
                    $token = $this->client->fetchAccessTokenWithAuthCode($request->code);
                    $this->client->setAccessToken($token);
                    $this->storeUserGoogleToken(json_encode($this->client->getAccessToken()));                    
                }                    
            }
        } 
        return $this->client; 
    }

    public function storeUserGoogleToken($jsonToken){
        $user = auth()->user();
        $user->update([
            "google_access_token" => $jsonToken
        ]);
    }

    public function __call($method, $args){
        if(!method_exists($this->client, $method)){
            throw new \Exception("Call to undefined function {$method}");
        }
        return call_user_func_array([$this->client, $method], $args);
    }    

}
