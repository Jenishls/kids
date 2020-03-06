<?php

           
Route::prefix('admin/order')->group(function () {
    Route::get('/','OrderViewController@index');
    Route::get('/detail/{order}','OrderViewController@orderDetail');
    Route::get('/data','OrderViewController@orderData');
    Route::get('/payments/{order}','OrderViewController@paymentData');
    Route::get('/invoice/{order}','OrderViewController@invoiceData');
    Route::get('/orderItems/{package}','OrderViewController@orderItemsData');
    Route::get('model','OrderViewController@model');
    Route::get('/edit/{order}','OrderViewController@editOrder');
    Route::post('store','OrderAddController@store');
    Route::post('/edit/{order}','OrderUpdateController@updateOrder');
    
    // Pickup
    Route::get('/edit/pickup/{order}','OrderViewController@editPickup');
    Route::POST('/edit/pickup/{order}','OrderUpdateController@UpdatePickup');
    Route::get('/addInvoice/{order}','OrderViewController@addInvoice');
    Route::POST('/addInvoice/{order}','OrderStoreController@addInvoice');
    Route::get('/addRefundInvoice/{order}','OrderViewController@refundInvoice');
    Route::POST('/addInvoice/{order}','OrderStoreController@addInvoice');
    
    // Moving/Delivery
    Route::get('/edit/moving/{order}','OrderViewController@editMoving');
    Route::POST('/edit/moving/{order}','OrderUpdateController@UpdateMoving');
    
    // Add Order Items
    Route::get('/addOrderItems/{order}','OrderViewController@addOrderItems');
    Route::POST('/addOrderItems/{order}','OrderStoreController@addOrderItems');
    
    
    Route::get('/pickupOrderItems/{order}','OrderViewController@pickupOrderItems');
    Route::POST('/pickupOrderItems/{order}','OrderUpdateController@pickupOrderItems');
    
    // delete Order
    Route::POST('/delete/{order}','OrderUpdateController@deleteOrder');
    
    // Add Order 
    Route::get('/add','OrderViewController@addOrder');
    Route::POST('/add','OrderStoreController@addOrder');
    
    // All packages
    Route::get('/add/package/{order}','OrderViewController@addOrderPackage');
    Route::get('/package/{package}','OrderViewController@packageItems');
    Route::POST('/add/package/{order}','OrderStoreController@addPackage');
    Route::POST('/package/all','OrderViewController@allPackage');
    
    // All Users
    Route::POST('/users/all','OrderViewController@allUsers');
    
    // Audit
    Route::get('/audit/detail/{audit}','OrderViewController@viewAudit');
    
    // Status
    Route::get('/status/{order}','OrderViewController@editStatus');
    Route::POST('/status/{order}','OrderUpdateController@updateStatus');
    
    // Payment
    Route::get('/payment/{order}','OrderViewController@makePayment');
    Route::get('/directPayment/{order}','OrderViewController@makeDirectPayment');
    Route::POST('/payment/{order}','OrderStoreController@makePayment');
    
    // Note
    Route::POST('/note/add/{order}','OrderStoreController@storeNote');
    Route::POST('/note/update/{id}','OrderUpdateController@updateNote');
    Route::POST('/note/update/{id}','OrderUpdateController@updateNote');
    Route::get('/note/delete/{note}','OrderUpdateController@deleteNote');
    
    // quote
    Route::POST('/quote/order/{quote}','OrderStoreController@makeQuoteOrder');
    
    Route::post('send_sms', 'OrderStoreController@sms');
    
    
    // order pickup and delivery pdf roures
    Route::get('/pickup/','OrderViewController@pickup');
    Route::get('/pickup/data','OrderViewController@orderPickupData');

    // Mail
    Route::get('/compose/{order}','OrderViewController@compose');
    Route::post('sendMail/{id}','MailStoreController@sendMail');
});