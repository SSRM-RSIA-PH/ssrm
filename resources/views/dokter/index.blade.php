@extends('layouts.dokter')
@section('title') Dokter @endsection
@section('content')
<div class="container">
<div class="alert alert-success mt-3 w-100">Welcome {{Auth::user()->name}}</div>
    <div class="">
        <div class="row d-flex justify-content-center mb-3">
            <img src="img/logo-rsia-ph.png" width="300px" alt="rsia-ph">
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <div class="input-group">
                <form action="{{route('dokter.index')}}">
                    <input name="search" type="text" class="form-control" placeholder="Search No Rekam Medis" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <input class="btn btn-outline-primary" type="submit" id="button-addon2" value="Saerch">
                    </div>
                </form>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action">{{$find->first()->rekid}}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection