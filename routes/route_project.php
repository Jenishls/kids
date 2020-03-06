<?php

Route::get("/admin/project/","ProjectViewController");
Route::post("/admin/project/fetch","ProjectViewController@fetch");
Route::get("/fetch/lookup/{code}","ProjectViewController@lookup");

Route::get("/admin/project/add","ProjectViewController@modalAdd");
Route::get("/admin/project/edit/{project}","ProjectViewController@modalUpdate");
Route::get("/admin/project/delete/{project}","ProjectViewController@modalDelete");
Route::post("/admin/project/validate/{value}","ProjectViewController@validateProject");
Route::post("/admin/project/valid","ProjectViewController@valid");

Route::post('/admin/project/update/info', 'ProjectUpdateController@updateInfo');
Route::post('/admin/project/update/members', 'ProjectUpdateController@updateMember');
Route::post('/admin/project/update/attachments', 'ProjectUpdateController@updateAttachment');

Route::post("/admin/project/attachment","ProjectStoreController@uploadAttachment");
Route::post("/admin/project/create","ProjectStoreController@create");
Route::POST("/admin/fetch/user","ProjectViewController@fetchUser");
Route::post("/admin/project/check","ProjectValidationController@checkProject");

Route::get("/admin/project/detail/{project}",'ProjectViewController@detail');