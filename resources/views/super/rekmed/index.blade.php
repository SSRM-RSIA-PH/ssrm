@extends('layouts.super')

@section('title')
List Rekmed
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
        <th>Action</th>
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
                    <input type="submit" class="btn btn-primary" value="Go">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection