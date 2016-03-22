<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\GoogleCalendar;

use App\Http\Requests;
use App\Http\Response;

class CalendarController extends Controller
{
    public function index(GoogleCalendar $calendar)
    {
        $calendarId = "p3ol3iomgjspr2nssld48jm9f8@group.calendar.google.com";
        $optParams = array(
  /*'maxResults' => 10,
  'orderBy' => 'startTime',
  'singleEvents' => TRUE,
  'timeMin' => date('c'),
  'timeMax' => '2016-03-21T10:00:00-07:00'*/
);
        $events = $calendar->service->events->listEvents($calendarId, $optParams);
        //return $events->items;
        //return compact('events');
        //print_r($events);
        //return json_encode($events->items);
        return view('calendar-google', compact('events'));
        //return view('calendar-google');
        //return compact($events);

    }

    public function events(GoogleCalendar $calendar)
    {
        $calendarId = "p3ol3iomgjspr2nssld48jm9f8@group.calendar.google.com";
        $optParams = array(
  /*'maxResults' => 10,
  'orderBy' => 'startTime',
  
  'timeMin' => date('c'),
  'timeMax' => '2016-03-21T10:00:00-07:00'*/
  //'singleEvents' => TRUE
);
        $events = $calendar->service->events->listEvents($calendarId, $optParams);
        /*foreach ($events->getItems() as $event) {
    			echo $event->getSummary();
  			}*/
        return $events->items;
        //return compact('events');
        //print_r($events);
        //$e = compact('events');
        //dd($e->items);
        //return json_encode($events->items);
        //return view('calendar-google', compact('events'));
        //return compact('events');

    }

    public function store(GoogleCalendar $calendar)
    {
        $calendarId = "p3ol3iomgjspr2nssld48jm9f8@group.calendar.google.com";
        $event = new \Google_Service_Calendar_Event(array(
				  'summary' => 'Google I/O 2015',
				  'location' => '800 Howard St., San Francisco, CA 94103',
				  'description' => 'A chance to hear more about Google\'s developer products.',
				  'start' => array(
				    'dateTime' => '2016-03-21T09:00:00-07:00',
				    'timeZone' => 'America/Los_Angeles',
				  ),
				  'end' => array(
				    'dateTime' => '2016-03-21T17:00:00-09:00',
				    'timeZone' => 'America/Los_Angeles',
				  )
				));

			$calendar->insertEvent($calendarId, $event);
//return 'Event created: %s\n' . $event->htmlLink;
    }
}
