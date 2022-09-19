@extends('layouts.app')

@section('content')
<div class="container">
    {{-- if(@auth) --}}
    <h1 class="text-center">Welcome {{$name}}!</h1>
    <br>
    <h2 class="text-center">Task List:</h2>
        @if(count($tasks) > 0)
            @foreach($tasks as $task)
        <div class="task-container border border-secondary text-center">
            <h3>{{$task-> taskTitle}}</h3>
            <small>Created on {{$task -> created_at}}</small><br>
            <small>Updated at {{$task -> updated_at}}</small><br>
            <a href="{{ route('admin.show', $task->id)}}" class="btn btn-secondary">View</a>
        </div>
            @endforeach
        @else
        <p>You have no tasks. Make sure to create a new one to keep track of your goals!</p>
        @endif  
    <br>
    <a href="/admin/create" class= "btn btn-primary">Create New Task</a>
</div>      
@endsection