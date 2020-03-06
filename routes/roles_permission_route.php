<?php
Route::prefix('/admin')->group(function () {

    //Index
    Route::get('rolePermission', 'RolesAndPermissionsViewController@index');

    //Get Pages(Tab specific view page)
    Route::get('showPage/{name}', 'RolesAndPermissionsViewController@show_pages');

    //Get Datatables
    Route::get('getDatatable/{table}', 'RolesAndPermissionsViewController@get_datatable');

    // Add Modal
    Route::get('callModal/{modal}', 'RolesAndPermissionsAddController@call_modal');

    //Store roles-permission tab fields
    Route::post('rolePermission/add/{tabname}', 'RolesAndPermissionsAddController@store_new');

    // Edit modals
    Route::get('rolePermissions/edit/{page}/{id}', 'RolesAndPermissionsEditController@get_edit_modals');

    // Update selected row's data
    Route::post('rolePermissions/update/{page}/{id}', 'RolesAndPermissionsEditController@update_tab_value');

    // Delete existing entry
    Route::get('rolePermissions/delete/{page}/{id}', 'RolesAndPermissionsEditController@delete_tab_value');

    // Datatable column sort and search/filter
});
