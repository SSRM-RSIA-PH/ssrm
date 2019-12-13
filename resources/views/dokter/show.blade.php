@extends('layouts.main')
@section('menu')
<a href="{{route('dokter.index')}}" class="nav-link">Cari Pasien</a>
<a class="nav-link active" href="{{route('dokter.show', ['rek_id'=>$rekmed->rek_id])}}">{{$rekmed->rek_id}}</a>
<a class="nav-link" href="{{route('dokter.show.igd', ['rek_id'=>$rekmed->rek_id])}}">IGD</a>
<a class="nav-link" href="{{route('dokter.show.nicu', ['rek_id'=>$rekmed->rek_id])}}">NICU</a>
<a class="nav-link" href="{{route('dokter.show.poli', ['rek_id'=>$rekmed->rek_id])}}">POLI</a>
<a class="nav-link" href="{{route('dokter.show.ri', ['rek_id'=>$rekmed->rek_id])}}">RAWAT INAP</a>
<a class="nav-link" href="{{route('dokter.show.arsip', ['rek_id'=>$rekmed->rek_id])}}">ARSIP</a>

@endsection
@section('pasien')
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#pasienProfile">
    {{$rekmed->rek_name}} ({{$rekmed->rek_id}})
</button>
@endsection
@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-10">
            <div class="card mb-3">
                <div class="card-header">
                    Profile Pasien
                </div>
                <div class="card-body">
                        <div>
                                <table class="table table-hover">
                                    <div class="card text-white bg-info mb-3 shadow">
                                        <div class="card-header">Pasien</div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    No Rekam Medis
                                                </div>
                                                <div class="col-sm-8">
                                                    <h5 class="card-title">{{$rekmed->rek_id}}</h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    Nama Pasien
                                                </div>
                                                <div class="col-sm-8">
                                                    <h5 class="card-title">{{$rekmed->rek_name}}</h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    NIK
                                                </div>
                                                <div class="col-sm-8">
                                                    <h5 class="card-title">{{$rekmed->rek_nik}}</h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    Tempat Tanggal Lahir
                                                </div>
                                                <div class="col-sm-8">
                                                    <h5 class="card-title">{{$rekmed->rek_tempat_lahir}},
                                                        {{$rekmed->rek_tanggal_lahir}}</h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    Golongan Darah
                                                </div>
                                                <div class="col-sm-8">
                                                    <h5 class="card-title">{{$rekmed->rek_darah}}</h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    Agama
                                                </div>
                                                <div class="col-sm-8">
                                                    <h5 class="card-title">{{$rekmed->rek_agama}}</h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    Pekerjaan
                                                </div>
                                                <div class="col-sm-8">
                                                    <h5 class="card-title">{{$rekmed->rek_job}}</h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    No Telepon
                                                </div>
                                                <div class="col-sm-8">
                                                    <h5 class="card-title">{{$rekmed->rek_hp}}</h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    Alamat
                                                </div>
                                                <div class="col-sm-8">
                                                    <h5 class="card-title">{{$rekmed->rek_alamat}}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
        
                                    @switch($rekmed->rek_status)
                                    @case('ibu')
                                    {{-- suami --}}
                                    <div class="card text-white bg-success mb-3 shadow">
                                        <div class="card-header">Suami</div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    Nama Suami
                                                </div>
                                                <div class="col-sm-8">
                                                    <h5 class="card-title">{{$rekmed->s_name}}</h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    Pekerjaan
                                                </div>
                                                <div class="col-sm-8">
                                                    <h5 class="card-title">{{$rekmed->s_job}}</h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    Golongan Darah
                                                </div>
                                                <div class="col-sm-8">
                                                    <h5 class="card-title">{{$rekmed->s_darah}}</h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    No Telepon
                                                </div>
                                                <div class="col-sm-8">
                                                    <h5 class="card-title">{{$rekmed->s_hp}}</h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    Alamat
                                                </div>
                                                <div class="col-sm-8">
                                                    <h5 class="card-title">{{$rekmed->s_alamat}}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
        
                                    {{-- anak --}}
                                    @foreach ($rekmed->anak() as $anak)
                                    <div class="card text-white bg-info mb-3 shadow">
                                        <div class="card-header">Anak</div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    Nama Anak
                                                </div>
                                                <div class="col-sm-8">
                                                    <h5 class="card-title">{{$anak->ra_name}}</h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    Anak Ke
                                                </div>
                                                <div class="col-sm-8">
                                                    <h5 class="card-title">{{$anak->ra_anak_ke}}</h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    Tempat Danggal Lahir
                                                </div>
                                                <div class="col-sm-8">
                                                    <h5 class="card-title">{{$anak->ra_tempat_lahir}},
                                                        {{$anak->ra_tanggal_lahir}}</h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    Golongan Darah
                                                </div>
                                                <div class="col-sm-8">
                                                    <h5 class="card-title">{{$anak->ra_darah}}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
        
                                    @break
        
                                    @case('anak')
                                    <div class="card text-white bg-success mb-3 shadow">
                                        <div class="card-header">Orang Tua</div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    Nama Ibu
                                                </div>
                                                <div class="col-sm-8">
                                                    <h5 class="card-title">{{$rekmed->p_ibu}}</h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    No Hp Ibu
                                                </div>
                                                <div class="col-sm-8">
                                                    <h5 class="card-title">{{$rekmed->p_ibu_hp}}</h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    Nama Ayah
                                                </div>
                                                <div class="col-sm-8">
                                                    <h5 class="card-title">{{$rekmed->p_bpk}}</h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    No Hp Ayah
                                                </div>
                                                <div class="col-sm-8">
                                                    <h5 class="card-title">{{$rekmed->p_bpk_hp}}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @break
        
                                    @default
        
                                    @endswitch
                                </table>
                            </div>
                    <a href="{{route('archive', ['rek_id'=>$rekmed->rek_id])}}" class="btn btn-primary">Simpan Arsip</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection