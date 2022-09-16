<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\models\Task;
use Illuminate\Http\Request;

class HomeController extends Controller
{
     /**
     * Show Admin Dashboard.
     * 
     * @return \Illuminate\Http\Response
     */
    // public function index(){
    //     return view('admin.home');
    // }

    public function index()
    {
        //Display all user's tasks
        // $user_id = auth()->user()->id;
        // $task_user_id = Task::find($user_id);
        $tasks = Task::all();

        //Only show tasks by user who is logged in

        //chaining them for now
        // return view('tasks.index')->with('tasks', $tasks)->with('name', $name);
        return view('admin.home')->with(compact(['tasks']));
    }
}
