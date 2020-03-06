<?php

           
Route::prefix('admin/inventories')->group(function () {
    Route::get('/','InventoryViewController@index');
    Route::get('/add','InventoryViewController@addInventory');
    Route::get('/detail/{order}','InventoryViewController@inventoryDetail');
    Route::get('/data','InventoryViewController@inventoryData');
    Route::get('/payments/{inventory}','InventoryViewController@paymentData');
    Route::get('/invoice/{inventory}','InventoryViewController@invoiceData');
    Route::get('/inventoryItems/{package}','InventoryViewController@inventoryItemsData');
    Route::get('model','InventoryViewController@model');
    Route::post('store','InventoryStoreController@store');
    Route::post('update','InventoryUpdateController@update');
    //template route
    Route::post('/template/create','InventoryTemplateController@create');
});
