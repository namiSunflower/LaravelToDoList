@extends('layouts.admin')
@section('content')
    <user-birthday-edit-component user-id="{{ $user->id }}"></user-birthday-edit-component>
@endsection