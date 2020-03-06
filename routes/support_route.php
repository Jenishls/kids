<?php

/*	
this route  pointed to 
	1) http/controller/middleware/RedirectifAuthenticated.php line no 21
	2) http/controller/Auth/LogingController.php line no 28
this route is main route after login
*/

use App\User;
use Illuminate\Http\Request;

Route::get('/admin', 'dashboardController@dashboard');
// Route::get('/template', 'TemplateController@index');
Route::get('/changeTemplate/{id}', 'dashboardController@changeTemplate');
Route::get('/addTemplateModal', 'dashboardController@addTemplateModal');
Route::post('/addNewTemplate', 'dashboardController@addNewTemplate');
Route::get('/deleteTemplate/{id}', 'dashboardController@deleteTemplate');

Route::get('/system/menu', 'Menu\MenuController@menulist');

Route::post('/system/menudata', 'Menu\MenuController@menudata');

Route::post('/system/menucreate', 'Menu\MenuController@menucreate');

Route::post('/system/menu/put/{id}', 'Menu\MenuController@menuput');

Route::get('/system/menu/del/{id}', 'Menu\MenuController@deleteMenu');

Route::post('/system/menu/edit', 'Menu\MenuController@edit');

Route::get('/system/icon', 'Icon\IconController@iconlist');

Route::post('/system/icondata', 'Icon\IconController@icondata');

Route::post('/system/iconcreate', 'Icon\IconController@iconcreate');

Route::post('/system/icon/put/{id}', 'Icon\IconController@iconput');

Route::post('/system/icon/edit', 'Icon\IconController@edit');

Route::get('/system/icon/del/{id}', 'Icon\IconController@deleteIcon');

Route::get('/system/audit', 'Audit\AuditController@auditlist');

// Route::post('/system/auditcreate', 'Audit\AuditController@auditcreate');

Route::get('/system/auditdata', 'Audit\AuditController@auditdata');
Route::get('/audit/details/{table_name}/{new_data}', 'Audit\AuditController@globalAuditView');

// Route::post('/system/auditmodel', 'Audit\AuditController@auditmodel');

// Page preview
Route::get('preview/{template}/{page?}', 'TemplateController@pagePreview');


Route::post('checkUsername', function (Request $request) {
	$user = User::select('id')->where('username', $request->username)->first();

	//dd($user);
	// $data = 'false';
	if (!$user) {
		// $data = "true";
		return 'true';
	}
	// return  $data;
	return 'false';
});



Route::post('/admin/checkUsername', function (Request $request) {
	$user = User::select('id')->where('username', $request->username)->first();

	//dd($user);
	// $data = 'false';
	if (!$user) {
		// $data = "true";
		return 'true';
	}
	// return  $data;
	return 'false';
});
