@extends('layouts.main')

@section('title')
List Rekmed
@endsection
@section('menu')
<a href="{{route('super.index')}}" class="nav-item nav-link">Dashboard</a>
<a class="nav-link" href="{{-- {{route('logupload')}} --}}">Log Upload</a>
<a class="nav-link" href="{{route('user.index')}}">Manage Users</a>
<a class="nav-link active" href="{{route('super.rekmed')}}">Manage Rekmed</a>
@endsection

@section('content')
@if(session('status'))
<div class="alert alert-success">
    {{session('status')}}
</div>
@endif

<table class="table table-bordered">
    <thead>
        <th>ID</th>
        <th>Nama Pasien</th>
        <th>Tanggal Upload</th>
        <th>User</th>
        <th width="250px"></th>
    </thead>
    <tbody>
        @foreach ($rekmed as $r)
        <tr>
            <td>{{$r->rek_id}}</td>
            <td>{{$r->rek_name}}</td>
            <td>{{$r->updated_at}}</td>
            <td>{{$r->user()->name}}</td>
            <td>
                <a href="{{route('super.rekmed.show', ['rek_id'=>$r->rek_id])}}" class="btn btn-info">Detail</a>
                <a href="{{route('super.rekmed.edit', ['rek_id'=>$r->rek_id])}}" class="btn btn-primary">Edit</a>
                <form onsubmit="return confirm('Delete user {{$r->rek_id}} permanently ?')" class="d-inline"
                    action="{{route('super.rekmed.destroy', ['rek_id'=>$r->rek_id])}}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" value="Delete" class="btn btn-danger">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection