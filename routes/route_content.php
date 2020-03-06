<?php

/**
* Route file for content section (admin)
*
*/

Route::prefix('admin/content')->group(function(){
	Route::get('/', 'ContentController@index');
	Route::get('outer/list', 'ContentController@outer');
	Route::get('/add', 'ContentController@add');
	Route::get('/category/add', 'ContentController@categoryAdd');
	Route::post('/category/store', 'ContentCategoryController@store');
	Route::post('/category/list', 'ContentCategoryController@list');

	Route::get('/edit/{content}','ContentController@edit');
	// Operational routes //
	Route::post('/store','ContentController@store');
	Route::post('/update/{content}','ContentController@update');
	Route::get('/delete/{content}','ContentController@softDelete');
});