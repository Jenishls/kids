<?php
Route::prefix('/admin')->group(function () {

    Route::get('/projects', 'ProjectsController@index');
});
