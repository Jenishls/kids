<?php

namespace App\Listeners\Order;

use App\Events\OrderCreated;
use App\Model\Order;
use App\Services\GoogleCalendar\GoogleCalendar;
use App\Services\GoogleCalendar\GoogleClient;
use App\User;
use Carbon\Carbon;
use DateTime;
use Google_Service_Calendar;
use Google_Service_Calendar_Channel;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Google_Service_Calendar_Event;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;

class AttachGoogleCalendarEvents implements ShouldQueue
{
    protected $deliveryEvent;
    protected $pickupEvent;
    public $userID;
    /**
     * Handle the event.
     *
     * @param  OrderCreated  $event
     * @return void
     */
    public function handle(OrderCreated $event)
    {
        $order = $event->order;        
        foreach($this->googleSyncedUsers() as $key => $syncedUsers){
            try{
                if($syncedUsers->google_access_token){
                    $this->userID = $syncedUsers->id;       
                    $this->deliveryEvent = $this->deliveryEvent($order);
                    $this->pickupEvent = $this->pickupEvent($order);             
                    $this->syncOrderToGoogleCalendar($syncedUsers);                    
                }
            }catch(\Exception $e){
                //@todo create failed_google_events table
                // Log::error($e->getMessage());
            }            
        }  
    }

    public function googleSyncedUsers(){
        return User::whereNotNull('google_access_token')->get();
    }

    public function syncOrderToGoogleCalendar($user){
        $googleClient = new GoogleClient();
        $guzzleClient = $googleClient->setSSLFalse();
        $googleClient->setHttpClient($guzzleClient);
        $googleClient->setAccessToken($user->google_access_token);
        if($googleClient->isAccessTokenExpired()){
            if($refreshedToken = $googleClient->getRefreshToken()){
                $googleClient->fetchAccessTokenWithRefreshToken($refreshedToken);
            }
        }

        $service = new Google_Service_Calendar($googleClient->getClient());
        $calendar = new GoogleCalendar($service, 'primary');
        $calendar->store($this->deliveryEvent);
        $calendar->store($this->pickupEvent);
        // Webhook
    //     $channel = new Google_Service_Calendar_Channel($googleClient->getClient());
    //     $channel->setId(Uuid::uuid4());
    //     $channel->setType('web_hook');
    //     $channel->setAddress('https://cratesonskates.systha.com/cal/hook');
    //     $watchEvent = $service->events->watch('primary', $channel);
    }

    /**
     * Create pickup location from address
     *
     * @param Order $order
     * @return string
     */
    public function shippingLocationCreater(Order $order) : string{
        return "{$order->shippingAddr->add1}, {$order->shippingAddr->city}, {$order->shippingAddr->state} {$order->shippingAddr->zip}";
    }

    /**
     * Create pickup location from address
     *
     * @param Order $order
     * @return string
     */
    public function pickupLocationCreater(Order $order) : string{
        return "{$order->pickupAddr->add1}, {$order->pickupAddr->city}, {$order->pickupAddr->state} {$order->pickupAddr->zip}";
    }

    public function createCalendarDateTime($date, $time){
        $date = $date->format("Y-m-d");
        $carbonTime = Carbon::createFromTime($time,0,0)->format("H:i:s");
        return Carbon::create($date." ".$carbonTime)->format(DateTime::RFC3339);
    }

    public function getRealtime($time){
        return preg_replace('/[^0-9]/', "",$time);
    }

    public function amPmDecider($time){
        preg_match('/[a-z]./i', $time, $matches);
        if($matches){
            if(strtolower($matches[0]) === "am"){
                return 0;
            }else{
                return 12;
            }
        }
        return 0;
    }

    public function note(Order $order, string $action) :string{
        $description = trim("
        {$order->client->fname} {$order->client->lname}<br>{$order->client->phone_no} $action          
        ");
        return $description;
    }

    public function deliveryNote(Order $order){
        $host = request()->getHost();
        $action = '';
        if($order->delivery_note){
            $action = "<br/><b>Delivery Note</b><br/>{$order->delivery_note}<br/>";
        }else{
            $action .= "<br>";
        }
        $action .= "<br><a href='$host/calendar/update_order/{$order->id}/{$this->userID}/delivered'>Mark as Delivered</a>";
        return $this->note($order, $action);
    }

    public function pickupNote(Order $order){
        $host = request()->getHost();
        $action = '';
        if($order->pickup_note){
            $action = "<br/><b>Pickup Note</b><br/>{$order->pickup_note}<br/>";
        }else{
            $action .= "<br>";
        }
        $action .= "<br><a href='$host/calendar/update_order/{$order->id}/{$this->userID}/pickedup'>Mark as picked up</a>";
        return $this->note($order, $action);
    }

    public function deliveryEvent(Order $order){
        //Refactor this time calculations
        $timeToAdd = $this->amPmDecider($order->delivery_time);
        $deliveryTime = explode('-', $order->delivery_time);
        $startTime = $this->getRealtime($deliveryTime[0]) < 12 ? $this->getRealtime($deliveryTime[0]) + $timeToAdd : $this->getRealtime($deliveryTime[0]);
        $endTime = $this->getRealtime($deliveryTime[1]) + $timeToAdd;
        $startDateTime = $this->createCalendarDateTime($order->delivery_date, $startTime);
        $endDatetime = $this->createCalendarDateTime($order->delivery_date, $endTime);
        return new Google_Service_Calendar_Event([
            'summary' => "Delivery {$order->order_no}",
            'location' => $this->shippingLocationCreater($order),
            'description' => $this->deliveryNote($order),
            "extendedProperties" => [
                "private" => [
                    "orderID" => $order->order_no,
                    "type" => "delivery"
                ]
            ],
            "start" => [
                "dateTime" => $startDateTime,
                'timeZone' => "America/Los_Angeles"
            ],
            "end" => [
                "dateTime" => $endDatetime,
                'timeZone' => "America/Los_Angeles"
            ],
            "colorId" => 2
        ]);
    }

    public function pickupEvent(Order $order){
        //Refactor this time calculations
        $timeToAdd = $this->amPmDecider($order->pickup_time);
        $pickupTime = explode('-', $order->pickup_time);
        $startTime = $this->getRealtime($pickupTime[0]) < 12 ? $this->getRealtime($pickupTime[0]) + $timeToAdd : $this->getRealtime($pickupTime[0]);
        $endTime = $this->getRealtime($pickupTime[1]) + $timeToAdd;
        $startDateTime = $this->createCalendarDateTime($order->pickup_date, $startTime);
        $endDatetime = $this->createCalendarDateTime($order->pickup_date, $endTime);
        return new Google_Service_Calendar_Event([
            'summary' => "Pickup {$order->order_no}",
            'location' => $this->pickupLocationCreater($order),
            'description' => $this->pickupNote($order),
            "extendedProperties" => [
                "private" => [
                    "orderID" => $order->order_no,
                    "type" => "pickup"
                ]
            ],
            "start" => [
                "dateTime" => $startDateTime,
                'timeZone' => "America/Los_Angeles"
            ],
            "end" => [
                "dateTime" => $endDatetime,
                'timeZone' => "America/Los_Angeles"
            ],
            "colorId" => 6
        ]);
    }
}
