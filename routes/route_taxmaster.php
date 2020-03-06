<?php
Route::prefix('/admin/taxmaster')->group(function () {
    Route::get('/', 'TaxMasterViewController@index');
    Route::get('/data/list', 'TaxMasterViewController@list');

    // modal
    Route::get('/addtax', 'TaxMasterAddController@addTaxModal');
    Route::get('/edit/tax/{id}', 'TaxMasterEditController@editTaxModal');

    // store tax
    Route::post('/storetax', 'TaxMasterAddController@storeTax');

    // update
    Route::post('/updatetax/{id}', 'TaxMasterEditController@updateTax');

    // delete
    Route::get('/del/{id}', 'TaxMasterViewController@deleteTax');
});
