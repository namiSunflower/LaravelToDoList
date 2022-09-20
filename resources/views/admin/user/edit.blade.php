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
                <input id="password" name="password" type="password" value="{{$user->password}}"><br>
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span><br>
                @endif
                <br>
                <input type="submit">
            </form>
            <div id="taskList">
                
            </div>
        </div>

@endsection

