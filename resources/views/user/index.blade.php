@extends('layouts.global')

@section('title')
    Daftar User
@endsection

@section('content')
<table class="table table-bordered">
    <thead>
        <th><b>Name</b></th>
        <th><b>Username</b></th>
        <th><b>Email</b></th>
        <th><b>Action</b></th>
    </thead>
    <tbody>
        @foreach ($users as $u)
        <tr>
            <td>{{$u->name}}</td>
            <td>{{$u->username}}</td>
            <td>{{$u->email}}</td>
            <td><a class="btn btn-info text-white btn-sm" href="{{route('user.edit',['id'=> $u->id])}}">Edit</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection