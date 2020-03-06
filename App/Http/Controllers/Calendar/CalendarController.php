<?php

namespace App\Http\Controllers\Calendar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Services\Calculators\OrderTimeCalculator;
use App\Services\GoogleCalendar\GoogleCalendar;
use App\Services\GoogleCalendar\GoogleCalendarFactory;
use App\Services\GoogleCalendar\GoogleClient;
use App\User;
use Carbon\Carbon;
use DateTime;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;

class CalendarController extends Controller
{
    public function index(){  
        return view('supportNew.pages.calendar.index');
    }    

    public function googleSync(Request $request){
        $googleClientInstance = new GoogleClient();
        $googleClient = $googleClientInstance->setupClient($request);
        if($googleClient instanceof RedirectResponse){
            return $googleClient;
        }        
        return redirect('/admin#admin/calendar');
    }

    public function google(Request $request){
        dd($request->all());
        dd($request);
    }

    public function events(Request $request){
        $googleClientInstance = new GoogleClient();
        $googleClient = $googleClientInstance->setupClient($request);
        if($googleClient instanceof RedirectResponse){
            return [];
        }
        
        $googleCalendar = new GoogleCalendar(new Google_Service_Calendar($googleClient), 'primary');
        $events = $googleCalendar->getAllEvents(null, null, [
            'timeMin' => Carbon::parse($request->start)->format(DateTime::RFC3339),
            'timeMax' => Carbon::parse($request->end)->format(DateTime::RFC3339),
            // 'q' => "#cos-00036",
            // "privateExtendedProperty" => ['type = delivery', 'orderID = #COS-00036']
        ]);
        $fullCalendarEvents = [];
        foreach($events as $event){
            $fullCalendarEvents[] = [
                "title" => "{$event->getSummary()}",
                "start" => $event->start->dateTime,
                "description" => $event->getDescription() ? preg_replace('/(mark\sas\sdelivered)|(mark\sas\spicked\sup)/i', '',ucfirst($event->getDescription())) : '',
                "end" => $event->end->dateTime,
                "color" => $event->getColorId() == 2 ? "#33b679" : "#f4511e",
                "className" => ["cal-text-white"]
            ];
        }
        return $fullCalendarEvents;
    }

    /** move this somewhere else */
    public function transformToKeyValuePair(array $dataArray, $key = "name", $value="value"){
        $mapped = array_map(function($data) use($key, $value){
            return [
                $data[$key] => $data[$value]
            ];
        }, $dataArray);
        return collect($mapped)->collapse();
    }
 
    public function orderEvents(){
        $search = $this->transformToKeyValuePair(request()->search);
        $fullCalendarEvents = Order::whereNotNull('delivery_time')
            ->whereNotNull('pickup_time')
            ->whereBetween('created_at', [request()->start, request()->end])
            ->when(array_get($search, 'order_no'), function($q, $orderNo){
                $q->where('order_no', 'like', "%$orderNo%");
            })
            ->whereHas('client', function($q) use($search){
                $q
                ->when(array_get($search, 'name'), function($clientQuery, $name){
                    $clientQuery->where(function($client) use($name){
                        $client->where('fname', 'like', "%$name%")
                                ->orWhere('lname', 'like', "%$name%");
                    });
                })->when(array_get($search, 'phone_no'), function($clientQuery, $phone){
                    $clientQuery->where('phone_no','like', "%$phone%");
                });
            })
            ->get()
            ->reduce(function($events, $order) use($search){
                $cal = new OrderTimeCalculator($order);        
                if(array_get($search, 'type') === "delivery" || array_get($search, 'type') === 'all'){
                    $deliveryEvent = [
                        "title" => "Delivery {$order->order_no}",
                        "start" => $cal->fetch('delivery_start_date')->deliveryDateTime(),
                        "description" => trim("
                            <b>{$order->client->fname} {$order->client->lname}</b><br/>
                            <span>{$order->client->phone_no}</span><br/>
                            <span>{$order->shippingAddr->add1}, {$order->shippingAddr->city}, {$order->shippingAddr->state} {$order->shippingAddr->zip}</span><br/>
                            <span>{$order->delivery_note}</span>
                        "),
                        "end" => $cal->fetch('delivery_end_date')->deliveryDateTime(),
                        "color" => "#33b679",
                        "className" => ["cal-text-white"]
                    ];
                }else{
                    $deliveryEvent = [];
                }
                
                if(array_get($search, 'type') === "pickup" || array_get($search, 'type') === 'all'){
                    $pickupEvent = [
                        "title" => "Pickup {$order->order_no}",
                        "start" => $cal->fetch('pickup_start_date')->pickupDateTime(),
                        "description" => trim("
                        <b>{$order->client->fname} {$order->client->lname}</b><br/>
                        <span>{$order->client->phone_no}</span><br/>
                        <span>{$order->shippingAddr->add1}, {$order->shippingAddr->city}, {$order->shippingAddr->state} {$order->shippingAddr->zip}</span><br/>
                        <span>{$order->pickup_note}</span>
                        "),
                        "end" => $cal->fetch('pickup_end_date')->pickupDateTime(),
                        "color" => "#f4511e",
                        "className" => ["cal-text-white"]
                    ];
                }else{
                    $pickupEvent = [];
                }
                
                array_push($events, $deliveryEvent, $pickupEvent);
                return $events;
        }, []);
        return $fullCalendarEvents;
    }

    /**
     * Get calendar type
     *
     * @param string $type
     * @return \Illuminate\View\View
     */
    public function calendar(string $type) : \Illuminate\View\View{
        switch(true){
            case $type === "calendar":
                return view('supportNew.pages.calendar._calendar');
            default:
                return view('supportNew.pages.calendar._google-calendar');                
        }
    }

    // public function storeToCalendar(Request $request){
    //     // $googleClientInstance = new GoogleClient();
    //     // $googleClient = $googleClientInstance->setupClient($request);
    //     // if($googleClient instanceof RedirectResponse){
    //     //     return [];
    //     // }
    //     // $googleCalendar = new GoogleCalendar(new Google_Service_Calendar($googleClient), 'primary');
    //     // $events = $googleCalendar->getallEventsWithExtendedProp(["privateExtendedProperty" => ['type = pickup', 'orderID = #22245']]);
    //     // dd($events[0]->getExtendedProperties());

    //     // return;
       
    //     $googleClientInstance = new GoogleClient();
    //     $googleClient = $googleClientInstance->setupClient($request);
    //     if($googleClient instanceof RedirectResponse){
    //         return [];
    //     }
    //     $event = new Google_Service_Calendar_Event([
    //         'summary' => "with links for #12312",
    //         'location' => '800 Howard St., San Francisco, CA 94103',
    //         'description' => 'A chance to hear more about Google\'s developer products. <br/> test <br/> <a href="https://cratesonskates.systha.com">click me</a>',
    //         "extendedProperties" => [
    //             "private" => [
    //                 "orderID" => "#22245",
    //                 "type" => "pickup"
    //             ]
    //         ],
    //         "start" => [
    //             "dateTime" => now(),
    //             'timeZone' => "America/Los_Angeles"
    //         ],
    //         "end" => [
    //             "dateTime" => now(),
    //             'timeZone' => "America/Los_Angeles"
    //         ],
    //         "colorId" => 2
    //     ]);
    //     $service = new Google_Service_Calendar($googleClient);
    //     $calendar = new GoogleCalendar($service, 'primary');
    //     $calendar->store($event);
     
    // }

   

    /**
     * 1 light blue
     *  2 green
     * 3 purple
     * 4 light red
     * 
     *  6 red
     * 
     */  

    
}
