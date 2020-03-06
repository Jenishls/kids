<?php
Route::prefix('/admin')->group(function () {

    Route::get('/lookUp', 'LookUpController@index');
    // Route::get('/lookUp/table/{id}' , 'LookUpController@lookUpTable');
    Route::get('/lookupTable/{id}', 'LookupController@lookupTable');
    Route::get('/lookUp/list/{id}', 'LookUpController@lookUpList');
    Route::get('/lookUp/child/{name}/{id}', 'LookUpController@lookUpChild');

    // Lookup CRUD Modals
    Route::get('/lookup/addLookupModal/{section_id}', 'LookupController@addLookupModal');
    Route::get('/lookup/editLookupModal/{lookup_id}', 'LookupController@editLookupModal');
    Route::get('lookup/addGroup/{group}/{id}', 'LookupController@addToGroup');

    // Lookup CRUD Operations
    Route::post('/lookup/newLookup', 'LookupController@addNewLookup');
    // Route::post('/lookup/newLookupToGroup', 'LookupController@addNewLookupTo');
    Route::post('/lookup/editLookup/{lookup_id}', 'LookupController@editLookup');
    Route::get('/lookup/deleteLookup/{lookup_id}', 'LookupController@deleteLookup');
    Route::get('/lookup/deleteLookupGroup/{group}', 'LookupController@deleteLookupGroup');

    // Lookup Sections 
    Route::get('/lookup/addSectionModal', 'LookupController@addSectionModal');
    Route::get('/lookup/editSectionModal/{id}', 'LookupController@editSectionModal');

    // Lookup Sections CRUD
    Route::post('/lookup/newSection', 'LookupController@addNewSection');
    Route::post('/lookup/editSection/{id}', 'LookupController@editLookupSection');
    Route::get('/lookup/deleteSection/{id}', 'LookupController@deleteLookupSection');


    //lookup show section
    Route::get('/lookup/{code}','LookupShowController@list');
});
