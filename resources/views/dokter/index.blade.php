@extends('layouts.dokter')
@section('title') Dokter @endsection
@section('content')
<div class="container">
    {{-- <div class="alert alert-success">Welcome
        @if (Auth::user())
        {{Auth::user()->name}}
    @endif
</div> --}}
<div class="">
    <div class="row d-flex justify-content-center mb-3">
        <img src="img/logo-rsia-ph.png" width="300px" alt="rsia-ph">
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-8">
            <form action="{{route('dokter.index')}}">
                <div class="input-group input-group-lg mb-3">
                    <input name="search" type="text" class="form-control" placeholder="Search No Rekam Medis"
                        aria-label="Search No Rekam Medis" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <input class="btn btn-outline-primary" type="submit" id="button-addon2" value="Search">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-8">
            <div class="list-group">
                @isset($find)
                @if ($find == '[]')
                <small>Result : </small>
                <div href="" class="list-group-item list-group-item-action">Not Found</div>
                @else
                <small>Result : </small>
                <a href="#" class="list-group-item list-group-item-action">{{$find->first()->rek_id}} -
                    {{$find->first()->rek_name}}</a>
                @endif
                @endisset
            </div>
        </div>
    </div>
</div>
</div>
@endsection