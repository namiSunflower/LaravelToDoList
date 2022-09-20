@extends('layouts.app')

@section('content')
       <div class="container">
            <!-- <h1>Create Task</h1> -->
            <div>
                <div class="bg-light text-dark p-5 border border-danger" style="text-align: center">
                    <h1 class="mb-4">Task Title: {{$task->taskTitle}}</h1>
                    <h4 class="fs-5 mb-2">Deadline: {{$task->date}}</h4>
                    <p class="fs-3">Description: {{$task->description}}</p>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('tasks.edit', $task->id)}}" class="btn btn-primary me-3">edit</a></button>
                        <form method="post" action="{{ route('tasks.destroy', $task->id)}}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">delete</button>
                        </form>
                    </div>
                </div>
        </div>
@endsection

