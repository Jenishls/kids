<?php

Route::prefix('admin/enquiry')->group(function () {
    Route::get('', 'EnquiryController@index');
    Route::get('list', 'EnquiryController@enquiries');
    Route::get('view/{id}', 'EnquiryController@viewEnqModal');
    Route::get('convert_to_client', 'EnquiryController@convertToClient');
    Route::get('add', 'EnquiryController@add');
    Route::post('store', 'EnquiryController@store')->middleware('cleanMasked');
});

