@extends('layouts.main')

@section('content')
@if (session('status'))
<div class="alert alert-success">
    {{session('status')}}
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