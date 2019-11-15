@extends('layouts.main')

@section('title')
List Rekmed
@endsection
@section('menu')
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
        <th>Rekmed ID</th>
        <th>Nama</th>
        <th>Tanggal</th>
        <th>User</th>
        <th width="100px">Action</th>
    </thead>
    <tbody>
        @foreach ($rekmed as $r)
        <tr>
            <td>{{$r->rek_id}}</td>
            <td>{{$r->rek_name}}</td>
            <td>{{$r->created_at}}</td>
            <td>{{$r->user()->name}}</td>
            <td>
                <form action="{{route('super.rekmed.show', ['id'=>$r->rek_id])}}" method="POST">
                    @csrf
                    <input type="submit" class="btn btn-primary" value="View Detail">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection