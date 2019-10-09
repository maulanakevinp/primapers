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
    Route::resource('/article', 'ArticleController')->except(['show']);
    Route::get('/article/softdelete/{id}', 'ArticleController@softdelete')->name('softdelete');
    Route::get('/article/trash', 'ArticleController@trash')->name('article.trash');
    Route::get('/article/restore/{id}', 'ArticleController@restore')->name('article.restore');
    Route::get('/article/restore', 'ArticleController@restoreAll')->name('article.restoreAll');
    Route::get('/article/search', 'ArticleController@search')->name('article.search');
    Route::get('/article/category/{id}', 'ArticleController@category')->name('article.category');
    Route::get('/article/subcategory/{id}/{category}', 'ArticleController@subcategory')->name('article.subcategory');

    Route::resource('/category', 'CategoryController')->except(['create', 'show', 'edit']);
    Route::post('/get-sub-categories', 'SubcategoryController@getSubCategories')->name('get-sub-categories');
    Route::get('/subcategory/{category}', 'SubcategoryController@index')->name('subcategory.index');
    Route::post('/subcategory/{category}', 'SubcategoryController@store')->name('subcategory.store');
    Route::patch('/subcategory/{id}/{category}', 'SubcategoryController@update')->name('subcategory.update');
    Route::delete('/subcategory/{id}/{category}', 'SubcategoryController@destroy')->name('subcategory.destroy');

    Route::resource('/profile', 'ProfileController')->except(['create', 'show', 'edit', 'store']);

    Route::get('/change-password', 'UserController@changePassword')->name('change-password');
    Route::patch('/update-password/{id}', 'UserController@updatePassword')->name('update-password');

    Route::get('/slide', 'UtilityController@slide');
    Route::patch('/update-slide/{photo}', 'UtilityController@updateSlide')->name('update-slide');
    Route::delete('/destroy-slide/{photo}', 'UtilityController@destroySlide')->name('destroy-slide');

    Route::get('/header', 'UtilityController@header');
    Route::patch('/update-header', 'UtilityController@updateHeader')->name('update-header');
    Route::patch('/update-color', 'UtilityController@updateColor')->name('update-color');
    Route::delete('/destroy-header', 'UtilityController@destroyHeader')->name('destroy-header');

    Route::resource('/announcement', 'AnnouncementController');
});

Route::get('/', 'HomeController@index')->name('home');
Route::get('/tentang-kami', 'HomeController@about')->name('about');
Route::get('/search', 'HomeController@search')->name('search');
Route::get('/artikel/{id}/{title}', 'ArticleController@show')->name('show');
Route::get('/kategori/{id}/{berita}', 'ArticleController@showByCategory')->name('kategori');
Route::get('/sub-kategori/{id}/{subcategory}', 'ArticleController@showBySubcategory')->name('sub-kategori');
