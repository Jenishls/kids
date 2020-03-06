<?php
Route::prefix('admin/package')->group(function(){
    Route::get('/','PackageViewController@index');
    Route::get('/add','PackageViewController@addPackage');
    Route::POST('/add','PackageStoreController@storePackage');
    Route::get('/allData','PackageViewController@allPackageData');
    Route::POST('/type/all','PackageViewController@allPackageType');
    Route::get('/allInvData','PackageViewController@allInvData');
    Route::get('/items/{package}','PackageViewController@allPackageItemData');
    Route::get('/search/items','PackageViewController@searchItem');
    Route::get('/edit/{package}','PackageViewController@editPackage');
    Route::get('/editPackage/{package}','PackageViewController@editPackageOnly');
    Route::get('/status/update/{package}','PackageViewController@editPackageStatus');
    Route::POST('/status/update/{package}','PackageUpdateController@updatePackageStatus');
    Route::get('/delete/{package}','PackageDeleteController@deletePackage');
    Route::POST('/update/{package}','PackageUpdateController@updatePackage');
    Route::get('/detail/{package}','PackageViewController@packageDetail');
    Route::get('/categories','PackageViewController@getCategories');
    
    
    Route::POST('/category/all','PackageViewController@allCategories');
    Route::POST('/brands/all','PackageViewController@allBrands');
    Route::POST('/colors/all','PackageViewController@allColors');
    Route::POST('/size/all','PackageViewController@allSizes');
    Route::POST('/company/all','PackageViewController@allCompanies');
    Route::POST('/sub_category','PackageViewController@subCategories');

    Route::get('/thumb/{file}','PackageViewController@viewPackageThumb');
    Route::get('/edit/thumb/{file}','PackageViewController@editPackageThumb');
    Route::POST('/updateThumb/{package}','PackageUpdateController@updateThumb');

    
    
    
});