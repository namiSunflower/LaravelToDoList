@extends('layouts.app')

@section('content')
       <div class="container">
            <!-- <h1>Create Task</h1> -->
            <div>
                <div class="task-container">
                    <h3>Task Title: {{$task->taskTitle}}</h3>
                    <h4>Date: {{$task->date}}</h4>
                    <p>Description: {{$task->description}}</p>
                    <button class="btn btn-secondary"><a href="{{ route('tasks.edit', $task->id)}}">edit</a></button>
                    <form method="post" action="{{ route('tasks.destroy', $task->id)}}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-secondary">delete</button>
                    </form>
                </div>
        </div>
@endsection

