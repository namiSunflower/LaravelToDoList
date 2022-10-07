@extends('layouts.admin')
@section('content')
    <user-birthday-show-component user-id="{{ $user->id }}"></user-birthday-edit-component>
@endsection