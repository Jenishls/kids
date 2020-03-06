<?php

use App\Model\Tax;

Route::prefix('/admin/purchaseorder/')->group(function () {
    Route::get('', 'PurchaseOrderController@index');
    Route::get('list', 'PurchaseOrderController@purchaseOrders');

    Route::get('items/{id}', 'PurchaseOrderController@getInvoice');

    Route::get('add', 'AddController@addModal');
    Route::get('edit/{id}', 'EditController@editModal');
    Route::post('edit/{id}', 'EditController@updatePurchaseOrder');
    Route::post('add', 'AddController@createPurchaseOrder');
    Route::get('taxes/{id?}', function ($id = NULL) {
        if ($id) {
            $taxes = Tax::find($id);
        } else {
            $taxes = Tax::where(['table' => 'purchase_orders', 'is_deleted' => '0'])->get();
        }
        return response()->json($taxes);
    });

    // add Form
    Route::get('appendaddform/{id}', 'AddController@appendForm');
    Route::get('productlookup', 'AddController@productlookupModal');
    Route::get('product/select/{id}', 'AddController@productSelect');
    Route::get('delete/{id}', 'EditController@deleteOrder');

    // Print preview
    Route::get('print/{id}', 'PurchaseOrderController@printPage');
});
