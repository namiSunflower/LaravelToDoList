<?php

use App\Http\Controllers\API\UserChartController;
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

Route::get('/',[UserChartController::class, 'api'])->name('api');
Route::get('/{user}', [UserChartController::class, 'show'])->name('show');

// 'middleware' => ['auth:admin']]
Route::group(['prefix' => 'admin'], function () {
    Route::get('/create', [UserChartController::class, 'create'])->name('create');
    Route::get('/{user}/edit', [UserChartController::class, 'edit'])->name('edit');
    Route::post('/', [UserChartController::class, 'store'])->name('store');
    Route::put('/{user}', [UserChartController::class, 'update'])->name('update');
    Route::delete('/{user}', [UserChartController::class, 'destroy'])->name('destroy');
});

