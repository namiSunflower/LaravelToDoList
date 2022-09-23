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

// Route::group(['prefix' => '/tasks', 'as' => 'tasks.', 'middleware' => 'auth'], function () {
//     Route::get('/', [TasksController::class, 'index'])->name('index');
//     Route::get('/create', [TasksController::class, 'create'])->name('create');
//     Route::get('/{task}/edit', [TasksController::class, 'edit'])->name('edit');
//     Route::post('/', [TasksController::class, 'store'])->name('store');
//     Route::put('/{task}', [TasksController::class, 'update'])->name('update');
//     Route::delete('/{task}', [TasksController::class, 'destroy'])->name('destroy');
// });

Route::get('/',[UserChartController::class, 'index'])->name('index');
Route::get('/{user}', [UserChartController::class, 'show'])->name('show');


Route::prefix('admin')->group(function () {
    Route::get('/create', [UserChartController::class, 'create'])->name('create');
    Route::get('/{user}/edit', [UserChartController::class, 'edit'])->name('edit');
    Route::put('/{user}', [UserChartController::class, 'update'])->name('update');
    Route::delete('/{user}', [UserChartController::class, 'destroy'])->name('destroy');
});


