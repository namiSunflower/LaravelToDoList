@extends('layouts.app')

@section('content')
<div class="container">
    {{-- if(@auth) --}}
    <h1 class="text-center">Welcome {{$name}}!</h1>
    <br>
    <h2 class="text-center">Task List:</h2>
        @if(count($tasks) > 0)
            @foreach($tasks as $task)
        <div class="task-container p-3 border border-success text-center">
            <h3>{{$task-> taskTitle}}</h3>
            <small>Created on {{$task -> created_at}}</small><br>
            <small>Updated at {{$task -> updated_at}}</small><br>
            <a href="{{ route('tasks.show', $task->id)}}" class="btn btn-secondary mt-3">View</a>
        </div>
            @endforeach
        @else
        <p>You have no tasks. Make sure to create a new one to keep track of your goals!</p>
        @endif  
    <br>
    <a href="/tasks/create" class= "btn btn-primary">Create New Task</a>
</div>      
@endsection