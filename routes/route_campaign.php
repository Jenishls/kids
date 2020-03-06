<?php

Route::prefix('/admin/campaign')->group(function () {
	Route::get('/', 'CampaignController@index'); //requires type in the request(header)
	Route::get('/list', 'CampaignController@list');
	Route::get('/activities/{campaign}', 'CampaignController@activities'); 
	Route::get('/view/{campaign}', 'CampaignController@view');
	//Activities Section 
	Route::get('/activites/list/{campaign}','CampaignActivityController@list');//list route
	Route::get('/activity/{activity}','CampaignActivityController@view');
	//supplier Section 
	Route::get('/suppliers/list/{campaign}','CampaignSupplierController@list');//list route
	Route::get('/suppliers/add/{campaign}', 'CampaignSupplierController@add'); 
	Route::post('/suppliers/store/{campaign}', 'CampaignSupplierController@store'); 
	// modal routes
	Route::get('/status/{campaign}','CampaignController@statusModal');
	Route::get('/add', 'CampaignController@add'); 
	Route::get('/edit/{campaign}', 'CampaignController@edit');
	//store routes
	Route::post('/store','CampaignStoreController@store');
	//update routes
	Route::post('/update/general/{campaign}','CampaignUpdateController@general');
	Route::post('/update/activities/{campaign}','CampaignUpdateController@activities');
	Route::post('/status/{campaign}','CampaignUpdateController@status');
	//validation route
	Route::post('/validate/{name}','CampaignValidationController@main');
	//select2 datas
	Route::post('/mailingList/select2Data','CampaignDataController@mailingList');
	Route::post('/template/select2Data','CampaignDataController@template');
	Route::post('/users/select2Data','CampaignDataController@users');
	Route::post('/activityName/select2Data','CampaignDataController@activityName');
	Route::post('/activityType/select2Data','CampaignDataController@activityType');
	Route::post('/type_of_services/select2Data','CampaignDataController@typeOfServices');
	Route::post('/supplier_status/select2Data','CampaignDataController@supplierStatus');
});