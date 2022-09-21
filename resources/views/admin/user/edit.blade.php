@extends('layouts.admin')
@section('content')
        <div class="container">
            <form method="post" action="{{ route('admin.update', $user)}}">
                @csrf
                @method('put')
                <label for ="name" class="f-3">Name</label><br>
                <input type="text" name = "name" id="name" class="form-control input-lg" value="{{old('name',$user->name)}}">
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span><br>
                @endif
                <br>
                <label for ="email" class="f-3" class="form-control input-lg">Email</label><br>
                <input type="email" name = "email" class="form-control input-lg" id="email" value="{{old('email',$user->email)}}"><br>
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span><br>
                @endif
                <label for ="password" class="f-3">Password</label><br>
                <input id="password" name="password" class="form-control input-lg" type="password"><br>
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span><br>
                @endif
                <br>
                <div class="text-center">
                    <input type="submit" class="btn btn-success fs-4">
                </div>
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
