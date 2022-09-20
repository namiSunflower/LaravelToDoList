@extends('layouts.admin')

@section('content')
<div class="container">
    {{-- if(@auth) --}}
    {{-- <h1 class="text-center">Welcome {{$name}}!</h1> --}}
    <h1 class="text-center">Welcome!</h1>
    <br>
    <h2 class="text-center">Top 5 Newest Users:</h2>
        @if(count($users) > 0)
            @foreach($users as $user)
        <div class="task-container border border-secondary text-center">
            <h3>{{$user-> name}}</h3>
            <small>Created at {{$user -> created_at}}</small><br>
        </div>
            @endforeach
            <br>
            <a href="{{ route('admin.allUsers', $user->id)}}" class="btn btn-secondary">Show All Users</a>
        @else
        <p>There are no users to show.</p>
        @endif 
</div>      
@endsection