@extends('layouts.main')
@section('title') Supervisor @endsection
@section('menu')
<a href="{{route('super.index')}}" class="nav-item nav-link active">Dashboard</a>
<a class="nav-link" href="{{route('super.log')}}">Log Upload</a>
<a class="nav-link" href="{{route('user.index')}}">Manage Users</a>
<a class="nav-link" href="{{route('super.rekmed')}}">Rekam Medis</a>
@endsection
@section('content')

<div class="alert alert-success w-100">Welcome 
    @if (Auth::user())
    {{Auth::user()->name}}
    @endif
</div>

<div class="row d-flex justify-content-center pt-5">
    <img src="img/logo-rsia-ph.png" width="300px" alt="rsia-ph">
</div>


@endsection