@extends('layouts.main')
@section('title') Admin @endsection
@section('content')

<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    Selamat Datang Admin
    @if (Auth::user())
    <strong>{{Auth::user()->name}}</strong>
    @endif
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="">
    <div class="row d-flex justify-content-center mb-3 pt-5">
        <img src="img/logo-rsia-ph.png" width="300px" alt="rsia-ph">
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-7">
            <form action="{{route('admin.index')}}">
                <div class="input-group input-group-lg mb-3">
                    <input name="search" id="search" type="text" class="form-control" maxlength="6" minlength="6" onkeypress='validate(event)'
                        style="border-bottom-left-radius: 30px;border-top-left-radius: 30px"
                        placeholder="Search No Rekam Medis" aria-label="Search No Rekam Medis"
                        aria-describedby="button-addon2" value="{{Request::get('search')}}">
                    <div class="input-group-append">
                        <input class="btn btn-outline-primary"
                            style="border-bottom-right-radius: 30px;border-top-right-radius: 30px" type="submit"
                            id="button-addon2" value="Search">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-1">
            <form action="{{route('admin.create.rek')}}" class="form-inline">
                <input type="submit" class= "btn btn-primary btn-lg"
                    value="Tambah">
            </form>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-8">
            <div class="list-group">
                @if ($find == NULL)
                <small>Result : </small>
                <form action="{{route('admin.create.rek')}}" class="form-inline font-weight-bold h3">
                    <input type="hidden" name="id" value="{{Request::get('search')}}">
                    <input type="submit" class="list-group-item list-group-item-action"
                        value="Not Found [{{strtoupper(Request::get('search'))}}] Click to Create New">
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection