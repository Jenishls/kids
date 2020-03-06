<?php


Route::prefix('/admin/cms')->group(function () {

    Route::get('', 'CmsController@index');

    // active template view
    Route::get('{id}', 'CmsController@getActiveCmsTemp');

    // template component and their datalist
    Route::get('components/{page_id}', 'CmsController@getComponents');
    // Route::get('getposts/{component_id}', 'CmsController@getPosts');
    Route::get('view/{section}/{template?}', 'CmsController@getCmsSection');
    // Route::get('table/{section}/{template}', 'CmsController@getSectionTable');

    // CMS crud modals
    Route::get('addmodal/{entity}/{id?}', 'CmsAddController@getAddModal');
    Route::get('editmodal/{entity}/{id}', 'CmsEditController@getEditModal');

    // CMS CRUD operations
    Route::post('add/{entity}/{id?}', 'CmsAddController@cmsAdd');
    Route::post('update/{entity}/{id}', 'CmsEditController@cmsUpdate');
    Route::get('delete/{entity}/{id}', 'CmsEditController@cmsDelete');

    // components draggable seq_no
    Route::post('{component}/drag_sort', 'CmsEditController@dragComponent');
});
