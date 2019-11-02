@extends('layouts.admin')
@section('title') Admin @endsection
@section('content')

<div class="container">
    <div class="alert alert-success w-100">Welcome {{Auth::user()->name}}</div>
</div>

@endsection