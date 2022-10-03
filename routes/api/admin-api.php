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


//API Admin View without auth
Route::get('/','API\UserChartController@index')->name('index');
Route::get('/create', 'API\UserChartController@create')->name('create');
Route::get('/{user}', 'API\UserChartController@show')->name('show');
Route::get('/{user}/edit', 'API\UserChartController@edit')->name('edit');

