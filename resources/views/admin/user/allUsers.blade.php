@extends('layouts.admin')

@section('content')
<div class="container">
    {{-- <h1 class="text-center">Welcome {{$name}}!</h1> --}}
    <h1 class="text-center">Welcome!</h1>
    <br>
    <h2 class="text-center">All Users:</h2>
        @if(count($users) > 0)
            @foreach($users as $user)
        <div class="task-container border border-secondary text-center">
            <h3>{{$user-> name}}</h3>
            <small>Created on {{$user -> created_at}}</small><br>
            <small>Updated at {{$user -> updated_at}}</small><br>
            <button><a href="{{ route('admin.edit', $user->id)}}">edit</a></button>
            <form method="post" action="{{ route('admin.destroy', $user->id)}}">
                @csrf
                @method('delete')
                <button type="submit">delete</button>
            </form>
        </div>
            @endforeach
        @else
        <p>No users to show.</p>
        @endif  
    <br>
</div>      
@endsection