<?php


Route::prefix('/admin')->group(function () {

    Route::get('/users', 'userController@userlist');
    Route::get('/users/list', 'userController@users');

    Route::get('/userMenu/profileView', 'userController@profile_view');

    Route::get('/viewProfile', 'userController@Profile');


    // modal route
    Route::get('/users/add', 'userController@add_users_modal');
    Route::get('/users/edit/{user}', 'userController@edit_user_modal');
    Route::get('/user/delete/{user}', 'userController@delete_users');
    Route::get('/users/changePassword/{user}', 'userController@changePassword_modal');

    // Store new user
    Route::post('users/add', 'userController@store');

    //update password
    Route::post('/user/updatePassword/{user}', 'userController@updatePassword');
    Route::post('/user/updateUser/{user}', 'userController@updateUser');

    // user profile
    Route::get('/users/userProfile/{id}', 'userController@user_profile')->name('user.profile');
    Route::get('/users/changePassword', 'userController@changePassword_modal');
    Route::get('/users/userProfile', 'userController@user_profile');

    // user profile menu sidebar
    Route::get('/userMenu/{profile_sidebar}/{id}', 'userProfileController@user_profile_sidebar');

    // userProfile Edit Modal
    Route::get('/userProfile/{personalDetail}/{id}', 'UserProfileEditController@edit_personal_detail');
    
    // userProfile Update data
    Route::post('/update/{personalInformation}/{id}', 'UserProfileEditController@update_personal_info');
    
    // addressAdd Modal
    Route::get('address/addAddressDetails/{id}/{user}', 'userProfileAddController@add_address_details');
    Route::post('address/addNewAddress/', 'userProfileAddController@add_new_address');
    
    //delete address
    Route::get('/address/deleteAddressDetails/{id}', 'userProfileController@delete_address_modal');
    Route::get('/address/deleteAddress/{id}', 'userProfileController@delete_address');
    
    // add membership
    Route::get('membership/addMembership/{id}', 'userProfileAddController@add_membership_modal');
    Route::get('membership/tableData/{uid}', 'userProfileAddController@membershipDatatable');
    Route::get('membership/delete/{id}', 'userProfileController@deleteMembership');
    Route::post('/addMembership', 'UserProfileAddController@add_membership');
    
    
    // User Email
    Route::get('userMenu/userEmailInfo/{user}', 'userProfileController@userEmail');
    Route::get('/userProfile/{personalDetail}/{id}', 'UserProfileEditController@edit_personal_detail');
    Route::get('membership/tableData/{uid}', 'userProfileAddController@membershipDatatable');
    Route::get('membership/delete/{id}', 'userProfileController@deleteMembership');
    Route::post('/addMembership', 'UserProfileAddController@add_membership');

    // addlookup
    Route::get('addModal/{addModal}/{id}', 'userProfileAddController@add_modal');
    Route::post('addCardType/storeCardtype', 'userProfileAddController@store_new_card_type');

    // Search Route
    Route::get('/user/search', 'userController@userSearch')->name('userSearch');
    Route::get('/user/profile/{image}', 'UserProfileEditController@getImage');
    // advance search
    // Route::post('/user/advSearch', 'userController@userSearch');


    Route::get('/membership/idCardType', 'userProfileAddController@section_look_up');


    // upload image modal
    Route::get('/user/profileImage/{id}', 'UserProfileImageController@edit_user_profile_image');
    Route::get('/user/userPreview', 'UserProfileImageController@userPreview');

    Route::post('/update/profileImage/{upateProfileImage}/{id}', 'UserProfileImageController@update_profile_image');
});
