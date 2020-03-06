<?php

namespace App\Listeners\Order;

use App\Events\OrderCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Lib\ProgrammableSMS\SMSSender;
use App\Mail\OrderReservationMail;
use Exception;
use Illuminate\Support\Facades\Mail;

class SendClientOrderSummaryNotification
{  
    /**
     * Handle the event.
     *
     * @param  OrderCreated  $event
     * @return void
     */
    public function handle(OrderCreated $event)
    {
        if(default_company('send_reservation_sms') && default_company('send_reservation_sms') === "true"){
            $this->sendSms($event);
        }
        $this->sendEmail($event);
    }

    private function sendSms(OrderCreated $event){
        $sms = new SMSSender(default_company('sms_sid'), default_company('sms_auth_token'));
        $response = $sms->sendSms(
            default_company('default_phone_code').$event->phone, 
            default_company('sms_phone_number'), 
            $event->message 
        );
        $res = json_decode($response, true);
        if($res['status'] === 400 || $res['status'] === 500 || $res['status'] === 401){
            //this is an exception returned not to break the system
            return $res['message'];
        }        

        return $sms;
    }

    private function sendEmail(OrderCreated $event){
        Mail::to($event->email)->send((new OrderReservationMail($event->order))
                ->subject("Your crates on skates order {$event->order->order_no} has been created"));
    }
}
