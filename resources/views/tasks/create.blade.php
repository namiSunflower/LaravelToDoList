@extends('layouts.app')
@section('content')
    <div class="container">
        <!-- <div class="relative flex items-top justify-content-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0"> -->
            <!-- <h1>Create Task</h1> -->
            <form method="post" action="{{ route('tasks.store')}}">
                @csrf
                <label for ="newTask" class="fs-3">Task Title</label><br>
                <input type="text" class="form-control input-lg" name = "taskTitle" id="taskTitle"><br>
                @if ($errors->has('taskTitle'))
                    <span class="text-danger">{{ $errors->first('taskTitle') }}</span><br>
                @endif
                <label for ="description" class="fs-3">Description</label><br>
                <textarea id="description" class="form-control input-lg" name="description" rows="4" cols="50"></textarea><br>
                <label for ="newTask" class="fs-3">Deadline</label><br>
                <input id="date" type="date" class="form-control input-m" name="date"><br>
                @if ($errors->has('date'))
                <span class="text-danger">{{ $errors->first('date') }}</span><br><br>
                @endif
                <div class="text-center">
                    <input type="submit" class="btn btn-success fs-4">
                </div>
            </form>
        </div>
@endsection
