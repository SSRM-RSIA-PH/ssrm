@extends('layouts.super')

@section('title')
Detail User
@endsection

@section('content')

<div class="col-md-8">
    <a href="{{route('user.index')}}" class="btn btn-primary mb-3">Back</a>
    <div class="card">
        <div class="card-body">
            <b>Name</b><br>
            {{$user->name}}
            <br><br>

            <b>Username</b><br>
            {{$user->username}}
            <br><br>

            <b>Email</b><br>
            {{$user->email}}
            <br><br>

            <b>Roles</b><br>
            {{$user->role}}
            <br><br>

            <b>Create at</b><br>
            {{$user->created_at}}
            <br><br>
        </div>
    </div>
</div>
@endsection