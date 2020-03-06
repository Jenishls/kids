<?php

Route::get('/admin/communication_preferences','CommunicationPrefController@index');
Route::get('/admin/communication_preferences/data','CommunicationPrefController@data');
//------------------------------CRUD Route--------------------------------------------------//
Route::get('/admin/communication_preferences/add','CommunicationPrefController@add');
Route::get('/admin/communication_preferences/store','CommunicationPrefController@store');
Route::get('/admin/communication_preferences/edit/{communication_preferences}','CommunicationPrefController@edit');
Route::post('/admin/communication_preferences/update/{communication_preferences}','CommunicationPrefController@update');

//------------------------------ Select2 Routes --------------------------------------//
