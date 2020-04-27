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
                <input name="search" type="text" class="form-control" id="search"
                    style="border-bottom-left-radius: 30px;border-top-left-radius: 30px" maxlength="7" minlength="6"
                    placeholder="Search Rekam Medis" aria-label="Search No Rekam Medis" aria-describedby="button-addon2"
                    value="{{Request::get('search')}}">
                <div class="input-group-append">
                    <input class="btn btn-outline-primary"
                        style="border-bottom-right-radius: 30px;border-top-right-radius: 30px" type="submit"
                        id="button-addon2" value="Search">
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row d-flex justify-content-center">
    <div class="col-8">
        <div class="list-group">
            @isset($find)
            <small>Result : </small>
            @if ($find == '[]')
            <div class="alert alert-danger font-weight-bold h3">
                Data tidak ditemukan
            </div>
            @else
            @foreach ($find as $f)
            <a href="{{route('dokter.show', ['rek_id'=>$f->rek_id])}}" class="font-weight-bold h3">
                <div class="alert alert-primary">
                    {{$f->rek_id}} - {{$f->rek_name}}
                </div>
            </a>
            @endforeach
            @endif
            @endisset
        </div>
    </div>
</div>
@endsection