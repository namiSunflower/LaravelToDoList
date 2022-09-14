@extends('layouts.app')

@section('content')
       <div class="container">
            <!-- <h1>Create Task</h1> -->
            <div>
                <div class="task-container">
                    <h3>Task Title: {{$taskInfo->taskTitle}}</h3>
                    <h4>Date: {{$taskInfo->date}}</h4>
                    <p>Description: {{$taskInfo->description}}</p>
                    <button><a href="{{ route('tasks.edit', $taskInfo->id)}}">edit</a></button>
                    <form method="post" action="{{ route('tasks.destroy', $taskInfo->id)}}">
                        @csrf
                        @method('delete')
                        <button type="submit">delete</button>
                    </form>
                </div>
        </div>
@endsection

