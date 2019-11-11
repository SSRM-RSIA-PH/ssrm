@extends('layouts.admin')
@section('title')
Choose
@endsection
@section('content')
<div class="container">
    {{$rek_id}}
    <br>
    <a href="{{route('admin.create.igd', ['rek_id'=>$rek_id])}}" class="btn btn-primary">IGD</a>
    <a href="" class="btn btn-primary">NICU</a>
    <a href="" class="btn btn-primary">POLI</a>
    <a href="" class="btn btn-primary">RAWAT INAP</a>
</div>
@endsection