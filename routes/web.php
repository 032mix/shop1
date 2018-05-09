<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// MAIN
Route::get('/', 'MainController@index')->name('home');
Route::get('/products/{subCategory}', 'SubCategoryController@show');
Route::get('/products/single/{product}', 'ProductController@show');
Route::post('/addReview/{product}', 'ReviewController@store');

// CART
Route::get('/cart', 'CartController@index');
Route::post('/addToCart/{product}', 'CartController@addToCart');
Route::post('/removeFromCart/{product}', 'CartController@removeFromCart');
Route::get('/order', 'OrderController@index');
Route::post('/order', 'OrderController@store');

// USER
Route::get('/register', 'AuthController@register');
Route::post('/register', 'AuthController@makeUser');
Route::get('/login', 'AuthController@login')->name('login');
Route::post('/login', 'AuthController@startSession');
Route::get('/logout', 'AuthController@logout');

// ADMIN
Route::get('/admin', 'MainController@indexAdmin')->name('admin');
Route::get('/admin/categories', 'CategoryController@indexAdmin');
Route::get('/admin/createCategory', 'CategoryController@create');
Route::post('/admin/storeCategory', 'CategoryController@store');
Route::post('/admin/editCategory', 'CategoryController@edit');
Route::post('/admin/updateCategory', 'CategoryController@update');
Route::get('/admin/createSubCategory', 'SubCategoryController@create');
Route::post('/admin/storeSubCategory', 'SubCategoryController@store');
Route::post('/admin/editSubCategory', 'SubCategoryController@edit');
Route::post('/admin/updateSubCategory', 'SubCategoryController@update');
Route::get('/admin/products', 'ProductController@indexAdmin');
Route::get('/admin/products/{id}', 'ProductController@indexAdminBySubCategory');
Route::get('/admin/createProduct', 'ProductController@create');
Route::post('/admin/storeProduct', 'ProductController@store');
Route::get('/admin/users', 'AuthController@indexAdmin');
Route::get('/admin/orders', 'OrderController@indexAdmin');
Route::get('/admin/order/{order}', 'OrderController@show');
