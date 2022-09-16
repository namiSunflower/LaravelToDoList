<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;

use Illuminate\Support\Facades\Auth;

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
        Route::get('/home',[HomeController::class, 'index'])->name('home');
        Route::get('/login',[LoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login',[LoginController::class, 'login']);
        Route::post('/logout',[LoginController::class, 'logout'])->name('logout');

        //Register Route
        // Route::get('/register', [RegisterController::class, 'register'])->name('register');
        // // Route::post('/register',[LoginController::class, 'register'])->
    
        // //Forgot Password Routes
        // Route::get('/password/reset',[ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
        // Route::post('/password/email',[ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
        // Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
        // Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    
        //Reset Password Routes
        // Route::get('/password/reset{token}',[ResetPasswordController::class, 'showResetForm'])->name('password.request');
        // Route::post('/password/reset{token}',[ResetPasswordController::class, 'reset'])->name('password.update');
        // Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
        // Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');
