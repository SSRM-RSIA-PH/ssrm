@extends('layouts.main')
@section('title') Dokter @endsection
@section('content')
<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    Selamat Datang Dokter
    @if (Auth::user())
    <strong>{{Auth::user()->name}}</strong>
    @endif
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="row d-flex justify-content-center mb-3 pt-5">
    <img src="img/logo-rsia-ph.png" width="300px" alt="rsia-ph">
</div>
<div class="row d-flex justify-content-center">
    <div class="col-8">
        <form action="{{route('dokter.index')}}">
            <div class="input-group input-group-lg mb-3">
                <input name="search" minlength="6" maxlength="6" type="text" class="form-control" style="border-bottom-left-radius: 30px;border-top-left-radius: 30px" placeholder="Search Rekam Medis" aria-label="Search No Rekam Medis" aria-describedby="button-addon2" value="{{Request::get('search')}}">
                <div class="input-group-append">
                    <input class="btn btn-outline-primary" style="border-bottom-right-radius: 30px;border-top-right-radius: 30px" type="submit" id="button-addon2" value="Search">
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row d-flex justify-content-center">
    <div class="col-8">
        <div class="list-group">
            @if ($find == NULL)
            @if($type)
            <small>Result : </small>
            <div class="alert alert-danger font-weight-bold h3">
                Data tidak ditemukan
            </div>
            @endif
            @endif
        </div>
    </div>
</div>
@endsection