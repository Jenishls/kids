<?php
Route::prefix('/admin')->group(function () {


    //Main index view
    Route::get('/blogs', 'BlogController@index');

    //Modals
    Route::get('/add/blog', 'BlogController@addModal');
    Route::get('/edit/blog/{id}', 'EditBlogController@editModal');
    Route::get('/delete/blog', 'BlogController@deleteModal');
    Route::get('/add/blogCategory', 'BlogController@addBlogCategoryModal');


    //Store Blogs
    Route::post('/store/blog', 'StoreBlogController@create');
    Route::post('/store/blogCategory', 'StoreBlogController@storeBlogCategory');

    //edit blog
    Route::post('/edit/blog/{blog}', 'EditBlogController@editBlogs');

    // delete blogs
    Route::get('/delete/blog/{id}', 'BlogController@deleteBlogs');

    // View Blog
    Route::get('/view/blog/{id}', 'BlogController@viewBlog');
    Route::get('/back/rightBlogContent', 'BlogController@backRightBlogContent');
    Route::get('/categoryBlog/{id}', 'BlogController@categoryBlogs');

    // get category
    Route::get('/blogs/categories', 'BlogController@getCategory');

    // Search
    Route::POST('/blogs/search', 'BlogController@backRightBlogContent');
});
