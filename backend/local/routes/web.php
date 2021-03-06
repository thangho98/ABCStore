<?php

Route::get('/', 'FrontendController@getHome');

Route::get('/product/{id}/', 'FrontendController@getProduct');
Route::get('/product/quickview/{id}/', 'FrontendController@getQuickView');
Route::post('/product/{id}/', 'FrontendController@postComment');


Route::get('/brand/{id}/{slug}', 'FrontendController@getProductByBrand');

Route::get('/category/{id}/{slug}', 'FrontendController@getProductByCategory');

Route::get('/search', 'FrontendController@getSearch');

Route::group(['prefix' => 'cart'], function () {
    Route::get('add/{id}', 'CartController@getAddCart');
    Route::get('show', 'CartController@getShowCart');
    Route::get('delete/{id}', 'CartController@getDeleteCart');
    Route::get('update', 'CartController@getUpdateCart');
    Route::post('show', 'CartController@postComplete');
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
        
    });
    Route::get('/logout','HomeController@getLogout');
});