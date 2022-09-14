<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Task;
use App\Http\Requests\TaskCreateRequest;
use App\Http\Requests\TaskUpdateRequest;

class TasksController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth', ['except' => ['index', 'show']]);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $name = auth()->user()->name;
        //Display all user's tasks
        $user_id = auth()->user()->id;
        // $task_user_id = Task::find($user_id);
        // $tasks = Task::all();

        //Only show tasks by user who is logged in
        $tasks = Task::where('user_id', $user_id)->get();

        //chaining them for now
        // return view('tasks.index')->with('tasks', $tasks)->with('name', $name);
        return view('tasks.index')->with(compact(['name', 'tasks']));
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
    public function store(TaskCreateRequest $request)
    {
        //Create a new task
        $task = new Task;
        $task->taskTitle = $request->input('taskTitle');
        $task->description = $request->input('description');
        $task->date = $request->input('date');
        $task->user_id = auth()->user()->id;
        // $post->user_id = auth()->user()->id;
        $task->save();
        // return redirect()->route('tasks.index');
        // return redirect('tasks')->with('success', 'Task Created');
        return redirect()->route('tasks.index', $task)->with('success', 'Task created!');
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
        return view('tasks.show')->with(compact(['task']));
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
        return view('tasks.edit')->with(compact(['task']));
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
        return redirect()->route('tasks.index', $task)->with('success', 'Task updated!');
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
        return redirect()->route('tasks.index', $task)->with('success', 'Task removed!');
    }

}
