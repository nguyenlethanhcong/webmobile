<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
//Load trang chính
Route::get('/', 'FrontendController@getHome');
//Chi tiết sản phẩm & Comment sản phẩm
Route::get('detail/{id}/{slug}.html', 'FrontendController@getDetail');
Route::post('detail/{id}/{slug}.html', 'FrontendController@postComment');
//Search
Route::get('search', 'FrontendController@getSearch');
//Cart
Route::group(['prefix' => 'cart'], function(){
    //Add Cart
    Route::get('add/{id}', 'CartController@getAddCart');
    //Show Cart
    Route::get('show', 'CartController@getShowCart');
    //Delete Cart
    Route::get('delete/{id}', 'CartController@getDeleteCart');
    //Update Cart
    Route::get('update', 'CartController@getUpdateCart');
    //Send email
    Route::post('show', 'CartController@postComplete');
});

//Complete
Route::get('complete', 'CartController@getComplete');

//Danh mục sản phẩm
Route::get('category/{id}/{slug}.html', 'FrontendController@getCategory');
//Trang admin
Route::group(['namespace' => 'Admin'], function(){
    Route::group(['prefix' => 'login', 'middleware' => 'CheckLogedIn'], function(){
        Route::get('/', 'LoginController@getLogin');
        Route::post('/', 'LoginController@postLogin');
    });

    Route::get('logout','HomeController@getLogout');
    //Check Logout
    Route::group(['prefix'=>'admin', 'middleware' => 'CheckLogedOut'], function(){
        Route::get('home', 'HomeController@getHome');
        //Các đường dẫn chức năng của Category
        Route::group(['prefix' => 'category'], function(){
            //Lấy dữ liệu
            Route::get('/', 'CategoryController@getCate');
            //Thêm
            Route::post('/', 'CategoryController@postCate');
            //Sửa
            Route::get('edit/{id}', 'CategoryController@getEditCate');
            Route::post('edit/{id}', 'CategoryController@postEditCate');
            //Xóa
            Route::get('delete/{id}', 'CategoryController@getDeleteCate');
        });

         //Các đường dẫn chức năng của Product
        Route::group(['prefix' => 'product'], function(){
            //Lấy dữ liệu
            Route::get('/', 'ProductController@getProduct');
            //Thêm
            Route::get('add', 'ProductController@getAddProduct');
            Route::post('add', 'ProductController@postAddProduct');
            //Sửa
            Route::get('edit/{id}', 'ProductController@getEditProduct');
            Route::post('edit/{id}', 'ProductController@postEditProduct');
            //Xóa
            Route::get('delete/{id}', 'ProductController@getDeleteProduct');
        });
    });
});
