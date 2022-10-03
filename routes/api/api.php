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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/','API\UserChartController@api')->name('api');
Route::get('/{user}', 'API\UserChartController@api_show')->name('api_show');

Route::group(['prefix' => 'admin'], function () {;
    Route::post('/', 'API\UserChartController@store')->name('store');
    Route::put('/{user}', 'API\UserChartController@update')->name('update');
    Route::delete('/{user}', 'API\UserChartController@destroy')->name('destroy');
});

