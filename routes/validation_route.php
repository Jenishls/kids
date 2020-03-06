<?php
/*
|--------------------------------------------------------------------------
| Validation Routes
|--------------------------------------------------------------------------
|
| Here is where you can register validation routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "validation" middleware group. Now create something great!
|
*/
Route::prefix('/admin')->group(function () {
    Route::get('/validation', 'ValidationController@index');
    Route::get('/validations/list/{section_id}', 'ValidationController@validations');
    Route::get('/validations/tableList/{section}', 'ValidationController@validationsTable');
    // Section and Validation Modal
    Route::get('/validation/addSectionModal', 'ValidationAddController@addSectionModal');
    Route::get('/validation/addValidationModal/{validation_section_id}', 'ValidationAddController@addValidationModal');

    // create new section
    Route::post('/validation/newSection', 'ValidationAddController@addNewSection');
    Route::post('/validation/newValidation', 'ValidationAddController@addNewValidation');

    // update
    Route::post('/validation/update/{id}', 'ValidationEditController@updateValidation');
    Route::post('/validation/updateSection/{id}', 'ValidationEditController@updateValidationSection');

    // edit modal
    Route::get('/validation/editmodal/{id}', 'ValidationEditController@editModal');
    Route::get('/validation/editSectionModal/{id}', 'ValidationEditController@editSectionModal');


    // delete
    Route::get('/validation/delete/{id}', 'ValidationDeleteController@deleteValidation');
    Route::get('/validation/deleteSection/{id}', 'ValidationDeleteController@deleteValidationSection');
});
