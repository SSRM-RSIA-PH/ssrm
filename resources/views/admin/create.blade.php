@extends('layouts.admin')
@section('title')
Add ID Rekam Medis
@endsection
@section('content')
<div class="container">
    <form action="{{route('admin.store.rek')}}" method="POST">
        @csrf
        <label for="">Rekam Medis ID</label><br>
        <input name="rek_id" type="text" value="{{$id}}">
        <br><br>

        <label for="">Nama Pasien</label><br>
        <input name="rek_name" type="text">
        <br><br>

        @if (Auth::user())
        <input name="u_id" type="text" hidden value="{{Auth::user()->id}}">
        @endif

        <input type="submit" value="Tambah">
    </form>
</div>
@endsection