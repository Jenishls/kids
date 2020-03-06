<?php
Route::prefix('/admin')->group(function () {


    Route::get('/userlogs', 'UserLogsController@index');

    Route::get('/userlogs/data', 'UserLogsController@logData');
});
