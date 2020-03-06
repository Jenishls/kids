<?php

Route::get('admin/coupon', 'CouponController@index');
Route::get('/coupon/list', 'CouponController@couponList');

// modal
Route::get('coupon/add', 'CouponController@addCouponModal');
// Route::get('couponCode/add', 'CouponController@addCouponCodeModal');
Route::get('coupon/edit/{id}', 'CouponController@editCouponModal');

// store 
Route::post('coupon/add', 'CouponController@storeCoupon');
// Route::post('couponCode/add', 'CouponController@storeCouponCode');


// update
Route::post('/coupon/updateCoupon/{id}', 'CouponController@updateCoupon');
Route::get('/coupon/deleteCoupon/{id}', 'CouponController@deleteCoupon');