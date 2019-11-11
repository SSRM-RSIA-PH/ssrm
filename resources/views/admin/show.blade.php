@extends('layouts.admin')
@section('title','Detail')
@section('menu')
<a href="{{route('admin.show.rek', ['rek_id'=>$rekmed->rek_id])}}" class="nav-item nav-link">{{$rekmed->rek_id}}</a>
<a href="{{route('admin.create.igd', ['rek_id'=>$rekmed->rek_id])}}" class="nav-item nav-link">IGD</a>
<a href="{{route('admin.create.poli', ['rek_id'=>$rekmed->rek_id])}}" class="nav-item nav-link">POLI</a>
<a href="" class="nav-item nav-link">NICU</a>
<a href="" class="nav-item nav-link">RAWAT INAP</a>
@endsection
@section('content')

<div class="container">
    <p>No Rekam Medis : {{$rekmed->rek_id}}</p>
    <p>Nama Pasien : {{$rekmed->rek_id}}</p>
    <p>Waktu : {{$rekmed->created_at}}</p>
    <p>Uploader : {{$rekmed->user()->name}}</p>
    <br>
</div>
@endsection