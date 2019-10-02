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

Route::get('/home', 'HomeController@index')->name('home');
