<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\API\UserChartController;


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
    Route::get('/login',[LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login',[LoginController::class, 'login']);
});


//Register Routes
Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/create',[RegisterController::class, 'create'])->name('create');

//Forgot Password Routes
Route::get('/password/reset',[ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email',[ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');


//Reset Password Routes
Route::get('/password/reset{token}',[ResetPasswordController::class, 'showResetForm'])->name('password.request');
Route::post('/password/reset{token}',[ResetPasswordController::class, 'reset'])->name('password.update');

//Admin Task CRUD
Route::group(['middleware' => ['auth:admin']], function(){
    Route::get('/home',[UsersController::class, 'dashboard'])->name('home');    // TODO: Please following the standard routing name. (index, create, show, etc...), currently the allUsers should be index
    // TODO: Also, instead of using the HomeController, you may create a new Controller `UserController` and define your methods there.
    // TODO: You may group the `/user` to a group.
    Route::prefix('user')->group(function () {
        Route::get('/index',[UsersController::class, 'index'])->name('index');
        Route::get('/{user}/edit', [UsersController::class, 'edit'])->name('edit');
        Route::put('/{user}', [UsersController::class, 'update'])->name('update');
        Route::delete('/{user}', [UsersController::class, 'destroy'])->name('destroy');
    });

    //Logout
    Route::post('/logout',[LoginController::class, 'logout'])->name('logout');
});

//API index
Route::get('/api',[UserChartController::class, 'index'])->name('index');
