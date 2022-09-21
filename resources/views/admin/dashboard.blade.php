@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="text-center">Welcome {{$user_name->name}}!</h1>
    <br>
    <h2 class="text-center">Top 5 Newest Users:</h2>
        @if(count($users) > 0)
            @foreach($users as $user)
        <div class="task-container p-2 border border-secondary text-center">
            <h3>{{$user-> name}}</h3> {{-- TODO: remove spaces between the arrow notation --}}
            <small>Created at {{$user -> created_at}}</small><br>
        </div>
            @endforeach
            <br>
            <a href="{{ route('admin.allUsers', $user)}}" class="btn btn-secondary">Show All Users</a>
        @else
        <p>There are no users to show.</p>
        @endif
</div>
@endsection
