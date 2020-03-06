<?php

Route::prefix('admin/address')->group(function () {
    Route::get('table','AddressViewController@index');
    Route::get('table/data','AddressViewController@data');
    Route::get('modal','AddressViewController@model');
    Route::post('store','AddressStoreController@store');
    Route::post('update','AddressUpdateController@update');
});