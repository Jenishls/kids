<?php

Route::prefix('/admin/bills')->group(function () {
    Route::get('', 'BillsController@index');
    Route::get('list', 'BillsController@billsData');
    Route::get('add', 'AddController@addModal');
    Route::get('getExpanseHead', 'EditController@getExpanseHEad');
    Route::post('add', 'AddController@createBill');
    Route::get('view/{id}', 'BillsController@viewBill');
    Route::get('status/{bill}/{status}', 'EditController@updateBillStatus');
    Route::get('cancel/{bill}', 'BillsController@cancelBillModal');
    Route::post('cancel/{bill}', 'EditController@addCancelNote');

    Route::get('viewnote/{bill}', 'BillsController@viewBillNote');

    Route::get('edit/{id}', 'EditController@editBillModal');
    Route::post('edit/{id}', 'EditController@updateBill');
    Route::get('delete/{id}', 'EditController@deleteBill');

    // select 2
    Route::get('getMember', 'BillsController@getMembers');
    Route::get('getAccount', 'BillsController@getAccounts');
    Route::get('getAccountHead/{type?}', 'BillsController@getAccountHead');

    // File Upload
    Route::get('uploadfile/{bill}', 'BillsController@fileUploadModal');
    Route::post('processfiles/{bill}', 'AddController@processFiles');

    Route::get('print/{bill}', 'BillsController@printBill');
});
