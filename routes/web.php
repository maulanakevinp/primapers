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
    Route::resource('/article', 'ArticleController')->except(['show']);
    Route::get('/article/softdelete/{id}', 'ArticleController@softdelete')->name('softdelete');
    Route::get('/article/trash', 'ArticleController@trash')->name('article.trash');
    Route::get('/article/restore/{id}', 'ArticleController@restore')->name('article.restore');
    Route::get('/article/restore', 'ArticleController@restoreAll')->name('article.restoreAll');

    Route::resource('/category', 'CategoryController')->except(['create', 'show', 'edit']);
    Route::post('/get-sub-categories', 'SubcategoryController@getSubCategories')->name('get-sub-categories');
    Route::get('/subcategory/{category}', 'SubcategoryController@index')->name('subcategory.index');
    Route::post('/subcategory/{category}', 'SubcategoryController@store')->name('subcategory.store');
    Route::patch('/subcategory/{id}/{category}', 'SubcategoryController@update')->name('subcategory.update');
    Route::delete('/subcategory/{id}/{category}', 'SubcategoryController@destroy')->name('subcategory.destroy');
    Route::resource('/profile', 'ProfileController')->except(['create', 'show', 'edit', 'store']);
});

Route::get('/home', 'HomeController@index')->name('home');
