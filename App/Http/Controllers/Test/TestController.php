<?php

namespace App\Http\Controllers\Test;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Test\MailTest;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    
    // Testing Email with .env config
	public function mail(){

		Mail::to('order@cratesonskates.com')->send(new MailTest());

	}

}
