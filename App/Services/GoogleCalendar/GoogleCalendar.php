<?php

namespace App\Services\GoogleCalendar;

use Carbon\Carbon;
use DateTime;
use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;

class GoogleCalendar{

    /** @var \Google_Service_Calendar */
    protected $calendar;

    /** @var string */
    protected $calendarID;

    public function __construct(Google_Service_Calendar $calendar, string $calendarID){
        $this->calendar = $calendar;
        $this->calendarID = $calendarID;
    }

    public function listEvents(Carbon $startDateTime = null, Carbon $endDateTime = null, array $queryParameters = []){
        $params = array(
            'orderBy' => 'startTime',
            'singleEvents' => true,
            // 'timeMin' => date('c'),
            // 'privateExtendedProperty' => 'orderID = #22245'
        );

        if (is_null($startDateTime)) {
            $startDateTime = Carbon::now()->startOfDay();
        }
        $params['timeMin'] = $startDateTime->format(DateTime::RFC3339);
        $params = array_merge($params, $queryParameters);
        return $this
            ->calendar
            ->events
            ->listEvents($this->calendarID, $params);
    } 

    public function getAllEvents(Carbon $startDateTime = null, Carbon $endDateTime = null, array $queryParameters = []){
        return $this->listEvents($startDateTime, $endDateTime, $queryParameters)->getItems();
    }

    public function getallEventsWithExtendedProp(array $props){
        return $this->listEvents(null, null, $props)->getItems();
    }

    public function store(Google_Service_Calendar_Event $event){    
        $this->calendar->events->insert('primary', $event);
        // printf('Event created: %s\n', $event->htmlLink);
    }



}
