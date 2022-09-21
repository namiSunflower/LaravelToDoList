@extends('layouts.app')
@section('content')
        <div class="container">
            <form method="post" action="{{ route('tasks.update', $task)}}">
                @csrf
                @method('put')
                <label for ="newTask" class="fs-3">Task Title</label><br>
                <input type="text" class="form-control input-lg" name = "taskTitle" id="taskTitle" value="{{old('taskTitle', $task->taskTitle)}}"><br>
                @if ($errors->has('taskTitle'))
                <span class="text-danger">{{ $errors->first('taskTitle') }}</span><br>
                @endif
                <label for ="description" class="fs-3">Description</label><br>
                <textarea id="description" name="description" class="form-control inputdefault" rows="4" cols="50">{{old('description', $task->description)}}</textarea><br>
                <label for ="newTask" class="fs-3">Deadline</label><br>
                <input id="date" type="date" class="form-control input-m" name="date" value="{{old('date', $task->date)}}" ><br>
                @if ($errors->has('date'))
                <span class="text-danger">{{ $errors->first('date') }}</span>
                @endif
                <br>
                <div class="text-center">
                    <input type="submit" class="btn btn-success fs-4">
                </div>
            </form>
        </div>
@endsection

