<?php

Route::prefix('admin/openingbalance')->group(function () {
    Route::get('', 'OpeningBalanceController@index');

    Route::post('save', 'OpeningBalanceController@saveData');
});
