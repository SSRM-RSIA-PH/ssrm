@extends('layouts.dokter')
@section('title') Dokter @endsection
@section('content')

<div class="col-2">
    <div class="alert alert-primary text-center">[No RM]</div>
    <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action active">2019/10/08</a>
        <a href="#" class="list-group-item list-group-item-action">2019/09/08</a>
        <a href="#" class="list-group-item list-group-item-action">2019/08/08</a>
        <a href="#" class="list-group-item list-group-item-action">2019/07/08</a>
        <a href="#" class="list-group-item list-group-item-action">2019/06/08</a>
        <a href="#" class="list-group-item list-group-item-action">2019/05/08</a>
    </div>
</div>

<div class="col-10">
    <div class="card">
        <embed src="{{ asset('img/1.pdf') }}" type="application/pdf" width="100%" height="800px" />
    </div>
</div>

@endsection