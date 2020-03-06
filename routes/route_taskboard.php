<?php

Route::get("/admin/taskboard","TaskboardViewController@index");
Route::get("/admin/taskboard/add","TaskboardViewController@modalAdd");
Route::get("/admin/taskboard/edit/{taskboard}","TaskboardViewController@modalUpdate");
Route::get("/admin/taskboard/delete/{taskboard}","TaskboardViewController@modalDelete");
Route::post("/admin/taskboard/delete","TaskboardUpdateController@delete");
Route::get("/admin/taskboard/{taskboard}","TaskboardViewController@taskboardList");

Route::get("/taskboard/fetch","TaskboardViewController@fetch");

Route::post("/admin/taskboard/background","TaskboardStoreController@background");
Route::post("/admin/taskboard/create","TaskboardStoreController@store");
Route::post("/admin/taskboard/update","TaskboardUpdateController@update");

Route::post("/taskboard/members","TaskboardUpdateController@members");

Route::get("/view/{foldername}/{filename}","TaskboardViewController@view");
Route::get("/file/placeholder/{extension}","TaskboardViewController@fileHolder");
