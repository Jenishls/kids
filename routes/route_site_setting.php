<?php
Route::prefix('/admin')->group(function () {
    Route::get('/siteSetting', 'SiteSettingController@index');
    Route::get('/siteSetting/table', 'SiteSettingController@siteSettingTable');

    //Modal
    Route::get('/siteSetting/addmodal', 'SiteSettingController@addModal');
    Route::get('/siteSetting/editmodal/{id}', 'SiteSettingController@editModal');

    //Sitesetting CRUD operations
    Route::post('/siteSetting/add', 'SiteSettingController@addSiteSetting');
    Route::post('/siteSetting/update/{id}', 'SiteSettingController@updateSiteSetting');
    Route::get('/siteSetting/delete/{id}', 'SiteSettingController@deleteSiteSetting');
    //Export file
    // Route::get('exportFile/{type}', 'SiteSettingController@exportFile')->name('export.file');
});
