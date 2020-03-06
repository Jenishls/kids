<?php

Route::prefix('/admin/journal')->group(function () {
    Route::get('', 'JournalController@index');
    Route::get('list', 'JournalController@journalList');
    Route::get('view/{journal}', 'JournalController@getJournal');
    Route::get('add', 'AddController@addJournal');
    Route::post('add', 'AddController@createJournal');
    Route::get('edit/{journal}', 'EditController@editJournal');
    Route::post('edit/{journal}', 'EditController@updateJournal');

    ROute::get('approve/{journal}', 'EditController@approveJournal');
    ROute::get('reject/{journal}', 'EditController@rejectJournal');

    Route::get('transactions/list/{journal}', 'JournalController@getTransactions');

    Route::get('getaccountheads', 'JournalController@getAccountHeads');
});
