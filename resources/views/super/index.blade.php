@extends('layouts.super')
@section('title') Supervisor @endsection
@section('content')

<div class="alert alert-success w-100">Welcome 
    @if (Auth::user())
    {{Auth::user()->name}}
    @endif
</div>


@endsection