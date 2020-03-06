<?php

Route::prefix('admin/account')->group(function(){
Route::get('/','AccountController@main');
Route::get('/data','AccountController@data');
Route::get('/view/{company}','AccountViewController@index');
Route::get('/profileImage/{file}','AccountViewController@profileImage');
Route::post('/industries','AccountViewController@industries');
Route::post('/select2/data', 'AccountViewController@selectData');

// -------------Modal Route-------------------------------------//
Route::get('/modal', 'AccountController@modal');
//---------------------  Store / Delete Route--------------------------------//
Route::post('/store', 'AccountAddController@store');
Route::get('/delete/{company}', 'AccountController@delete');
Route::post('logo/{company}', 'AccountAddController@storeLogo');
Route::get('/editThumb/{company}','AccountViewController@editThumb');
//---------------------- Edit/ modal Route ---------------------------------//
Route::get('/edit/{type}/{company}','AccountViewController@editModal' );
//---------------------  Update Route--------------------------------//
Route::post('/update/account/{company}', 'AccountUpdateController@general');
Route::post('/update/branch/{company}', 'AccountUpdateController@branches');
Route::post('/update/member/{company}', 'AccountUpdateController@members');

Route::post('/delete/{company}/branch/{branch}', 'AccountUpdateController@detachBranch');
Route::get('/delete/{company}/branch/{branch}', 'AccountViewController@detachBranch');

Route::post('/delete/{company}/member/{member}', 'AccountUpdateController@detachMember');
Route::get('/delete/{company}/member/{member}', 'AccountViewController@detachMember');
//---------------------Branches Route-----------------------------//
Route::get('branch/list/{company}', 'AccountBranchController@list');
Route::get('branch/add', 'AccountBranchController@add');
//storeRoute
Route::post('/branch/store/{company}', 'AccountBranchController@store');
//modalRoutes
Route::get('/company/branches/edit/{cBranch}','AccountBranchController@edit');
Route::get('/company/branches/sdelete/{cBranch}','AccountBranchController@sdelete');
Route::post('/company/branches/update/{cBranch}','AccountBranchController@update');
//---------------------Orders Route-----------------------------//
Route::get('/order/list/{id}', 'AccountOrderController@list');
//---------------------Member Route-----------------------------//
Route::get('member/list/{company}', 'AccountMemberController@list');
Route::post('member/select2/data', 'AccountMemberController@data');
Route::get('member/addNew', 'AccountMemberController@add');
Route::get('member/add/{company}', 'AccountMemberController@addAdv');
Route::get('member/edit/{client}', 'AccountMemberController@edit');
Route::post('member/store', 'AccountMemberController@store');
Route::post('member/update/{client}', 'AccountMemberController@update');
Route::get('/member/image/{file}','AccountMemberController@image');
//-------------------------Notes Route-----------------------------//
Route::post('/company/notes/store/{id}', 'AccountNoteController@store');
Route::post('/company/update/note/{id}', 'AccountNoteController@update');
Route::get('/company/deletenote/{id}', 'AccountNoteController@softDelete');
//-------------------------Notes Route-----------------------------//
Route::get('/files/add/{company}', 'AccountFileController@add');
Route::post('/files/store/{company}', 'AccountFileController@store');
Route::post('/file/process', 'AccountFileController@process');
Route::get('/file/sdelete/{file}', 'AccountFileController@sdelete');
Route::get('/file/download/{filename}', function ($filename) {
    $filepath = storage_path('account/attachments/') . $filename;
    return \Response::download($filepath);
});
//------------------Template Rendering Route-----------------------//
Route::post('/template/{type}/{company}','AccountViewController@template');
//-------------------Form Validation----------------------------//
Route::post('/validate/account','AccountValidationController@account');
Route::post('/validate/branch','AccountValidationController@branch');
// ---------------------select2 routes----------------------------//
Route::post('/lookupSelectData/{name}','AccountViewController@lookupSelectData');
});