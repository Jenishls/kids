<?php

namespace App\Listeners\Order;

use App\Events\OrderCreated;
// use App\Mail\OrderReservationMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Lib\ProgrammableSMS\SMSSender;
use App\Mail\NewOrderMail;

class SendSupplierOrderSummaryNotification
{   
    /**
     * Handle the event.
     *
     * @param  OrderCreated  $event
     * @return void
     */
    public function handle(OrderCreated $event)
    {
        if(default_company('send_reservation_sms') === "true" && default_company('sms_reservation_phone')){
            $this->sendSms($event);
        }

        if($companyEmail = default_company('reservation_email_order')):
            Mail::to($companyEmail)->send((new NewOrderMail($event->order))->subject("New order {$event->order->order_no} received"));
        endif;
    }
    private function sendSms(OrderCreated $event){
        $encryptedOrder = order_encrypt($event->order);
        $host = request()->root();
        $sms = new SMSSender(default_company('sms_sid'), default_company('sms_auth_token'));
        $response = $sms->sendSms(
            default_company('default_phone_code').default_company('sms_reservation_phone'), 
            default_company('sms_phone_number'), 
            "New order received view more at {$host}/ordersummary?os=$encryptedOrder"
        );
        $res = json_decode($response, true);
        if($res['status'] === 400 || $res['status'] === 500 || $res['status'] === 401){
            //this is an exception returned not to break the system
            return $res['message'];
        }        

        return $sms;
    }
    
}
