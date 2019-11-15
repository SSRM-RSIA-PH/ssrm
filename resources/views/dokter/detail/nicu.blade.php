@extends('layouts.main')
@section('title') Dokter @endsection
@section('menu')
<a href="{{route('dokter.detail.nicu', [
    'rek_id'=>$rek_id,
    'id'=>$nicu->nicu_id,
    'ctg'=>'c'
])}}" class="nav-link {{$ctg == 'c' ? 'active' : ''}}">Catatan Perkembangan</a>

<a href="{{route('dokter.detail.nicu', [
    'rek_id'=>$rek_id,
    'id'=>$nicu->nicu_id,
    'ctg'=>'r'
])}}" class="nav-link {{$ctg == 'r' ? 'active' : ''}}">Resume</a>

<a href="{{route('dokter.detail.nicu', [
    'rek_id'=>$rek_id,
    'id'=>$nicu->nicu_id,
    'ctg'=>'pa'
])}}" class="nav-link {{$ctg == 'pa' ? 'active' : ''}}">Pengkajian</a>

<a href="{{route('dokter.detail.nicu', [
    'rek_id'=>$rek_id,
    'id'=>$nicu->nicu_id,
    'ctg'=>'g'
])}}" class="nav-link {{$ctg == 'g' ? 'active' : ''}}">Grafik</a>

<a href="{{route('dokter.detail.nicu', [
    'rek_id'=>$rek_id,
    'id'=>$nicu->nicu_id,
    'ctg'=>'p'
])}}" class="nav-link {{$ctg == 'p' ? 'active' : ''}}">Penunjang</a>
@endsection
@section('content')

<div class="col">
    <div class="alert alert-success w-100">
    </div>
    <div class="card mb-3">
        @switch($ctg)
        @case('c')
        <div class="card-header">
            NICU - Catatan Perkembangan Terintegrasi
        </div>
        <div class="card-body">
            @if ($nicu->nicu_ctt_integ)
            <hr>
            <object data="{{asset("storage/$nicu->nicu_ctt_integ")}}" type="application/pdf" width="100%"
                height="700px"></object>
            <br><br>
            @endif
        </div>
        @break
        @case('r')
        <div class="card-header">
            NICU - Resume
        </div>
        <div class="card-body">
            @if ($nicu->nicu_resume)
            <hr>
            <object data="{{asset("storage/$nicu->nicu_resume")}}" type="application/pdf" width="100%"
                height="700px"></object>
            <br><br>
            @endif
        </div>
        @break
        @case('pa')
        <div class="card-header">
            NICU - Pengkajian Awal
        </div>
        <div class="card-body">
            @if ($nicu->nicu_pengkajian)
            <hr>
            <object data="{{asset("storage/$nicu->nicu_pengkajian")}}" type="application/pdf" width="100%"
                height="700px"></object>
            <br><br>
            @endif
        </div>
        @break
        @case('g')
        <div class="card-header">
            NICU - Grafik
        </div>
        <div class="card-body">
            @if ($nicu->nicu_grafik)
            <hr>
            <object data="{{asset("storage/$nicu->nicu_grafik")}}" type="application/pdf" width="100%"
                height="700px"></object>
            <br><br>
            @endif
        </div>
        @break
        @case('p')
        <div class="card-header">
            NICU - Penunjang
        </div>
        <div class="card-body">
            @if ($nicu->penunjang() != '[]')
            <hr>
            @foreach ($nicu->penunjang() as $p)
            <p>{{$p->p_name}}</p>
            <object data="{{asset("storage/$p->p_file")}}" type="application/pdf" width="100%" height="700px"></object>
            @endforeach
            @endif
        </div>
        @break

        @default

        @endswitch
    </div>
</div>
@endsection