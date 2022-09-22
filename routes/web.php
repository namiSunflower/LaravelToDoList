<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;

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


Route::group(['prefix' => '/tasks', 'as' => 'tasks.', 'middleware' => 'auth'], function () {
    Route::get('/', [TasksController::class, 'index'])->name('index');
    Route::get('/create', [TasksController::class, 'create'])->name('create');
    Route::get('/{task}', [TasksController::class, 'show'])->name('show');
    Route::get('/{task}/edit', [TasksController::class, 'edit'])->name('edit');
    Route::post('/', [TasksController::class, 'store'])->name('store');
    Route::put('/{task}', [TasksController::class, 'update'])->name('update');
    Route::delete('/{task}', [TasksController::class, 'destroy'])->name('destroy');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

