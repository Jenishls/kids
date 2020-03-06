<?php
Route::prefix('admin/products')->group(function(){
    Route::get('/','ProductViewController@index');
    Route::get('/add','ProductViewController@addProduct');
    Route::get('/allData','ProductViewController@allProductData');
    Route::get('/add','ProductViewController@addProduct');
    Route::POST('/add','ProductStoreController@storeProduct');
    Route::get('/edit/{product}','ProductViewController@editProduct');
    Route::get('/delete/{product}','ProductDeleteController@deleteProduct');
    Route::POST('/update/{product}','ProductUpdateController@updateProduct');
    Route::get('/detail/{product}','ProductViewController@productDetail');
    Route::get('/categories','ProductViewController@getCategories');
    
    // Tabs Overall
    Route::get('/tab/overall/{product}','ProductViewController@productTabOverall');
    Route::get('/tab/overall/data/{product}','ProductViewController@productTabOverallData');
    
    // Tab Category
    Route::get('/tab/category/{product}','ProductViewController@productTabCategory');
    Route::get('/tab/category/edit/{product}','ProductViewController@productEditCategory');
    Route::POST('/tab/category/update/{product}','ProductUpdateController@updateProductCategory');
    Route::get('/tab/category/data/{product}','ProductViewController@productTabCategoryData');
    
    Route::get('/category/add','ProductViewController@addCategory');
    Route::POST('/tab/category/add','ProductStoreController@storeProductCategory');
    // Brand
    Route::get('/brand/add/','ProductViewController@addBrand');
    Route::POST('/brand/add','ProductStoreController@storeBrand');
    // Tab Color
    Route::get('/tab/color/{product}','ProductViewController@productTabColor');
    Route::get('/tab/color/add/{product}','ProductViewController@productAddColor');
    Route::POST('/tab/color/add/{product}','ProductStoreController@storeProductColor');
    Route::get('/tab/color/edit/{color}','ProductViewController@productEditColor');
    Route::get('/tab/color/delete/{color}','ProductDeleteController@productDeleteColor');
    Route::POST('/tab/color/update/{color}','ProductUpdateController@ProductUpdateColor');
    Route::get('/tab/color/data/{product}','ProductViewController@productTabColorData');
    Route::get('/color/image/{file}','ProductViewController@viewColorImage');
    Route::get('/colors/fill/{color}','ProductViewController@fillColorFields');
    // Tab Features
    Route::get('/tab/feature/{product}','ProductViewController@productTabFeature');
    Route::get('/tab/feature/add/{product}','ProductViewController@productAddFeature');
    Route::get('/tab/feature/delete/{feature}','ProductDeleteController@productDeleteFeature');
    Route::POST('/tab/feature/add/{product}','ProductStoreController@storeProductFeature');
    Route::get('/tab/feature/edit/{feature}','ProductViewController@productEditFeature');
    Route::POST('/tab/feature/update/{feature}','ProductUpdateController@ProductUpdateFeature');
    Route::get('/tab/feature/data/{product}','ProductViewController@productTabFeatureData');
    Route::get('/feature/image/{file}','ProductViewController@viewFeatureImage');
    Route::get('/features/fill/{feature}','ProductViewController@fillFeatureFields');
    // Tab Faq
    Route::get('/tab/faq/{product}','ProductViewController@productTabFaq');
    Route::get('/tab/faq/add/{product}','ProductViewController@productAddFaq');
    Route::get('/tab/faq/delete/{faq}','ProductDeleteController@productDeleteFaq');
    Route::POST('/tab/faq/add/{product}','ProductStoreController@storeProductFaq');
    Route::get('/tab/faq/reply/{faq}','ProductViewController@replyProductFaq');
    Route::POST('/tab/faq/reply/{faq}','ProductStoreController@replyProductFaq');
    Route::get('/tab/faq/edit/{faq}','ProductViewController@productEditFaq');
    Route::POST('/tab/faq/reply/update/{faq}','ProductUpdateController@ProductUpdateFaqReply');
    Route::get('/tab/faq/data/{product}','ProductViewController@productTabFaqData');
    
    // Tab Reviews
    Route::get('/tab/review/{product}','ProductViewController@productTabReview');
    Route::get('/tab/review/add/{product}','ProductViewController@productAddReview');
    Route::get('/tab/review/delete/{review}','ProductDeleteController@productDeleteReview');
    Route::POST('/tab/review/add/{product}','ProductStoreController@storeProductReview');
    Route::get('/tab/review/edit/{review}','ProductViewController@productEditReview');
    Route::POST('/tab/review/update/{review}','ProductUpdateController@ProductUpdateReview');
    Route::get('/tab/review/data/{product}','ProductViewController@productTabReviewData');
    
    // Tab Additional Information
    Route::get('/tab/info/{product}','ProductViewController@productTabInfo');
    Route::get('/tab/info/edit/{product}','ProductViewController@productEditInfo');
    Route::POST('/tab/info/update/{product}','ProductUpdateController@ProductUpdateInfo');
    
    // Tab Size
    Route::get('/tab/size/{product}','ProductViewController@productTabSize');
    Route::get('/tab/size/add/{product}','ProductViewController@productAddSize');
    Route::get('/tab/size/delete/{size}','ProductDeleteController@productDeleteSize');
    Route::POST('/tab/size/add/{product}','ProductStoreController@storeProductSize');
    Route::get('/tab/size/edit/{size}','ProductViewController@productEditSize');
    Route::POST('/tab/size/update/{size}','ProductUpdateController@ProductUpdateSize');
    Route::get('/tab/size/data/{product}','ProductViewController@productTabSizeData');
    Route::get('/size/image/{file}','ProductViewController@viewSizeImage');
    Route::get('/sizes/fill/{size}','ProductViewController@fillSizeFields');
    
    // Tab Inventory
    Route::get('/tab/inventory/{product}','ProductViewController@productTabInventory');
    Route::get('/tab/inventory/add/{product}','ProductViewController@productAddInventory');
    Route::get('/tab/inventory/delete/{inventory}','ProductDeleteController@productDeleteInventory');
    Route::POST('/tab/inventory/add/{product}','ProductStoreController@storeProductInventory');
    Route::get('/tab/inventory/edit/{inventory}','ProductViewController@productEditInventory');
    Route::POST('/tab/inventory/update/{inventory}','ProductUpdateController@ProductUpdateInventory');
    Route::get('/tab/inventory/data/{product}','ProductViewController@productTabInventoryData');
    
    // Tab Orders
    Route::get('/tab/order/{product}','ProductViewController@productTabOrder');
    // Route::get('/tab/order/add/{product}','ProductViewController@productAddOrder');
    Route::get('/tab/order/delete/{order}','ProductDeleteController@productDeleteOrder');
    Route::POST('/tab/order/add/{product}','ProductStoreController@storeProductOrder');
    Route::get('/tab/order/edit/{order}','ProductViewController@productEditOrder');
    Route::POST('/tab/order/update/{order}','ProductUpdateController@ProductUpdateOrder');
    Route::get('/tab/order/data/{product}','ProductViewController@productTabOrderData');
    // Tab Answer
    Route::get('/tab/answer/{product}','ProductViewController@productTabAnswer');
    Route::get('/tab/answer/add/{product}','ProductViewController@productAddAnswer');
    Route::POST('/tab/answer/add/{product}','ProductStoreController@storeProductQuestion');
    Route::get('/tab/question/reply/{faq}','ProductViewController@replyProductQuestion');
    Route::POST('/tab/question/reply/{faq}','ProductStoreController@replyProductQuestion');
    Route::get('/tab/question/delete/{answer}','ProductDeleteController@productDeleteAnswer');
    // Tab Message
    Route::get('/tab/message/{product}','ProductViewController@productTabMessage');
    Route::get('/tab/message/add/{product}','ProductViewController@productAddMessage');
    Route::get('/tab/message/delete/{message}','ProductDeleteController@productDeleteMessage');
    Route::POST('/tab/message/add/{product}','ProductStoreController@storeProductMessage');
    Route::get('/tab/message/edit/{message}','ProductViewController@productEditMessage');
    Route::POST('/tab/message/update/{message}','ProductUpdateController@ProductUpdateMessage');
    Route::get('/tab/message/data/{product}','ProductViewController@productTabMessageData');
    // Tab Image
    Route::get('/tab/image/{product}','ProductViewController@productTabImage');
    Route::get('/tab/image/delete/{image}','ProductDeleteController@productDeleteImage');
    Route::get('/image/{file}','ProductViewController@viewImage');
    Route::get('/thumb/{file}','ProductViewController@editProductThumb');
    Route::get('/tab/image/add/{product}','ProductViewController@productAddImage');
    Route::POST('/tab/image/add/{product}','ProductStoreController@storeProductImage');
    Route::get('/tab/image/edit/{image}','ProductViewController@productEditImage');
    Route::POST('/tab/image/update/{image}','ProductUpdateController@ProductUpdateImage');
    Route::POST('/tab/image/updateThumb/{product}','ProductUpdateController@ProductUpdateThumb');
    Route::get('/tab/image/data/{product}','ProductViewController@productTabColorData');
    
    Route::POST('/category/all','ProductViewController@allCategories');
    Route::POST('/brands/all','ProductViewController@allBrands');
    Route::POST('/colors/all','ProductViewController@allColors');
    Route::POST('/size/all','ProductViewController@allSizes');
    Route::POST('/company/all','ProductViewController@allCompanies');
    Route::POST('/sub_category','ProductViewController@subCategories');
    //select2 data from product id
    Route::POST('/select2/{relation}','ProductViewController@productselect2Relation');

    
    Route::POST('/tab/description/update/{product}','ProductUpdateController@updateProductDescription');

    
    
});
Route::get("/viewimage/{foldername}/{filename}","ProductViewController@getImage");