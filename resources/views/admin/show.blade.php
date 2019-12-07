@extends('layouts.main')
@section('title','Detail')
@section('menu')
<a href="{{route('admin.index')}}" class="nav-item nav-link">Cari Pasien</a>
<a href="{{route('admin.show.rek', ['rek_id'=>$rekmed->rek_id])}}"
    class="nav-item nav-link active">{{$rekmed->rek_id}}</a>
<a href="{{route('admin.create.igd', ['rek_id'=>$rekmed->rek_id])}}" class="nav-item nav-link">IGD</a>
<a href="{{route('admin.create.poli', ['rek_id'=>$rekmed->rek_id])}}" class="nav-item nav-link">POLI</a>
<a href="{{route('admin.create.nicu', ['rek_id'=>$rekmed->rek_id])}}" class="nav-item nav-link">NICU</a>
<a href="{{route('admin.create.ri', ['rek_id'=>$rekmed->rek_id])}}" class="nav-item nav-link">RAWAT INAP</a>
<a href="{{route('admin.create.arsip', ['rek_id'=>$rekmed->rek_id])}}" class="nav-item nav-link">ARSIP</a>
@endsection
@section('content')

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-10">
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
                                        <td>{{$rekmed->suami()->rs_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Pekerjaan</th>
                                        <td>{{$rekmed->suami()->rs_job}}</td>
                                    </tr>
                                    <tr>
                                        <th>Golongan Darah</th>
                                        <td>{{$rekmed->suami()->rs_darah}}</td>
                                    </tr>
                                    <tr>
                                        <th>No Telp</th>
                                        <td>{{$rekmed->suami()->rs_hp}}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>{{$rekmed->suami()->rs_alamat}}</td>
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
                                        <td>{{$rekmed->parent()->rp_ibu_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>No Telp Ibu</th>
                                        <td>{{$rekmed->parent()->rp_ibu_hp}}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Ayah</th>
                                        <td>{{$rekmed->parent()->rp_ayah_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Telp Ayah</th>
                                        <td>{{$rekmed->parent()->rp_ayah_hp}}</td>
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