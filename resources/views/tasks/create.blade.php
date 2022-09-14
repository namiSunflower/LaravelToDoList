@extends('layouts.app')
@section('content')
    <div class="container">
        <!-- <div class="relative flex items-top justify-content-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0"> -->
            <!-- <h1>Create Task</h1> -->
            <form method="post" action="{{ route('tasks.store')}}">
                @csrf
                <label for ="newTask">Task Title</label><br>
                <input type="text" name = "taskTitle" id="taskTitle"><br>
                @if ($errors->has('taskTitle'))
                    <span class="text-danger">{{ $errors->first('taskTitle') }}</span><br>
                @endif
                <label for ="description">description</label><br>
                <textarea id="description" name="description" rows="4" cols="50"></textarea><br>
                <label for ="newTask">date</label><br>
                <input id="date" name="date"><br>
                @if ($errors->has('date'))
                <span class="text-danger">{{ $errors->first('date') }}</span><br><br>
                @endif
                <input type="submit">
            </form>
        </div>
@endsection
