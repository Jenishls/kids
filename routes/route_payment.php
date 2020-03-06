<?php

/**
* Route file for Payment section (admin)
*
*/
Route::prefix('admin/payment')->group(function(){
	Route::get('/', 'PaymentController@index');
	Route::get('/data/list', 'PaymentController@list');
	Route::get('/view/{payment}', 'PaymentController@view');
	Route::get('/add', 'PaymentController@add');
	Route::get('/edit/{payment}','PaymentController@edit');
	Route::get('cardDetails/{payment}','PaymentController@cardDetail');

	// Operational routes //
	Route::post('/store','PaymentController@store');
	Route::post('/update/{payment}','PaymentController@update');
	Route::get('/delete/{payment}','PaymentController@softDelete');
});