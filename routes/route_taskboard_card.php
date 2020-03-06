<?php 

Route::post("/admin/taskboardcard/create","TaskboardCardStoreController@store");
Route::post("/admin/taskboardcard/update/sequence","TaskboardCardUpdateController@updateSequence");
Route::get("/taskboardcard/update/{cardId}","TaskboardCardViewController@modalUpdate");
Route::post("/taskboardcard/update","TaskboardCardUpdateController@cardUpdate");
Route::get("/taskboardcard/attachment/{cardId}","TaskboardCardViewController@modalAttachment");
Route::get("/taskboardcard/comment/{commentId}","TaskboardCardViewController@modalCommentDelete");

Route::post("/taskboardcard/comment/delete","TaskboardCardUpdateController@commentDelete");

Route::post("/taskboardcard/attachments","TaskboardCardStoreController@uploadAttachment");
Route::post("/taskboardcard/attachments/upload","TaskboardCardStoreController@attachmentSave");


Route::post("/taskboardcard/update/description","TaskboardCardUpdateController@updateDescription");
Route::post("/taskboardcard/comment/create","TaskboardCardStoreController@commentCreate");
Route::post("/taskboardcard/comment/update","TaskboardCardUpdateController@commentUpdate");

Route::post("/taskboardcard/move","TaskboardCardUpdateController@move");
Route::post("/taskboardcard/copy","TaskboardCardUpdateController@copy");
Route::post("/taskboardcard/archive","TaskboardCardUpdateController@archive");
Route::post("/taskboardcard/title","TaskboardCardUpdateController@updateTitle");


Route::get("/download/{foldername}/{filename}","TaskboardCardViewController@download");
Route::get("/view/{foldername}/{filename}","TaskboardCardViewController@view");
Route::get("/document/placeholder/{extension}","TaskboardCardViewController@documentPlaceholder");
