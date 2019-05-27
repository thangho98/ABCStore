<?php

Route::get('/', 'FrontendController@getHome');

Route::get('/product/{id}/', 'FrontendController@getProduct');
Route::get('/product/options/color/{id}/', 'FrontendController@getOptionsColorProduct');
Route::get('/product/options/{id}/', 'FrontendController@getOptionsProduct');
Route::post('/product/{id}/', 'FrontendController@postComment');


Route::get('/brand/{id}/{slug}', 'FrontendController@getProductByBrand');

Route::get('/category/{id}/{slug}', 'FrontendController@getProductByCategory');

Route::get('/search', 'FrontendController@getSearch');

Route::get('/shop', 'FrontendController@getShop');

Route::get('/search', 'FrontendController@getSearch');

Route::get('/shop/ajax', 'FrontendController@getListProduct');

Route::group(['prefix' => 'cart'], function () {

    Route::get('show', 'CartCusController@getShowCart');

    Route::get('add/{id}', 'CartCusController@getAddCart');
    
    
    Route::get('delete/{id}', 'CartCusController@getDeleteCart');
    Route::get('update', 'CartCusController@getUpdateCart');

    Route::get('checkout', 'CartCusController@getCheckout');
    Route::post('checkout', 'CartCusController@postCheckout');

    Route::get('complete', 'CartCusController@getComplete');
    Route::get('confirm/{token}/{id}', 'CartCusController@getConfirm');
});

Route::group(['namespace' => 'Admin'], function () {
    Route::group(['prefix' => 'login','middleware' => 'CheckLogedIn'], function () {
        Route::get('/','LoginController@getLogin');
        Route::post('/','LoginController@postLogin');
    });
    Route::group(['prefix' => 'reminder','middleware' => 'CheckLogedIn'], function () {
        Route::get('/','LoginController@getReminder');
        Route::post('/','LoginController@postReminder');
    });
    Route::group(['prefix' => 'admin','middleware' => 'CheckLogedOut'], function () {
        Route::get('/','HomeController@returnHome');
        Route::get('home','HomeController@getHome');

        Route::group(['prefix' => 'brand'], function () {
            Route::get('/','BrandController@getBrand');
            
            Route::post('/add','BrandController@postAddBrand');

            Route::get('/edit/{id}','BrandController@getEditBrand');
            Route::post('/edit/{id}','BrandController@postEditBrand');
            
            Route::get('/delete','BrandController@getDeleteBrand');
        });

        Route::group(['prefix' => 'category'], function () {
            Route::get('/','CategoryController@getCate');

            Route::post('/add','CategoryController@postAddCate');

            Route::get('/edit/{id}','CategoryController@getEditCate');
            Route::post('/edit/{id}','CategoryController@postEditCate');
            
            Route::get('/delete','CategoryController@getDeleteCate');
        });

        Route::group(['prefix' => 'product'], function () {
            Route::get('/','ProductController@getProd');

            Route::get('/view/{id}','ProductController@getViewProd');

            Route::post('/add','ProductController@postAddProd');

            Route::get('/edit/{id}','ProductController@getEditProd');
            Route::post('/edit/{id}','ProductController@postEditProd');
            
            Route::get('/delete','ProductController@getDeleteProd');
        });

        Route::group(['prefix' => 'provider'], function () {
            Route::get('/','ProviderController@getProv');

            Route::post('/add','ProviderController@postAddProv');

            Route::get('/edit/{id}','ProviderController@getEditProv');
            Route::post('/edit/{id}','ProviderController@postEditProv');
            
            Route::get('/delete','ProviderController@getDeleteProv');
        });

        Route::group(['prefix' => 'employees'], function () {
            Route::get('/','EmployeesController@getEmpl');
            
            Route::get('/view/{id}','EmployeesController@getViewEmpl');
            
            Route::post('/add','EmployeesController@postAddEmpl');

            Route::get('/edit/{id}','EmployeesController@getEditEmpl');
            Route::post('/edit/{id}','EmployeesController@postEditEmpl');
            
            Route::get('/delete','EmployeesController@getDeleteEmpl');
        });
        
        Route::group(['prefix' => 'comment'], function () {
            Route::get('/', 'CommentController@getComment');
            Route::get('/delete/', 'CommentController@getDeleteComment');
        });

        Route::group(['prefix' => 'customer'], function () {
            Route::get('/', 'CustomerController@getCus');

            Route::get('/edit/{id}','CustomerController@getEditCus');
            Route::post('/edit/{id}','CustomerController@postEditCus');

            Route::get('/delete/', 'CustomerController@getDeleteCus');
        });

        Route::group(['prefix' => 'cart'], function () {
            Route::get('/','CartController@getCartOnline');
            
            Route::get('/view/{id}','CartController@getViewDetailCartOnline');
            
        });

        Route::group(['prefix' => 'orders'], function () {
            Route::get('/','OrdersController@getOrders');
            
            Route::get('/view/{id}','OrdersController@getViewDetailOrders');
            
            Route::get('/add/','OrdersController@getAddOrders');

            Route::post('/add/','OrdersController@postAddOrders');

            Route::get('/cart/{id}','OrdersController@getAddOrdersFromCart');

            Route::post('/cart/{id}','OrdersController@postAddOrdersFromCart');
            
            Route::get('/options/{id}','OrdersController@getOptions');

            Route::get('/item/add','OrdersController@getAddItem');
            Route::get('/item/delete','OrdersController@getDelItem');
            Route::get('/item/update','OrdersController@getUpdateItem');

            Route::get('/print/{id}','OrdersController@getPrintOrders');

            Route::get('/cancel/','OrdersController@getCancelOrders');
        });
        
    });
    Route::get('/logout','HomeController@getLogout');
});