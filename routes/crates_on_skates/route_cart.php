<?php

Route::post('add_to_cart', 'CartController@add');
Route::get('cart', 'CartController@cart');
Route::get('show_cart_items', 'CartController@showCart');
Route::get('remove_cart/{inventory}', 'CartController@remove');
Route::post('remove_cart/{inventory}', 'CartController@remove');
Route::get('checkout_from_cart', 'CartController@selectZipFromCart');
Route::get('update_cart', 'CartController@updateCartDecider');
Route::post('update_cart_qty/{rentedDays}', 'CartController@updateQuantity');
// Route::get('clearCart', 'CartController@emptyCart');