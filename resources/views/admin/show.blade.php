@extends('layouts.admin')
@section('title')
Choose
@endsection
@section('content')

<div class="container">
    <p>No Rekam Medis : {{$rekmed->rek_id}}</p>
    <p>Nama Pasien : {{$rekmed->rek_id}}</p>
    <p>Waktu : {{$rekmed->created_at}}</p>
    <p>Uploader : {{$rekmed->user()->name}}</p>
    <br>
    <a href="{{route('admin.create.igd', ['rek_id'=>$rekmed->rek_id])}}" class="btn btn-primary">IGD</a>
    <a href="" class="btn btn-primary">NICU</a>
    <a href="" class="btn btn-primary">POLI</a>
    <a href="" class="btn btn-primary">RAWAT INAP</a>
</div>
@endsection