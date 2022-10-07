<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/','API\UserBirthdayController@api')->name('api');
Route::get('/birthdays', 'API\UserBirthdayController@index')->name('index');
Route::get('/{user}/edit', 'API\UserBirthdayController@edit')->name('edit');
Route::put('/{user}', 'API\UserBirthdayController@update')->name('update');
// Route::get('/','API\UserBirthdayController@api')->name('api');
Route::get('admin/{user}', 'API\UserBirthdayController@api_show')->name('api_show');
Route::get('/{user}', 'API\UserBirthdayController@show')->name('show');

// Route::group(['prefix' => 'admin'], function () {;
//     Route::post('/', 'API\UserChartController@store')->name('store');
//     Route::put('/{user}', 'API\UserChartController@update')->name('update');
//     Route::delete('/{user}', 'API\UserChartController@destroy')->name('destroy');
// });

