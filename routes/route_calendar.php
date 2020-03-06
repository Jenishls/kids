<?php

Route::prefix('/admin/calendar')->group(function () {
    Route::get('/', 'CalendarController@index');
    Route::get('sync-google','CalendarController@googleSync');        
    Route::get('events', 'CalendarController@events');
    Route::get('order_events', 'CalendarController@orderEvents');
    // Route::get('store', 'CalendarController@storeToCalendar');
    // Route::get('test', 'CalendarController@test');

    Route::get('fetch_calendar/{type}', 'CalendarController@calendar');
    
});
