@extends('layouts.admin')
@section('title') Admin @endsection
@section('content')

<div class="container">
    <div class="alert alert-success w-100">Welcome
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
                    <form action="{{route('admin.index')}}" class="form-inline">
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
                        <form action="{{route('admin.create.rek')}}" method="POST" class="form-inline">
                            @csrf
                            <input type="text" name="id" value="{{Request::get('search')}}" hidden>
                            <input type="submit" class="list-group-item list-group-item-action"
                                value="Not Found [{{Request::get('search')}}] Click to Create New">
                        </form>
                        @else
                            @foreach ($find as $f)
                            <a href="#" class="list-group-item list-group-item-action">{{$f->rek_id}} - {{$f->rek_name}}</a>
                            @endforeach
                        @endif
                    @endisset
                </div>
            </div>
        </div>
    </div>

</div>

@endsection