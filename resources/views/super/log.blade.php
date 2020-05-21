@extends('layouts.super')
@section('title')
Log
@endsection
@section('menu')
<a href="{{route('super.index')}}" class="nav-item nav-link">Home</a>
<a class="nav-link active" href="{{route('super.log')}}">Log Upload</a>
<a class="nav-link" href="{{route('user.index')}}">Manage Users</a>
<a class="nav-link" href="{{route('super.rekmed')}}">Rekam Medis</a>
@endsection

@section('content')
<form class="mb-3" action="{{ route('super.log') }}" method="get">
    <div class="row">
        <div class="col-3">
            <label for="">User</label>
        </div>
        <div class="col-2">
            <label for="">Dari</label>
        </div>
        <div class="col-2">
            <label for="">Sampai</label>
        </div>
        <div class="col">
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <input value="{{Request::get('user')}}" type="text" name="user" class="form-control d">
        </div>
        <div class="col-2">
            <input value="{{Request::get('d_from')}}" type="date" name="d_from" class="form-control d">
        </div>
        <div class="col-2">
            <input value="{{Request::get('d_to')}}" type="date" name="d_to" class="form-control d">
        </div>
        <div class="col-3">
            <div class="row">
                    <button class="btn btn-primary btn-md" type="submit">Filter</button>
                    @if (Request::get('user'))
                    <a href="{{ route('super.log') }}" class="btn btn-danger btn-md ml-2">Clear</a>
                    @endif
            </div>
        </div>

    </div>
</form>
<table class="table table-bordered">
    <tr>
        <th>Tanggal</th>
        <th>User</th>
        <th>Note</th>
        <th>Rekam Medis ID</th>
        <th>Kategori</th>
        <th></th>
    </tr>
    @foreach ($logs as $log)
    <tr>
        <td>{{$log->created_at}}</td>
        <td>{{$log->log_user}}</td>
        <td>{{$log->log_do}}</td>
        <td>{{$log->rek_id}}</td>
        <td>{{strtoupper($log->ctg)}}</td>
        <th>
            @if ($log->id_ctg)
            <a href="{{route("super.log.detail.$log->ctg", [
                                'rek_id'=>$log->rek_id,
                                'id'=>$log->id_ctg
                            ])}}" class="btn btn-primary btn-sm">View</a>
        </th>
        @else
        <a href="" class="btn btn-sm btn-danger">Deleted</a>
        @endif
    </tr>
    @endforeach
</table>
<div class="row ">
    <div class="col d-flex justify-content-center">
        {{$logs->appends(Request::all())->links()}}
    </div>
</div>
@endsection