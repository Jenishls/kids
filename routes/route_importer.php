<?php

Route::prefix('admin/import')->group(function(){
	Route::post('/csv','ImportController@uploadCSV');
});