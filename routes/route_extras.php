<?php
Route::prefix('/admin/extras')->group(function () {

    //Index
    Route::get('/', 'ExtrasController@index');
    Route::get('/data/list/{question}', 'ExtrasController@question');
    Route::get('/data/tablelist/{question}', 'ExtrasController@list');

    // modal
    Route::get('/addmodal/{question_id}', 'ExtrasAddController@addExtrasModal');
    Route::get('/addQuestionModal', 'ExtrasAddController@addQuestionModal');

    Route::get('edit/{id}', 'ExtrasEditController@editExtrasModal');
    Route::get('/editquestionmodal/{question_id}', 'ExtrasEditController@editQuestionModal');


    // // add
    Route::post('/storequestion', 'ExtrasAddController@storeQuestion');
    Route::post('/newquestionoption', 'ExtrasAddController@storeQuestionOption');

    // // update

    Route::post('/updateQuestion/{id}', 'ExtrasEditController@updateQuestion');

    Route::post('/update/extra/{id}', 'ExtrasEditController@updateExtras');

    // // delete
    Route::get('deletequestion/{id}', 'ExtrasController@deleteQuestion');

    Route::get('/del/{id}', 'ExtrasController@deleteExtras');
});
