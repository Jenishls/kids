<?php
Route::prefix('/admin/client')->group(function () {
    Route::get('/', 'ClientController@index');
    Route::get('/list', 'ClientController@client');
    Route::get('/orders/{client}/list', 'ClientController@orderData');
    Route::get('/order/{order}', 'ClientController@singleOrder');
    // Client form validation
    Route::post('/validate/{form}', 'ClientController@validateFormSteps');
    // modal
    Route::get('/add', 'ClientAddController@addClientModal');
    Route::get('/edit/{id}', 'ClientEditController@editClientModal');
    Route::get('/editcontactdetails/{client}', 'ClientEditController@editContactModal');
    // store 
    Route::post('/add', 'ClientAddController@storeClient');
    Route::post('/add/note/{id}', 'ClientAddController@storeClientNote');
    // update
    Route::post('/updateClient/{id}', 'ClientEditController@updateClient');
    Route::post('/updatecontactaddress/{client}','ClientEditController@updateFromView');
    Route::get('/deleteClient/{id}', 'ClientEditController@deleteClient');
    // client profile
    Route::get('/clientProfile/{id}', 'ClientController@clientProfile');
    Route::post('/profileImage/{id}', 'ClientEditController@updateProfileImage');

    Route::post('/profile/image/update/{client}', 'ClientEditController@updatePImage');

    Route::get('/profile/image/view/{file}', 'ClientController@viewProfileImage');
    // Process attachment Files
    Route::get('/addfiles/{id}', 'ClientAddController@filesModal');
    Route::post('/addfiles/{client}', 'ClientAddController@storeAttachment');
    Route::post('/processfiles', 'ClientController@processAttachments');
    Route::get('/getcompanyaddress/{name}', 'ClientAddController@getAddress');
    // Client Notes
    Route::get('/addnote/{id}', 'ClientAddController@noteModal');
    Route::get('/editnote/{id}', 'ClientEditController@noteEditModal');
    Route::post('/update/note/{id}', 'ClientEditController@updateNote');
    Route::get('/deletenote/{id}', 'ClientEditController@deleteNote');
    // Company lookup
    Route::get('/companies/edit/{client}', 'ClientController@companyEditModal');
    Route::post('/company/update/{client}', 'ClientEditController@updateCompany');
    Route::get('/companies/{name?}', 'ClientController@getCompanies');
    Route::get('/filetitle/{id}/{title}', 'ClientEditController@attachmentTitleChange');
    Route::get('/download/{filename}', function ($filename) {
        $filepath = storage_path('client/attachments/') . $filename;
        return \Response::download($filepath);
        // dd($filename);
    });

    //payment tab
    Route::get('/payment/{client}', 'ClientController@paymentData');
    //status change Route
    Route::get('/status/{client}','clientEditController@statusModal');
    Route::post('/status/update/{client}','clientEditController@updateStatus');
    //Communication Preferences
    Route::post('/comm_pref/update/{client}','clientEditController@updateCommPref');
    //Payment Card
    Route::get('/paymentCard/{client}','ClientPaymentCardController@list');


});
