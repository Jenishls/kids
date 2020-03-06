<?php

Route::prefix('admin')->group(function () {
    // BANK MASTER
    Route::prefix('bankmaster')->group(function () {
        Route::get('', 'Bank\BankMasterController@index');
        Route::get('list', 'Bank\BankMasterController@bankData');
        Route::get('view/{id}', 'Bank\BankMasterController@viewBankMaster');
        Route::get('bankbox/list/{id}', 'Bank\BankMasterController@bankBoxData');
        Route::get('add', 'Bank\AddController@addBankMasterModal');
        Route::post('add', 'Bank\AddController@createBankMaster');
        Route::get('edit/{id}', 'Bank\EditController@editBankMasterModal');
        Route::post('edit/{id}', 'Bank\EditController@updateBankMaster');
        Route::get('addfund/{id}', 'Bank\AddController@addFundModal');
        Route::post('addfund/{id}', 'Bank\AddController@createBankTable');

        Route::get('getCompany', 'Bank\BankMasterController@getCompany');
    });

    // CASH MASTER
    Route::prefix('cashmaster')->group(function () {
        Route::get('', 'Cash\CashMasterController@index');
        Route::get('list', 'Cash\CashMasterController@cashData');

        Route::get('view/{id}', 'Cash\CashMasterController@viewCashMaster');
        Route::get('cashbox/list/{id}', 'Cash\CashMasterController@cashBoxData');
        Route::get('add', 'Cash\AddController@addCashMasterModal');
        Route::post('add', 'Cash\AddController@createCashMaster');
        Route::get('edit/{id}', 'Cash\EditController@editCashMasterModal');
        Route::post('edit/{id}', 'Cash\EditController@updateCashMaster');
        Route::get('addfund/{id}', 'Cash\AddController@addFundModal');
        Route::post('addfund/{id}', 'Cash\AddController@createCashBox');
        Route::get('transfer/{id}', 'Cash\AddController@transferFundModal');
        Route::post('transfer/{cashMaster}', 'Cash\AddController@transferFund');

        Route::get('getMember', 'Cash\CashMasterController@getMember');
        Route::get('getBankMaster', 'Cash\CashMasterController@getBankMaster');
    });
});
