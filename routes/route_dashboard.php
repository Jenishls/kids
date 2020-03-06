<?php
Route::prefix('admin/')->group(function () {
    Route::get('dashboard','AdminDashboardController@index');
   
});