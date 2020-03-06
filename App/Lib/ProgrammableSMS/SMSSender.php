<?php
namespace App\Lib\ProgrammableSMS;

class SMSSender{
	private $account_sid;
	private $auth_token;

	public function __construct($sid, $authToken){
		$this->account_sid = $sid;
		$this->auth_token = $authToken;
	}

	public function sendSms($receiver, $sender, $message){
		
		$sid = $this->retrieveSid();
		$authToken = $this->retrieveAuthToken();

	    $to = "+".$receiver;
	    $from = $sender;

	    $url = "https://api.twilio.com/2010-04-01/Accounts/".$sid."/Messages.json";	
		$data = array (
		    'From' => $from,
		    'To' => $to,
		    'Body' => $message,
		);

		$ch = curl_init($url);
		$options = array(
			CURLOPT_POST=>TRUE,
			CURLOPT_RETURNTRANSFER=>TRUE,
			CURLOPT_MAXREDIRS =>10,
			CURLOPT_TIMEOUT=>30,
			CURLOPT_SSL_VERIFYPEER=>false,
			CURLOPT_HTTPAUTH=>CURLAUTH_BASIC,
			CURLOPT_USERPWD=>$sid.':'.$authToken,
			CURLOPT_CUSTOMREQUEST=>'POST',
			CURLOPT_POSTFIELDS=>$data
		);

		curl_setopt_array($ch, $options);

		$response=curl_exec($ch);
		$err= curl_error($ch);
		curl_close($ch);
		if($err){
			echo $err;
		}else{
			return $response;
		}

   }	

	public function retrieveSid(){
		return $this->account_sid;
	}

	public function retrieveAuthToken(){
		return $this->auth_token;

	}


}