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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/todo', function(){
//     return view('pages.todo');
// });

// Route::get('/tasks', [TasksController::class, 'index']);
// //show all tasks
// Route::get('/getTasks', [TasksController::class, 'show']);
// //create task
// Route::post('/getTasks', [TasksController::class, 'create']);
// //update task
// Route::put('/putTask', [TasksController::class, 'update']);
// //delete task
// Route::get('/getTasks', [TasksController::class, 'show']);

Route::resource('tasks', TasksController::class);
