<?php
Route::prefix('admin/layout')->group(function () {
    Route::get('index','LayoutController@index');
   
});