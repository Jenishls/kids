<?php

namespace App\Lib\ProgrammableSMS;
use Twilio\Rest\Client;

class SMSReader{

    private $account_sid;
    private $auth_token;
    public $replies;
    public $phone;

	public function __construct($sid, $authToken){
		$this->account_sid = $sid;
		$this->auth_token = $authToken;
    }

    public function phone($phone = null){
        if($phone){
            $this->phone = $phone;
        }
        return $this;
    }   

    public function getReplies($phone = null){
        $this->phone($phone);
        $client = new \GuzzleHttp\Client([
            'verify' => false
        ]);      
        $res = $client->request('GET', "https://api.twilio.com/2010-04-01/Accounts/{$this->account_sid}/Messages.json", [
            'query' => "From={$this->phone}",
            'auth' => [$this->account_sid, $this->auth_token]
        ]);
        $this->replies = json_decode($res->getBody()->getContents());
        return $this;
    }

    public function getMessages(){
        return $this->replies->messages;
    }

}