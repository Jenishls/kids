<?php
Route::prefix('admin/mail')->group(function () {
    Route::get('/allMails/{table}/{id}','MailViewController@mailData');
    Route::get('/compose/{id}','MailViewController@compose');
    Route::post('sendMail/{id}','MailStoreController@sendMail');
    Route::get('/allUserMail','MailViewController@allUserMails');
    Route::get('/view/{mail}','MailViewController@viewMail');
    Route::get('/detail/{order}','MailViewController@orderDetail');
    Route::get('/payments/{order}','MailViewController@paymentData');
    Route::get('/invoice/{order}','MailViewController@invoiceData');
    Route::get('/orderItems/{package}','MailViewController@orderItemsData');
    Route::get('model','MailViewController@model');
    Route::post('update','MailUpdateController@update');
    Route::get('/attachment/{file}','MailViewController@attachment');
});
