<?php

use Illuminate\Support\Facades\Route;


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


//All the admin routes will be defined here...
//Login Routes
Route::group(['middleware' => ['guest:admin']], function(){
    Route::get('/login','Admin\Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login','Admin\Auth\LoginController@login');
});


//Register Routes
Route::get('/register', 'Admin\Auth\RegisterController@register')->name('register');
Route::post('/create','Admin\Auth\RegisterController@create')->name('create');

//Forgot Password Routes
Route::get('/password/reset','Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/email','Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');


//Reset Password Routes
Route::get('/password/reset{token}','Admin\Auth\ResetPasswordController@showResetForm')->name('password.request');
Route::post('/password/reset{token}','Admin\Auth\ResetPasswordController@reset')->name('password.update');

//Admin Task CRUD
Route::group(['middleware' => ['auth:admin, auth:api']], function(){
    Route::get('/home','UsersController@dashboard')->name('home');   
    Route::prefix('user')->group(function () {
        Route::get('/index','UsersController@index')->name('index');
        Route::get('/{user}/edit', 'UsersController@edit')->name('edit');
        Route::put('/{user}', 'UsersController@update')->name('update');
        Route::delete('/{user}', 'UsersController@destroy')->name('destroy');
    });

    //Logout
    Route::post('/logout','Admin\Auth\LoginController@logout')->name('logout');
});

