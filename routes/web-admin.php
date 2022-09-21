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
Route::get('/login',[LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login',[LoginController::class, 'login']);


//Register Routes
Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/validator',[RegisterController::class, 'validator'])->name('validator');
    
//Forgot Password Routes
Route::get('/password/reset',[ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email',[ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

    
//Reset Password Routes
Route::get('/password/reset{token}',[ResetPasswordController::class, 'showResetForm'])->name('password.request');
Route::post('/password/reset{token}',[ResetPasswordController::class, 'reset'])->name('password.update');

//Admin Task CRUD
Route::group(['middleware' => ['auth:admin']], function(){
    Route::get('/home',[HomeController::class, 'index'])->name('home');
    Route::get('/user/allUsers',[HomeController::class, 'allUsers'])->name('allUsers');
    Route::get('/user/{user}/edit', [HomeController::class, 'edit'])->name('edit');
    Route::put('/user/{user}', [HomeController::class, 'update'])->name('update');
    Route::delete('/user/{user}', [HomeController::class, 'destroy'])->name('destroy');

    //Logout
    Route::post('/logout',[LoginController::class, 'logout'])->name('logout');
});