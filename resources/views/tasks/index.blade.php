@extends('layouts.app')

@section('content')
    <h1>All Tasks</h1>
    @if(count($tasks) > 1)
        @foreach($tasks as $task)
        <div class="task-container"as>
            <h3>{{$task-> taskTitle}}
        </div>
@endsection