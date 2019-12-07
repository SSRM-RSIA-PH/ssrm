@extends('layouts.super')
@section('title')
List Rekmed
@endsection
@section('menu')
<a href="{{route('super.index')}}" class="nav-item nav-link">Dashboard</a>
<a class="nav-link" href="{{route('super.log')}}">Log Upload</a>
<a class="nav-link" href="{{route('user.index')}}">Manage Users</a>
<a class="nav-link active" href="{{route('super.rekmed')}}">Rekam Medis</a>
@endsection

@section('content')
@if(session('status'))
<div class="alert alert-success">
    {{session('status')}}
</div>
@endif

<form action="{{route('super.rekmed')}}">
    <div class="input-group mb-3">
        <input class="form-control col-md-7" type="text" name="search" placeholder="Search"
            value="{{Request::get('search')}}">
        <div class="input-group-append">
            <input type="submit" value="Search" class="btn btn-primary">
        </div>
    </div>
</form>

<table class="table table-bordered">
    <thead>
        <th>ID</th>
        <th>Nama Pasien</th>
        <th>Tanggal Upload</th>
        <th>User</th>
        <th width="245px"></th>
    </thead>
    <tbody>
        @foreach ($rekmed as $r)
        <tr>
            <td>{{$r->rek_id}}</td>
            <td>{{$r->rek_name}}</td>
            <td>{{$r->updated_at}}</td>
            <td>{{$r->user()->name}}</td>
            <td>
                <a href="{{route('super.rekmed.show', ['rek_id'=>$r->rek_id])}}" class="btn btn-sm btn-info">Detail</a>
                <a href="{{route('archive', ['rek_id'=>$r->rek_id])}}" class="btn btn-sm btn-success">Arsip</a>
                <a href="{{route('super.rekmed.edit', ['rek_id'=>$r->rek_id])}}" class="btn btn-sm btn-primary">Edit</a>
                <form onsubmit="return confirm('Delete {{$r->rek_id}} permanently ?')" class="d-inline"
                    action="{{route('super.rekmed.destroy', ['rek_id'=>$r->rek_id])}}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" value="Delete" class="btn btn-sm btn-danger">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection