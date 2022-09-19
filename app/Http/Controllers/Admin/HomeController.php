<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\models\Task;
use App\models\User;
use Illuminate\Http\Request;
use App\Http\Requests\TaskCreateRequest;
use App\Http\Requests\TaskUpdateRequest;

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
        // $test = User::all()->pluck('id');
        //  $test = User::select('id','name')->get();
        // return $test;

        return view('admin.home')->with(compact(['tasks']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = User::select('id','name')->get();
        return view('admin.create')->with(compact(['user']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskCreateRequest $request)
    {
        //Create a new task
        $task = new Task;
        $task->taskTitle = $request->input('taskTitle');
        $task->description = $request->input('description');
        $task->date = $request->input('date');
        $task->user_id = $request->input('users');
        //Save Task
        $task->save();

        return redirect()->route('admin.home', $task)->with('success', 'Task created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        // $taskInfo = Task::find($id);
        return view('admin.show')->with(compact(['task']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        // $task = Task::find($id);
        // return $task;
        return view('admin.edit')->with(compact(['task']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskUpdateRequest $request, Task $task)
    {
        //
        $task->taskTitle = $request->input('taskTitle');
        $task->description = $request->input('description');
        $task->date= $request->input('date');
        // $task->date = $request->date;
        $task->save();
        // return redirect('tasks')->with('success', 'Stock updated.');
        return redirect()->route('admin.home', $task)->with('success', 'Task updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
        $task->delete();
        // return redirect('/tasks')->with('success', 'Task removed.'); 
        return redirect()->route('admin.home', $task)->with('success', 'Task removed!');
    }
}
