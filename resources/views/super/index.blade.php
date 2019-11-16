@extends('layouts.main')
@section('title') Supervisor @endsection
@section('menu')
<a href="{{route('super.index')}}" class="nav-item nav-link active">Dashboard</a>
<a class="nav-link" href="{{-- {{route('logupload')}} --}}">Log Upload</a>
<a class="nav-link" href="{{route('user.index')}}">Manage Users</a>
<a class="nav-link" href="{{route('super.rekmed')}}">Manage Rekmed</a>
@endsection
@section('content')

<div class="alert alert-success w-100">Welcome 
    @if (Auth::user())
    {{Auth::user()->name}}
    @endif
</div>


@endsection