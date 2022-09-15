@extends('layouts.app')
@section('content')
        <div class="container">
            <!-- <h1>Create Task</h1> -->
            <form method="post" action="{{ route('tasks.update', $task->id)}}">
                @csrf
                @method('put')
                <label for ="newTask">Task Title</label><br>
                <input type="text" name = "taskTitle" id="taskTitle" value="{{$task->taskTitle}}"><br>
                <label for ="description">description</label><br>
                <textarea id="description" name="description" placeholder="{{$task->description}}" rows="4" cols="50"></textarea><br>
                <label for ="newTask">date</label><br>
                <input id="date" name="date" value="{{$task->date}}"></input><br><br>
                <input type="submit">
            </form>
        </div>
@endsection

