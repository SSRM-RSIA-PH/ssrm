@extends('layouts.dokter')
@section('title') Dokter @endsection
@section('content')
<div class="container">
    <div class="alert alert-success mt-3 w-100">Welcome
        @if (Auth::user())
        {{Auth::user()->name}}
        @endif
    </div>
    <div class="">
        <div class="row d-flex justify-content-center mb-3">
            <img src="img/logo-rsia-ph.png" width="300px" alt="rsia-ph">
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <div class="input-group mb-2">
                    <form action="{{route('dokter.index')}}" class="form-inline">
                        <input name="search" type="text" class="form-control" placeholder="Search No Rekam Medis"
                            aria-label="Recipient's username" aria-describedby="button-addon2">
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
                    @isset($find)
                    @if ($find == '[]')
                    <div href="" class="list-group-item list-group-item-action">Not Found</div>
                    @else
                    <a href="#" class="list-group-item list-group-item-action">{{$find->first()->rek_id}}</a>
                    @endif
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>
@endsection