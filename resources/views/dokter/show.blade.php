@extends('layouts.dokter')
@section('title') Dokter @endsection
@section('content')

<div class="col-2">
        <div class="alert alert-primary text-center">[No RM]</div>
    <nav class="nav flex-column">
        <a class="nav-link border-top border-primary" href="#">Date last</a>
        <a class="nav-link" href="#">Date mid</a>
        <a class="nav-link" href="#">Date first</a>
    </nav>
</div>

<div class="col-10">
    <div class="card">
        <embed src="{{ asset('img/1.pdf') }}" type="application/pdf" width="100%" />
    </div>
</div>

@endsection