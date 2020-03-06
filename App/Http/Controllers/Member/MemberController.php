<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    protected $path = 'support.pages.profile.';

    /**
     * 
     * 
     */
    public function index(){
        return view($this->path.'member_profile');
    }
 
}
