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

Route::get('/', function () {
    return view('welcome');
});

//Auth
Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
    'password.email' => false, // Email Verification Routes...
    'password.request' => false, // Email Verification Routes...
    'password.update' => false, // Email Verification Routes...
    'password.reset' => false, // Email Verification Routes...
]);

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::resource('/article', 'ArticleController');
    Route::resource('/category', 'CategoryController')->except(['create', 'show', 'edit']);
    Route::resource('/sub-category', 'SubCategoryController')->except(['create', 'show', 'edit', 'index']);
    Route::get('/sub-category/{category}', 'SubCategoryController@index')->name('sub-category.index');
    Route::resource('/profile', 'ProfileController')->except(['create', 'show', 'edit', 'store']);
});

Route::get('/home', 'HomeController@index')->name('home');
