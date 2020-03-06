<?php

namespace App\Http\Controllers\CratesOnSkates;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\EnquiryMail;
use App\Model\Enq;
use Illuminate\Support\Facades\Mail;
use Jenssegers\Agent\Agent;

class EnqController extends Controller
{
    public $mover = false;
    public $type = "contact";
    public $reason = "";
    public $userAgent = [];    

    public function __construct(){
        $this->userAgent(request());
    }

    public function validateWithAuth(Request $request){
        if($this->mover){
            $this->validate($request, [
                'company' => 'required',
                'desc' => 'required',
            ]);
        }else{
            $this->validate($request, [
                'reason' => 'required',
                'desc' => 'required'
            ]);
        }
        return $this;
    }

    public function validateWithoutAuth(Request $request){
        if($this->mover){
            $this->validate($request, [
                'company' => 'required',
                'fname' => 'required',
                'lname' => 'required',
                'email' => 'required|email',
                'desc' => 'required'
            ]);
        }else{
            $this->validate($request, [
                'reason' => 'required',
                'fname' => 'required',
                'lname' => 'required',
                'email' => 'required|email',
                'desc' => 'required'
            ]);
        }
        return $this;
    }

    public function mover(){
        $this->mover = true;
        return $this;
    }

    public function setType($type){
        $this->type = $type;
        return $this;
    }

    public function setReason($reason){
        $this->reason = $reason;
        return $this;
    }
    
    
    public function store(Request $request){       
        $enq = auth()->check() ? 
            $this->validateWithAuth($request)->authEnquire($request) : 
            $this->validateWithoutAuth($request)->nonAuthEnquire($request);
        Mail::to(
                default_company('enquire_email')?:default_company('email')
            )->send((new EnquiryMail($enq))
            ->subject("New enquiry received"));
        return $enq;
    }

    public function authEnquire(Request $request) :Enq{
        $user = auth()->user();
        $isMember = (bool) auth()->user()->member;
        return Enq::create(
            array_merge($request->all(), [
                'user_id' => $user->id,
                'type' => $this->type,
                'fname' => $isMember ? $user->member->first_name : $user->client->fname,
                'lname' => $isMember ? $user->member->last_name : $user->client->lname,
                'phone' => $isMember ? preg_replace('/[^0-9]/','', $user->member->mobile_no) : $user->client->phone_no,
                'email' => $user->email,
                'reason' => $request->reason ?: $this->reason
            ], $this->userAgent)
        );
    }

    public function nonAuthEnquire(Request $request) : Enq{
        return Enq::create(array_merge($request->all(), $this->userAgent, ["type" => $this->type, 'reason' => $request->reason ?: $this->reason]));
    }

    public function commercialMovers(Request $request){
        $enq = auth()->check() ?
                $this->mover()->validateWithAuth($request)->setType('commercial_mover')->setReason('other')->authEnquire($request):
                $this->mover()->validateWithoutAuth($request)->setType('commercial_mover')->setReason('other')->nonAuthEnquire($request);
        Mail::to(
                default_company('enquire_email')?:default_company('email')
            )->send((new EnquiryMail($enq))
            ->subject("New commercial movers enquiry received"));
        return $enq;
    }

    // @todo make this a library
    public function userAgent(Request $request){
        $agent = new Agent();
        $this->userAgent = [
            'fingerprint' => request()->fingerprint(),
            'ip' => request()->ip(),
            'browser' => $agent->browser()
        ];
        return $this;
    }

}
