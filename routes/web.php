<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\Admin\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/tasks', [TasksController::class, 'index'])->name('home');

//I didn't delete the comments just for learning reference later on
// Route::get('/todo', function(){
//     return view('pages.todo');
// });

//show all tasks
//will check later if this doesn't work
// Route::get('/tasks', [TasksController::class, 'index']);

Route::group(['prefix' => '/tasks', 'as' => 'tasks.', 'middleware' => 'auth'], function () {
    Route::get('/', [TasksController::class, 'index'])->name('index');
    Route::get('/create', [TasksController::class, 'create'])->name('create');
    Route::get('/{task}', [TasksController::class, 'show'])->name('show');
    Route::get('/{task}/edit', [TasksController::class, 'edit'])->name('edit');
    Route::post('/', [TasksController::class, 'store'])->name('store');
    Route::put('/{task}', [TasksController::class, 'update'])->name('update');
    Route::delete('/{task}', [TasksController::class, 'destroy'])->name('destroy');
});

// Route::get('/tasks/{id}', [TasksController::class, 'show']);
//task creation screen
// Route::get('/tasks/create', [TasksController::class, 'create']);
//submitting newly created task
// Route::post('/tasks/{id}', [TasksController::class, 'store']);
// //update task
// Route::put('/tasks/{id}', [TasksController::class, 'update']);
// //delete task
// Route::delete('/tasks/{id}', [TasksController::class, 'delete']);
// //edit task screen
// Route::get('/tasks/{id}/edit', [TasksController::class, 'edit']);


//Only logged in users can access routes
// Route::resource('tasks', TasksController::class);
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

