@extends('layouts.main')
@section('title')
Edit
@endsection
@section('menu')
<a href="{{route('super.index')}}" class="nav-item nav-link">Dashboard</a>
<a class="nav-link" href="{{-- {{route('logupload')}} --}}">Log Upload</a>
<a class="nav-link" href="{{route('user.index')}}">Manage Users</a>
<a class="nav-link active" href="{{route('super.rekmed')}}">Manage Rekmed</a>
@endsection
@section('content')
@if (session('status'))
<div class="alert alert-success">
    {{session('status')}} <br>
    <a href="{{route('super.rekmed')}}" class="btn btn-primary">Back</a>
</div>
@endif

<form action="{{route('super.rekmed.update', ['rek_id'=>$rekmed->rek_id])}}" method="POST">
    @csrf
    <input type="hidden" value="PUT" name="_method">
    <input type="hidden" name="u_id" value="{{Auth::user()->id}}">
    {{-- <input type="hidden" name="id" value="{{$rekmed->rek_id}}"> --}}

    <label for="">ID :</label><br>
    <input class="form-control" type="text" name="rek_id" value="{{$rekmed->rek_id}}">
    <br>
    <label for="">Nama Pasien :</label><br>
    <input class="form-control" type="text" name="rek_name" value="{{$rekmed->rek_name}}">
    <br>
    <input type="submit" value="Simpan" class="btn btn-primary">
</form>
@endsection