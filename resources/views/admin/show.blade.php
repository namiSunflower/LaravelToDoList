@extends('layouts.app')

@section('content')
       <div class="container">
            <!-- <h1>Create Task</h1> -->
            <div>
                <div class="task-container">
                    <!--Possibly ADD USER NAME HERE-->
                    <h3>Task Title: {{$task->taskTitle}}</h3>
                    <h4>Date: {{$task->date}}</h4>
                    <p>Description: {{$task->description}}</p>
                    <button><a href="{{ route('admin.edit', $task->id)}}">edit</a></button>
                    <form method="post" action="{{ route('admin.destroy', $task->id)}}">
                        @csrf
                        @method('delete')
                        <button type="submit">delete</button>
                    </form>
                </div>
        </div>
@endsection

