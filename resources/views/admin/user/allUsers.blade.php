@extends('layouts.admin')

@section('content')
<div class="container">
    {{-- <h1 class="text-center">Welcome {{$name}}!</h1> --}}
    <h1 class="text-center">All Users:</h1>
        @if(count($users) > 0)
            @foreach($users as $user)
        <div class="bg-light text-dark p-3 border border-danger text-center">
            <h3>{{$user-> name}}</h3>
            <small>Created on {{$user -> created_at}}</small><br>
            <small>Updated at {{$user -> updated_at}}</small><br>
            <div class="d-flex justify-content-center">
            <a href="{{ route('admin.edit', $user->id)}}" class="btn btn-primary me-3">edit</a>
                <form method="post" action="{{ route('admin.destroy', $user->id)}}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">delete</button>
                </form>
            </div>
        </div>
            @endforeach
        @else
        <p>No users to show.</p>
        @endif  
    <br>
</div>      
@endsection