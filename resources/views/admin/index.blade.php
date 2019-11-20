@extends('layouts.main')
@section('title') Admin @endsection
@section('content')

<div class="alert alert-success w-100">Welcome
    @if (Auth::user())
    {{Auth::user()->name}}
    @endif
</div>
<div class="">
    <div class="row d-flex justify-content-center mb-3 pt-5">
        <img src="img/logo-rsia-ph.png" width="300px" alt="rsia-ph">
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-8">
            <form action="{{route('admin.index')}}">
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
                <form action="{{route('admin.create.rek')}}" class="form-inline">
                    <input type="hidden" name="id" value="{{Request::get('search')}}">
                    <input type="submit" class="list-group-item list-group-item-action"
                        value="Not Found [{{Request::get('search')}}] Click to Create New">
                </form>
                @else
                <small>Result : </small>
                @foreach ($find as $f)
                <a href="{{route('admin.show.rek', ['rek_id'=>$f->rek_id])}}"
                    class="list-group-item list-group-item-action">{{$f->rek_id}} - {{$f->rek_name}}</a>
                @endforeach
                @endif
                @endisset
            </div>
        </div>
    </div>
</div>

@endsection