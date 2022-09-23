@extends('layouts.app')
@section('content')
    <div class="container">
            <form method="post" action="{{ route('tasks.store')}}">
                @csrf
                <label for="users" class="fs-3">
                <select name="users">
                    @foreach ($user as $u)
                          <option value="{{$u}}" > {{ $u->name }}</option>
                    @endforeach
                </select><br>
                <label for ="newChart" class="fs-3">Weight</label><br>
                <input type="text" class="form-control input-lg" name = "taskTitle" id="taskTitle" value = {{old('taskTitle')}}><br>
                @error('taskTitle')
                    <span class="text-danger">{{ $errors->first('taskTitle') }}</span><br>
                @enderror
                <label for ="description" class="fs-3">Height</label><br>
                @error('date')
                    <span class="text-danger">{{ $errors->first('date') }}</span><br><br>
                @enderror
                <div class="text-center">
                    <input type="submit" class="btn btn-success fs-4">
                </div>
            </form>
        </div>
@endsection
