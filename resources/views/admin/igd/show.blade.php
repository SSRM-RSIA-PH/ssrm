@extends('layouts.super')
@section('title') Supervisor @endsection
@section('content')

<div class="alert alert-success w-100">
    Show Upload [No RM]
</div>

<div class="card">
    <div class="card-header">
        [Nama header]
    </div>
    <div class="card-body">
        <embed src="{{ asset('filenya disini') }}" type="application/pdf" width="100%" height="600px" />
    </div>
    <a href="" class="btn btn-success">Valid</a>
    <a href="" class="btn btn-danger">Delete</a>
</div>

@endsection