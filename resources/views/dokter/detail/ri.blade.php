@extends('layouts.main')
@section('title') Dokter @endsection
@section('menu')
<a href="{{route('dokter.detail.ri', [
    'rek_id'=>$rek_id,
    'id'=>$ri->ri_id,
    'ctg'=>'c'
])}}" class="nav-link {{$ctg == 'c' ? 'active' : ''}}">Catatan Perkembangan</a>

<a href="{{route('dokter.detail.ri', [
    'rek_id'=>$rek_id,
    'id'=>$ri->ri_id,
    'ctg'=>'r'
])}}" class="nav-link {{$ctg == 'r' ? 'active' : ''}}">Resume</a>

<a href="{{route('dokter.detail.ri', [
    'rek_id'=>$rek_id,
    'id'=>$ri->ri_id,
    'ctg'=>'t'
])}}" class="nav-link {{$ctg == 't' ? 'active' : ''}}">Tindakan</a>

<a href="{{route('dokter.detail.ri', [
    'rek_id'=>$rek_id,
    'id'=>$ri->ri_id,
    'ctg'=>'b'
])}}" class="nav-link {{$ctg == 'b' ? 'active' : ''}}">Bayi</a>

<a href="{{route('dokter.detail.ri', [
    'rek_id'=>$rek_id,
    'id'=>$ri->ri_id,
    'ctg'=>'p'
])}}" class="nav-link {{$ctg == 'p' ? 'active' : ''}}">Penunjang</a>
@endsection
@section('content')

<div class="col">
    <div class="card mb-3">
        @switch($ctg)
        @case('c')
        <div class="card-header">
            Rawat Inap - Catatan Perkembangan Terintegrasi
        </div>
        <div class="card-body">
            @if ($ri->ri_ctt_integ)
            <hr>
            <b>Catatan Perkembangan Terintegrasi</b><br>
            <object data="{{asset("storage/$ri->ri_ctt_integ")}}" type="application/pdf" width="100%"
                height="700px"></object>
            <br><br>
            @endif
        </div>
        @break
        @case('r')
        <div class="card-header">
            Rawat Inap - Resume
        </div>
        <div class="card-body">
            @if ($ri->ri_resume)
            <hr>
            <b>Resume</b><br>
            <object data="{{asset("storage/$ri->ri_resume")}}" type="application/pdf" width="100%"
                height="700px"></object>
            <br><br>
            @endif
        </div>
        @break
        @case('t')
        <div class="card-header">
            Rawat Inap - Catatan Tindakan/Operasi
        </div>
        <div class="card-body">
            @if ($ri->ri_ctt_oper)
            <hr>
            <b>Catatan Tindakan/Operasi</b><br>
            <object data="{{asset("storage/$ri->ri_ctt_oper")}}" type="application/pdf" width="100%"
                height="700px"></object>
            <br><br>
            @endif
        </div>
        @break
        @case('b')
        <div class="card-header">
            Rawat Inap - Bayi
        </div>
        <div class="card-body">
            @if ($ri->ri_bayi)
            <hr>
            <b>Bayi</b><br>
            <object data="{{asset("storage/$ri->ri_bayi")}}" type="application/pdf" width="100%"
                height="700px"></object>
            <br><br>
            @endif
        </div>
        @break
        @case('p')
        <div class="card-header">
            Rawat Inap - Penunjang
        </div>
        <div class="card-body">
            @if ($ri->penunjang() != '[]')
            <hr>
            <b>Penunjang</b><br>
            @foreach ($ri->penunjang() as $p)
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