@extends('layouts.super')
@section('title') Supervisor @endsection
@section('menu')
<a href="{{route('super.index')}}" class="nav-item nav-link active">Home</a>
<a class="nav-link" href="{{route('super.log')}}">Log Upload</a>
<a class="nav-link" href="{{route('user.index')}}">Manage Users</a>
<a class="nav-link" href="{{route('super.rekmed')}}">Rekam Medis</a>
@endsection
@section('content')

<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        Selamat Datang Supervisor
        @if (Auth::user())
        <strong>{{Auth::user()->name}}</strong>
        @endif
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

<div class="row d-flex justify-content-center pt-5">
    <img src="img/logo-rsia-ph.png" width="300px" alt="rsia-ph">
</div>


@endsection