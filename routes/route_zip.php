<?php


Route::get('admin/zip', 'ZipController@index');
Route::get('/zip/list', 'ZipController@zipList');
// modal
Route::get('zip/add', 'ZipController@addZipModal');
Route::get('zip/edit/{id}', 'ZipController@editZipModal');
// store 
Route::post('zip/add', 'ZipController@storeZip');
// update
Route::post('/zip/updateZip/{id}', 'ZipController@updateZip');
Route::get('/zip/deleteZip/{id}', 'ZipController@deleteZip');
