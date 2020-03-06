<?php

Route::get("/admin/taskboardlist/add/{taskboard}","TaskboardListViewController@modalAdd");
Route::get("/admin/taskboardlist/edit/{taskboardList}","TaskboardListViewController@modalUpdate");
Route::get("/admin/taskboardlist/delete/{taskboardList}","TaskboardListViewController@modalDelete");
Route::get("/admin/taskboardlist/fetch/","TaskboardListViewController@fetch");
Route::get("/admin/taskboardlist/fetch/{taskboard}","TaskboardListViewController@taskboardList");


Route::post("/admin/taskboardlist/create","TaskboardListStoreController@store");
Route::post("/admin/taskboardlist/update","TaskboardListUpdateController@update");
Route::post("/admin/taskboardlist/delete","TaskboardListUpdateController@delete");
