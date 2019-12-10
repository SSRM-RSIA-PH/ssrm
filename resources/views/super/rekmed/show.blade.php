@extends('layouts.super')
@section('title','Detail')
@section('menu')
<a href="{{route('super.index')}}" class="nav-item nav-link">Home</a>
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
        <div class="col-10">
            <div class="card mb-3">
                <div class="card-header">
                    Profile Pasien
                </div>
                <div class="card-body">
                    <div>
                        <table class="table table-hover table-info">
                            <tr>
                                <th>No Rekam Medis</th>
                                <td>{{$rekmed->rek_id}}</td>
                            </tr>
                            <tr>
                                <th>Nama Pasien</th>
                                <td>{{$rekmed->rek_name}}</td>
                            </tr>
                            <tr>
                                <th>NIK</th>
                                <td>{{$rekmed->rek_nik}}</td>
                            </tr>
                            <tr>
                                <th>Tempat Lahir</th>
                                <td>{{$rekmed->rek_tempat_lahir}}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td>{{$rekmed->rek_tanggal_lahir}}</td>
                            </tr>
                            <tr>
                                <th>Golongan Darah</th>
                                <td>{{$rekmed->rek_darah}}</td>
                            </tr>
                            <tr>
                                <th>Agama</th>
                                <td>{{$rekmed->rek_agama}}</td>
                            </tr>
                            <tr>
                                <th>Pekerjaan</th>
                                <td>{{$rekmed->rek_job}}</td>
                            </tr>
                            <tr>
                                <th>No Telp</th>
                                <td>{{$rekmed->rek_hp}}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>{{$rekmed->rek_alamat}}</td>
                            </tr>
                            <tr>
                                <th>--------------------</th>
                                <td>--------------------</td>
                            </tr>


                            @switch($rekmed->rek_status)
                                @case('ibu')
                                    {{-- suami --}}
                                    <tr>
                                        <th>Nama Suami</th>
                                        <td>{{$rekmed->s_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Pekerjaan</th>
                                        <td>{{$rekmed->s_job}}</td>
                                    </tr>
                                    <tr>
                                        <th>Golongan Darah</th>
                                        <td>{{$rekmed->s_darah}}</td>
                                    </tr>
                                    <tr>
                                        <th>No Telp</th>
                                        <td>{{$rekmed->s_hp}}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>{{$rekmed->s_alamat}}</td>
                                    </tr>
                                    <tr>
                                        <th>--------------------</th>
                                        <td>--------------------</td>
                                    </tr>

                                    {{-- anak --}}
                                    @foreach ($rekmed->anak() as $anak)
                                    <tr>
                                        <th>Nama Anak</th>
                                        <td>{{$anak->ra_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Anak Ke</th>
                                        <td>{{$anak->ra_anak_ke}}</td>
                                    </tr>
                                    <tr>
                                        <th>Tempat Lahir</th>
                                        <td>{{$anak->ra_tempat_lahir}}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Lahir</th>
                                        <td>{{$anak->ra_tanggal_lahir}}</td>
                                    </tr>
                                    <tr>
                                        <th>Golongan Darah</th>
                                        <td>{{$anak->ra_darah}}</td>
                                    </tr>
                                    <tr>
                                        <th>--------------------</th>
                                        <td>--------------------</td>
                                    </tr>
                                    @endforeach

                                    @break

                                @case('anak')
                                    <tr>
                                        <th>Nama Ibu</th>
                                        <td>{{$rekmed->p_ibu}}</td>
                                    </tr>
                                    <tr>
                                        <th>No Telp Ibu</th>
                                        <td>{{$rekmed->p_ibu_hp}}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Ayah</th>
                                        <td>{{$rekmed->p_bpk}}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Telp Ayah</th>
                                        <td>{{$rekmed->p_bpk_hp}}</td>
                                    </tr>

                                    @break

                                @default

                            @endswitch
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection