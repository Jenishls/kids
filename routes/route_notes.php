<?php
Route::prefix('/admin/')->group(function () {

    Route::get('/notelist', 'NotesController@index');

    Route::get('/notes/table', 'NotesController@notesTable');

    Route::get('/note/add', 'NotesAddController@addNoteModal');

    Route::get('/note/edit/{id}', 'NotesEditController@editNoteModal');

    Route::post('/note/addNew', 'NotesAddController@addNewNote');

    Route::post('/note/update/{id}', 'NotesEditController@editNote');

    Route::get('/note/changeMember', 'NotesAddController@changeMemberModal');
    Route::get('/note/delete/{id}', 'NotesEditController@deleteNote');
});
