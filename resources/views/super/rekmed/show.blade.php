@extends('layouts.super')
@section('title','Detail')
@section('menu')
<a href="{{route('super.index')}}" class="nav-item nav-link">Dashboard</a>
<a href="{{route('super.rekmed')}}" class="nav-link">Rekam Medis</a>
<a href="{{route('super.rekmed.show', ['rek_id'=>$rek_id])}}" class="nav-link active">{{$rek_id}}</a>
<a class="nav-link" href="{{route('super.rekmed.show.igd', ['rek_id'=>$rek_id])}}">IGD</a>
<a class="nav-link" href="{{route('super.rekmed.show.nicu', ['rek_id'=>$rek_id])}}">NICU</a>
<a class="nav-link" href="{{route('super.rekmed.show.poli', ['rek_id'=>$rek_id])}}">POLI</a>
<a class="nav-link" href="{{route('super.rekmed.show.ri', ['rek_id'=>$rek_id])}}">RAWAT INAP</a>
@endsection
@section('content')

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    Profile Pasien
                </div>
                <div class="card-body">
                    <div class="alert alert-success w-100">
                        <table class="w-100">
                            <tr>
                                <th>No Rekam Medis</th>
                                <td>{{$rekmed->rek_id}}</td>
                            </tr>
                            <tr>
                                <th>Nama Pasien</th>
                                <td>{{$rekmed->rek_name}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection