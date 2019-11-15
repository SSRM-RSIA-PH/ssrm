@extends('layouts.main')
@section('title') Show @endsection
@section('menu')
{{$rek_id = $igd->first()->rek_id}} <br>
<a class="nav-link" href="{{route('dokter.show.igd', ['rek_id'=>$rek_id])}}">IGD</a>
<a class="nav-link active" href="{{route('dokter.show.nicu', ['rek_id'=>$rek_id])}}">NICU</a>
<a class="nav-link" href="{{route('dokter.show.poli', ['rek_id'=>$rek_id])}}">POLI</a>
<a class="nav-link" href="{{route('dokter.show.ri', ['rek_id'=>$rek_id])}}">RAWAT INAP</a>
@endsection
@section('menu')
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        IGD
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="#">Catatan Perkembangan</a>
        <a class="dropdown-item" href="#">Resume</a>
        <a class="dropdown-item" href="#">Penunjang</a>
    </div>
</li>

<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        Poli
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="#">Catatan Terintegrasi</a>
        <a class="dropdown-item" href="#">Resume</a>
        <a class="dropdown-item" href="#">Penunjang</a>
    </div>
</li>

<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        Rawat Inap
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="#">Catatan Perkembangan Terintegrasi</a>
        <a class="dropdown-item" href="#">Catatan Operasi/Tindakan</a>
        <a class="dropdown-item" href="#">Bayi</a>
        <a class="dropdown-item" href="#">Resume Inap</a>
        <a class="dropdown-item" href="#">Penunjang</a>
    </div>
</li>

<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        NICU
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="#">Catatan Perkembangan Terintegrasi</a>
        <a class="dropdown-item" href="#">Pengkajian Awal</a>
        <a class="dropdown-item" href="#">Grafik Perkembangan</a>
        <a class="dropdown-item" href="#">Resume</a>
        <a class="dropdown-item" href="#">Penunjang</a>
    </div>
</li>
@endsection
@section('content')
<div class="container">
    {{$rek_id = $nicu->first()->rek_id}} <br>
    <a class="btn btn-primary" href="{{route('dokter.show.igd', ['rek_id'=>$rek_id])}}">IGD</a>
    <a class="btn btn-primary" href="{{route('dokter.show.nicu', ['rek_id'=>$rek_id])}}">NICU</a>
    <a class="btn btn-primary" href="{{route('dokter.show.poli', ['rek_id'=>$rek_id])}}">POLI</a>
    <a class="btn btn-primary" href="{{route('dokter.show.ri', ['rek_id'=>$rek_id])}}">RAWAT INAP</a>
    <br><br>
    <table class="table table-bordered">
        <thead>
            <th>Tanggal Rekam Medis</th>
            <th>Kategori</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($nicu as $n)
            <tr>
                <td>{{$n->nicu_datetime}}</td>
                <td>NICU</td>
                <td>
                    <a href="{{route('dokter.detail.nicu', [
                            'rek_id'=>$n->rek_id,
                            'id'=>$n->nicu_id
                        ])}}" class="btn btn-primary">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$nicu->links()}}
</div>
@endsection