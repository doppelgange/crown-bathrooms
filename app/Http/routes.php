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
Route::get('/product', 'Frontend\FrontendProductController@index');
Route::resource('/category/{category}/product', 'Frontend\FrontendProductController');
Route::resource('/cart', 'Frontend\CartController');


//Route::get('/backend', 'Backend\DashboardController@index');
//Route::resource('/backend/category', 'Backend\CategoryController');
//Route::resource('/backend/product', 'Backend\ProductController');

//Backend pages, need to login
Route::group(['middleware' => ['web.backend']], function () {
    Route::get('/backend', 'Backend\DashboardController@index');
    Route::resource('/backend/category', 'Backend\CategoryController');
    Route::resource('/backend/product', 'Backend\ProductController');
});




