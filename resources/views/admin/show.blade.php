@extends('layouts.main')
@section('title','Detail')
@section('menu')
<a href="{{route('admin.index')}}" class="nav-item nav-link">Dashboard</a>
<a href="{{route('admin.show.rek', ['rek_id'=>$rekmed->rek_id])}}" class="nav-item nav-link active">{{$rekmed->rek_id}}</a>
<a href="{{route('admin.create.igd', ['rek_id'=>$rekmed->rek_id])}}" class="nav-item nav-link">IGD</a>
<a href="{{route('admin.create.poli', ['rek_id'=>$rekmed->rek_id])}}" class="nav-item nav-link">POLI</a>
<a href="{{route('admin.create.nicu', ['rek_id'=>$rekmed->rek_id])}}" class="nav-item nav-link">NICU</a>
<a href="{{route('admin.create.ri', ['rek_id'=>$rekmed->rek_id])}}" class="nav-item nav-link">RAWAT INAP</a>
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