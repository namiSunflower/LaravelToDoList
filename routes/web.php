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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => '/tasks', 'as' => 'tasks.', 'middleware' => 'auth'], function () {
    Route::get('/', 'TasksController@index')->name('index');
    Route::get('/create', 'TasksController@create')->name('create');
    Route::get('/{task}', 'TasksController@show')->name('show');
    Route::get('/{task}/edit', 'TasksController@edit')->name('edit');
    Route::post('/', 'TasksController@store')->name('store');
    Route::put('/{task}', 'TasksController@update')->name('update');
    Route::delete('/{task}', 'TasksController@destroy')->name('destroy');
});


Route::get('/home', 'HomeController@index')->name('home');

