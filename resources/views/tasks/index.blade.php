@extends('layouts.app')

@section('content')
    <h1>All Tasks</h1>
    @if(count($tasks) > 1)
        @foreach($tasks as $task)
        <div class="task-container">
            <h3>{{$task-> taskTitle}}</h3>
            <button><a href="{{ route('tasks.show', $task->id)}}">View</a></button>
        </div>
        @endforeach
    @endif
        
@endsection