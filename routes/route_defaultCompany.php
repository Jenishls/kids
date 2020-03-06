<?php
//index

use App\Http\Controllers\DefaultCompany\DefaultCompanyController;
use App\Model\DefaultCompany;
//main page
Route::get('system/defaultCompany' , 'DefaultCompanyController@index');

//table list
Route::get('/option/list', 'DefaultCompanyController@DefaultCompanyList');

//modal
Route::get('option/add', 'DefaultCompanyController@add_option_modal');
Route::get('/option/updateModal/{id}', 'DefaultCompanyController@updateOptionModal');


// store option 
Route::post('option/store', 'DefaultCompanyController@store');

// edit/update option 
Route::post('/option/update/{id}', 'DefaultCompanyController@updateOption');

// delete option
Route::get('/option/delete/{id}', 'DefaultCompanyController@deleteOption');

// business hour table
Route::get('/hours/list', 'DefaultCompanyController@BusinessHoursList');

// business hour add Modal
Route::get('hour/add', 'DefaultCompanyController@addHourModal');

// business hour update modal
Route::get('/hour/updateModal/{id}', 'DefaultCompanyController@updateHourModal');

// business hour store 
Route::post('hour/store', 'DefaultCompanyController@businessHourStore');

//update hour
Route::post('/hour/update/{id}', 'DefaultCompanyController@updateHour');

// delete hour
Route::get('/hour/delete/{id}', 'DefaultCompanyController@deleteHour');
// logo upload
Route::get('logo/add', 'DefaultCompanyController@logoAddModal');
Route::post('/update/logo', 'DefaultCompanyController@updateCompanyLogo');
Route::post('/defaultCompany/logo/upload', 'DefaultCompanyController@storeDefaultCompanyLogo');

Route::get('admin/defaultCompany/logo/{image}', 'DefaultCompanyController@viewImage');

// icons
Route::get('companyIcon/add', 'DefaultCompanyController@addIcon');
Route::get('/icon/edit/{icon}', 'DefaultCompanyController@editIcon');
Route::get('/icon/delete/{icon}', 'DefaultCompanyController@deleteIcon');
Route::get('/icon/getAll', 'DefaultCompanyController@getAllIcons');
Route::post('/icon/store', 'DefaultCompanyController@storeIcon');
Route::post('/icon/update/{icon}', 'DefaultCompanyController@updateIcon');

Route::get('/admin/companylogo', 'DefaultCompanyController@getCompanyLogo');
