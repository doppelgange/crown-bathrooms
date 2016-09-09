<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();



// Frontend pages, no need login
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::resource('/product/search', 'Frontend\ProductSearchController');
Route::get('/product', 'Frontend\FrontendProductController@index');
Route::resource('/category/{category}/product', 'Frontend\FrontendProductController');
Route::resource('/selector', 'Frontend\CartController');
Route::resource('api/selector', 'Api\CartController');


Route::get('/test',function(){
    return view('frontend.test');
});

//Route::get('/backend', 'Backend\DashboardController@index');
//Route::resource('/backend/category', 'Backend\CategoryController');
//Route::resource('/backend/product', 'Backend\ProductController');

//Backend pages, need to login
Route::group(['middleware' => ['web.backend']], function () {
    Route::get('/backend', 'Backend\DashboardController@index');
    Route::resource('/backend/category', 'Backend\CategoryController');
    Route::resource('/backend/product', 'Backend\ProductController');
    Route::resource('/backend/image', 'Backend\ImageController');
//    Route::resource('/backend/product-variant', 'Backend\ProductVariantController');
    Route::resource('/backend/product/{product}/variant', 'Backend\ProductVariantController');


});




