@extends('layouts.admin')
@section('content')
        <div class="container">
            <!-- <h1>Create Task</h1> -->
            <form method="post" action="{{ route('admin.update', $user->id)}}">
                @csrf
                @method('put')
                <label for ="name">Name</label><br>
                <input type="text" name = "name" id="name" value="{{$user->name}}"><br>
                <label for ="email">Email</label><br>
                <input type="email" name = "email" id="email" value="{{$user->email}}"><br>
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span><br>
                @endif
                <label for ="password">Password</label><br>
                <input id="password" name="password" type="password"><br>
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span><br>
                @endif
                <br>
                <input type="submit">
            </form>
            <h2>Tasks </h2>
            @if(count($tasks) > 0)
                @foreach($tasks as $task)
                <div class="task-container border border-secondary text-center">
                    <h3>{{$task-> taskTitle}}</h3>
                    <small>Deadline: {{$task -> date}}</small><br>
                    <p> {{$task -> description}}</p>
                </div>
                @endforeach 
            @else
            <p>You have no tasks. Make sure to create a new one to keep track of your goals!</p>
            @endif  
@endsection
