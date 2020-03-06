<?php

Route::prefix('admin/ledger')->group(function () {
    Route::get('', 'LedgerController@index');
    Route::get('list', 'LedgerController@ledgerList');
});
