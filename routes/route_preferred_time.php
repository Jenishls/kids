<?php
Route::prefix('/admin/preferredtime')->group(function () {

    //Index
    Route::get('/', 'PreferredTimeController@index');
    Route::get('/data/list/{type}', 'PreferredTimeController@list');

    // modal
    Route::get('/type/addtype', 'PreferredTimeAddController@addTypeModal');
    Route::get('time/add', 'PreferredTimeAddController@addTimeModal');

    Route::get('/time/edit/{id}', 'PreferredTimeController@editTimeModal');
    Route::get('/edittype/{id}', 'PreferredTimeController@editTypeModal');


    // store
    Route::post('/type/store', 'PreferredTimeAddController@storeType');
    Route::post('/time/store', 'PreferredTimeAddController@storeTime');

    // update
    Route::post('/updatetime/{id}', 'PreferredTimeController@updateTime');

    // delete
    Route::get('/del/{id}', 'PreferredTimeController@deleteMenu');
});
