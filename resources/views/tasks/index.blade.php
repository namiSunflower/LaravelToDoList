@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Welcome {{$name}}!</h1>
    <br>
    <h2 class="text-center">All Your Tasks:</h2>
    @if(count($tasks) > 0)
        @foreach($tasks as $task)
        <div class="task-container">
            <h3>{{$task-> taskTitle}}</h3>
            <a href="{{ route('tasks.show', $task->id)}}" class="btn btn-secondary">View</a>
        </div>
        @endforeach
    @endif
    <br>
    <a href="/tasks/create" class= "btn btn-primary">Create New Task</a>
</div>      
@endsection