<?php 

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Carbon\Carbon;

class GoogleCalendar
{

    protected $client;

    protected $service;

    protected $calendarId;

    public function __construct()
    {
        /* Get config variables */
        $client_id = Config::get('google.client_id');
        $service_account_name = Config::get('google.service_account_name');
        $key_file_location = base_path() . Config::get('google.key_file_location');
        $this->calendarId = env('GOOGLE_CALENDAR_ID', '');

        $this->client = new \Google_Client();
        $this->client->setApplicationName("Your Application Name");
        $this->service = new \Google_Service_Calendar($this->client);

        /* If we have an access token */
        if (Cache::has('service_token')) {
            $this->client->setAccessToken(Cache::get('service_token'));
        }

        $key = file_get_contents($key_file_location);
        /* Add the scopes you need */
        $scopes = array('https://www.googleapis.com/auth/calendar');
        $cred = new \Google_Auth_AssertionCredentials(
            $service_account_name,
            $scopes,
            $key
        );

        $this->client->setAssertionCredentials($cred);
        if ($this->client->getAuth()->isAccessTokenExpired()) {
            $this->client->getAuth()->refreshTokenWithAssertion($cred);
        }
        Cache::forever('service_token', $this->client->getAccessToken());
    }

    /*public function get($calendarId)
    {
        // get cal info
        //$results = $this->service->calendars->get($calendarId);
        $calendar = $this->service->events->listEvents($calendarId);
        //dd($results);
        return view('events', compact('calendar'));
    }
*/
    
    /**
     * Carbon helper function 
     * convert fullcalendar date into iso string for Google calendar
     * MOVE TO HELPER
     */
    public function convertDateToISO($date)
    {
        $carbon = new Carbon($date, 'Europe/Vienna');
        $date = $carbon->toIso8601String();
        return $date;
    }

    /**
     * Get all events for a certain start & end date
     * return new array optimised for fullcalendar
     */
    public function listEvents($timeMin, $timeMax)
    {
        
        $timeMin = $this->convertDateToISO($timeMin);
        $timeMax = $this->convertDateToISO($timeMax);
        $optParams = array(
          'maxResults' => 999,
          'orderBy' => 'startTime',
          'timeMin' => $timeMin,
          'timeMax' => $timeMax,
          'singleEvents' => true
        );
        $allevents = $this->service->events->listEvents($this->calendarId, $optParams);
        $events = $allevents->items;
        foreach ($events as $event) {
            $items[] = array(
                'id' => $event->id,
                'title' => $event->summary,
                'start' => $event->start->dateTime,
                'end' => $event->end->dateTime,
                'description' => $event->description
            );
        }
        return $items;
    }

    public function insertEvent($calendarId, $event)
    {
        $events = $this->service->events->insert($calendarId, $event);
        return $events;
    }
}
