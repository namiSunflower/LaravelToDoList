<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $name = auth()->user()->name;
        $id = auth()->user()->id;
        //Display all user's tasks
        $tasks = Task::all();
        //chaining them for now
        return view('tasks.index')->with('tasks', $tasks)->with('name', $name);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Create a new task
        $newTask = new Task;
        $newTask->taskTitle = $request->taskTitle;
        $newTask->description = $request->description;
        $newTask->date = $request->date;
        $newTask->user_id = auth()->user()->id;
        // $post->user_id = auth()->user()->id;
        $newTask->save();
        // return redirect()->route('tasks.index');
        return redirect('/tasks')->with('success', 'Task Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $taskInfo = Task::fi;
        return view('tasks.show')->with('taskInfo', $taskInfo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        return view('tasks.edit')->with('task', $task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $task = Task::find($id);
        $task->taskTitle = $request->taskTitle;
        $task->description = $request->description;
        $task->date = $request->date;
        $task->save();
        return redirect('/tasks')->with('success', 'Stock updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $task = Task::find($id);
        $task->delete();
        return redirect('/tasks')->with('success', 'Task removed.'); 
    }

}
