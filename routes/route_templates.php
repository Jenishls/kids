<?php

Route::get('/template', 'TemplateController@index');


Route::get('netlifytemp/{slug?}', 'TemplateRouteController@index');
Route::get('/netlifytemp/getMeta/metacookie', function () {
    $page_meta = json_decode($_COOKIE['page_meta'], true);
    return $page_meta;
});
Route::get('/{slug?}', 'CratesOnSkates\CratesRouteController@index');
Route::get('cratesonskates/{slug?}', 'CratesOnSkates\CratesRouteController@index');
// Route::get('crates/login', 'CratesOnSkates\CratesRouteController@login');

Route::get('/calendar/update_order/{order}/{user}/{statusRequest}', 'CratesOnSkates\CratesRouteController@verifyCalendarRequest');
Route::post('/calendar/verify_update_request/{order}/{user}/{statusRequest}', 'CratesOnSkates\CratesRouteController@calendarUpdateRequest');
Route::post('calendar/mark_order', 'CratesOnSkates\CratesRouteController@calendarMarkOrder');
Route::get('/calendar/order/confirmation/{order}/{status}', 'CratesOnSkates\CratesRouteController@confirmCalendarRequest');
Route::get('/calendar/order/confirmation/signature/{order}/{status}', 'CratesOnSkates\CratesRouteController@confirmationSignature');
Route::get('/calendar/order/payment/{order}/{status}/{amount}', 'CratesOnSkates\CratesRouteController@makeDamagePayment');

Route::prefix('crates')->group(function () {

    Route::prefix('validate')->middleware(['cleanMasked'])->group(function () {
        Route::post('personal-info', 'CratesOnSkates\CheckoutController@validatePersonalInfo');
        Route::post('delivery-info', 'CratesOnSkates\CheckoutController@validateDeliveryInfo');
        Route::post('pickup-info', 'CratesOnSkates\CheckoutController@validatePickupInfo');
    });

    //Contact
    Route::post('enquire', 'CratesOnSkates\EnqController@store')->middleware('cleanMasked');
    Route::post('enquire/commercial_movers', 'CratesOnSkates\EnqController@commercialMovers')->middleware('cleanMasked');

    Route::get('ordernow', 'CratesOnSkates\CratesRouteController@orderNowPage');
    Route::get('select-package/{package}/{week}', 'CratesOnSkates\CratesRouteController@packageSelect');
    Route::get('checkout', 'CratesOnSkates\CratesRouteController@checkout');
    Route::post('place-order', 'CratesOnSkates\OrderController@store')->middleware('cleanMasked');
    Route::get('purchasesuccess', 'CratesOnSkates\CratesRouteController@purchaseSuccess');
    Route::get('orderdetails', 'CratesOnSkates\CratesRouteController@orderdetails');

    Route::post('validate-zip', 'CratesOnSkates\CheckoutController@validateZip');
    Route::get('fetch-zip-price/{zip}', 'CratesOnSkates\CheckoutController@fetchZip');
    // Route::post('update-order-summary', 'CratesOnSkates\CheckoutController@updateSummary');
    Route::post('update-order-summary', 'CratesOnSkates\CheckoutController@addExtras');
    Route::post('add-addons', 'CratesOnSkates\CheckoutController@addAddons');
    Route::post('add-extras', 'CratesOnSkates\CheckoutController@addExtras');
});

Route::prefix('noncomponent')->group(function () {
    Route::get('press', 'CratesOnSkates\CratesRouteController@press');
    Route::get('video-library', 'CratesOnSkates\CratesRouteController@videoLibrary');
    Route::get('partner-deals', 'CratesOnSkates\CratesRouteController@partnerDeals');
    Route::get('privacy_terms', 'CratesOnSkates\CratesRouteController@privacyAndTerms');
    Route::get('privacy_terms2', 'CratesOnSkates\CratesRouteController@privacyAndTerms2');
});

// dashboard
Route::prefix('dashboard')->group(function () {
    Route::get('page/{pagename}', 'CratesOnSkates\Dashboard\DashboardController@dashboardPage');
    Route::get('modal/{modalname}/{id}/{date?}', 'CratesOnSkates\Dashboard\DashboardController@dashboardModal');
    Route::get('orderpage/{orderpagename}', 'CratesOnSkates\Dashboard\DashboardController@dashboardOrderPage');
    Route::get('orderdetail/{id}', 'CratesOnSkates\Dashboard\DashboardController@orderDetail');
    Route::get('extendorder/{id}/{date}', 'CratesOnSkates\Dashboard\DashboardController@extendOrder');
    Route::get('cancelorderitem/{id}', 'CratesOnSkates\Dashboard\DashboardController@cancelOrderItems');

    // address
    Route::get('address/addAddressDetail/{id}', 'CratesOnSkates\Dashboard\DashboardController@addAddressDetail');
    Route::post('address/addNewAddress/', 'CratesOnSkates\Dashboard\DashboardController@storeNewAddress');
    // update address
    Route::post('address/updateAddressDetail/{id}', 'CratesOnSkates\Dashboard\DashboardController@updateAddress');
    // make default address
    Route::get('address/makeDefaultAddress', 'CratesOnSkates\Dashboard\DashboardController@defaultAddress');
    // delete address
    Route::get('address/deleteAddress/{id}', 'CratesOnSkates\Dashboard\DashboardController@deleteAddress');

    // update personal info
    Route::post('updateCredential', 'CratesOnSkates\Dashboard\DashboardController@updateUserInfo');
    Route::post('updatePassword', 'CratesOnSkates\Dashboard\DashboardController@updatePassword');
});
