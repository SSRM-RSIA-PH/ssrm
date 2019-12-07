@extends('layouts.main')
@section('menu')
<a href="{{route('dokter.index')}}" class="nav-link">Cari Pasien</a>
<a class="nav-link active" href="{{route('dokter.show', ['rek_id'=>$rekmed->rek_id])}}">{{$rekmed->rek_id}}</a>
<a class="nav-link" href="{{route('dokter.show.igd', ['rek_id'=>$rekmed->rek_id])}}">IGD</a>
<a class="nav-link" href="{{route('dokter.show.nicu', ['rek_id'=>$rekmed->rek_id])}}">NICU</a>
<a class="nav-link" href="{{route('dokter.show.poli', ['rek_id'=>$rekmed->rek_id])}}">POLI</a>
<a class="nav-link" href="{{route('dokter.show.ri', ['rek_id'=>$rekmed->rek_id])}}">RAWAT INAP</a>
@endsection
@section('pasien')
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#pasienProfile">
    {{$rekmed->rek_name}} ({{$rekmed->rek_id}})
</button>
@endsection
@section('content')
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
                    <a href="{{route('archive', ['rek_id'=>$rekmed->rek_id])}}" class="btn btn-sm btn-primary">Simpan Arsip</a>
            </div>
        </div>
    </div>
</div>
@endsection