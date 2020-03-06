<?php

// Export Route
use App\Http\Controllers\Export\ZipExportController;
use App\Model\DefaultCompany;

Route::get('export/users/{type}', 'UserExportController@export');

// Default Company
Route::get('export/{type}', 'DefaultCompanyExportController@export');

// Site Settings
Route::get('export/siteSetting/{type}', 'SiteSettingExportController@export');

// Account
Route::get('export/account/{type}', 'AccountExportController@export');
// client
Route::get('/admin/export/clients/{type}', 'ClientExportController@export');

// Order
Route::get('export/order/{type}', 'OrderExportController@export');

// Order Deatail
Route::get('export/orderDetail/{type}', 'OrderDetailExportController@export');

// Quote Deatail
Route::get('export/quoteDetail/{type}', 'QuoteDetailExportController@export');

// Order Pickup
Route::get('export/order/pickup/{type}', 'OrderPickupExportController@export');

// Zip
Route::get('export/zipCode/{type}', 'ZipExportController@export');

// Coupon
Route::get('export/coupon/{type}', 'CouponExportController@export');

// Faqs
Route::get('export/faq/{type}', 'FaqExportController@export');
