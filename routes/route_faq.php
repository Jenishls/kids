<?php
Route::get('admin/faq', 'FaqController@index');
Route::get('/faq/list', 'FaqController@faqList');
// modals
Route::get('faq/add', 'FaqController@addFaqModal');
Route::get('faq/edit/{id}', 'FaqController@editFaqModal');
// store 
Route::post('faq/add', 'FaqController@storeFaq');
// update
Route::post('/faq/updateFaq/{id}', 'FaqController@updateFaq');
Route::get('/faq/deletefaq/{id}', 'FaqController@deleteFaq');