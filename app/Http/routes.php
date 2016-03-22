<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    
    Route::get('/', function () { return view('home'); });
    // fullcalendar: Route::get('/calendar', function () { return view('calendar'); });

    Route::get('/calendar-google', 'CalendarController@index');
    Route::get('/calendar-google-events', 'CalendarController@events');
    Route::get('/new-calendar-google', 'CalendarController@store');

});
