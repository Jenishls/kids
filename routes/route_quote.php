<?php

Route::prefix('/admin/quotes')->group(function () {
    Route::get('', 'QuoteController@index');
    Route::get('list', 'QuoteController@quotesData');
    Route::get('add/{type}', 'AddController@addForm');
    Route::post('add', 'AddController@createQuote');
    Route::get('view/{id}', 'AddController@viewQuote');

    Route::get('/vendortype', 'AddController@vendorType');
    Route::get('/lookup/{entity}/{value}', 'AddController@getLookup');
    Route::get('/addform/{entity}/{value}', 'AddController@appendForm');

    Route::get('orderextra', 'AddController@orderExtraModal');
    Route::get('extraOrderData', 'AddController@orderExtraData');

    
    Route::get('edit/{id}', 'EditController@editModal');
    Route::post('edit/{id}', 'EditController@update');
    Route::get('delete/{id}', 'EditController@delete');
    
    // Quote Booking
    Route::get('/detail/{quote}', 'EditController@viewDetailQuote');
    Route::get('confirmBoking/{quote}', 'EditController@confirmBooking');
    Route::get('makeOrder/{quote}', 'EditController@makeOrder');
    Route::POST('makeOrder/{quote}', 'AddController@makeOrder');
    
    Route::get('/orderItems/{quote}', 'QuoteController@orderItemsData');
    Route::get('/addOrderItems/{quote}', 'QuoteController@addOrderItems');
    Route::post('add/{quote}', 'AddController@addQuoteItems');
    
    // Performa Invoice
    Route::get('/invoice/{quote}', 'QuoteController@invoiceData');
    Route::get('/makePerformaInvoice/{quote}', 'QuoteController@makePerformaInvoice');
    Route::post('/makePerformaInvoice', 'AddController@storePerformaInvoice');
    
    // check Inventory
    Route::get('/checkInvoice/{quote}', 'QuoteController@checkInvoice');
    
    // Mail 
    Route::get('compose/{quote}', 'QuoteController@compose');
});
