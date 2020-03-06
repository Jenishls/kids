<?php

Route::prefix('/admin/accounthead')->group(function () {
    Route::get('', 'AccountHeadController@index');
    Route::get('/list', 'AccountHeadController@accountHeadData');
    Route::get('/tab/{tab}', 'AccountHeadController@getTabs');
    Route::get('/add', 'AddController@addAccountHeadModal');
    Route::post('/add', 'AddController@createAccHead');
    Route::get('/edit/{id}', 'EditController@editAccHeadModal');
    Route::post('/edit/{id}', 'EditController@updateAccHead');
    Route::get('/delete/{id}', 'EditController@deleteAccHead');
    Route::get('/getAccountHead', 'AccountHeadController@getAccountHeadData');

    // Account Sub Head
    Route::get('/subhead/list', 'AccountHeadController@getSubheadData');
    Route::get('/subhead/add', 'AddController@addSubheadModal');
    Route::post('/subhead/add', 'AddController@createSubHead');
    Route::get('/subhead/edit/{id}', 'EditController@editSubheadModal');
    Route::post('/subhead/edit/{id}', 'EditController@updateSubHead');
    Route::get('/subhead/delete/{id}', 'EditController@deleteSubHead');
    Route::get('/subhead/select2/list', 'AccountHeadController@subHeadData');

    // Account Sub Head Items
    Route::get('/subheaditems/list', 'AccountHeadController@getSubheadItemData');
    Route::get('/subheaditems/add', 'AddController@addSubheadItemsModal');
    Route::post('/subheaditems/add', 'AddController@createSubheadItem');
    Route::get('/subheaditems/edit/{id}', 'EditController@editSubheadItemModal');
    Route::post('/subheaditems/edit/{id}', 'EditController@updateSubheadItem');
    Route::get('/subheaditems/delete/{id}', 'EditController@deleteSubHeadItem');

    // Route::get('/accheadslookup', 'AccountHeadController@getAccHeadLookup');
});
