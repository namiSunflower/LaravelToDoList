@extends('layouts.app')

@section('content')
<div class="container">
    {{-- if(@auth) --}}
    <h1 class="text-center">Welcome {{$name}}!</h1>
    <br>
    <h2 class="text-center">You are logged in</h2>
</div>      
@endsection