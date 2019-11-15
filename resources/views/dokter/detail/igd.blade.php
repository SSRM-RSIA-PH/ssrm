@extends('layouts.main')
@section('title') Dokter @endsection
@section('menu')
<a href="{{route('dokter.index')}}" class="nav-item nav-link">Dashboard</a>
<a href="{{route('dokter.detail.igd', [
    'rek_id'=>$rek_id,
    'id'=>$igd->igd_id,
    'ctg'=>'c'
])}}" class="nav-link {{$ctg == 'c' ? 'active' : ''}}">Catatan Perkembangan</a>

<a href="{{route('dokter.detail.igd', [
    'rek_id'=>$rek_id,
    'id'=>$igd->igd_id,
    'ctg'=>'r'
])}}" class="nav-link {{$ctg == 'r' ? 'active' : ''}}">Resume</a>

<a href="{{route('dokter.detail.igd', [
    'rek_id'=>$rek_id,
    'id'=>$igd->igd_id,
    'ctg'=>'p'
])}}" class="nav-link {{$ctg == 'p' ? 'active' : ''}}">Penunjang</a>
@endsection

@section('content')
<div class="col">
    <div class="card mb-3">
        @switch($ctg)
        @case('c')
        <div class="card-header">
            IGD - Catatan Perkembangan
        </div>
        <div class="card-body">
            @if ($igd->igd_ctt_perkembangan)
            <b>{{$igd->igd_datetime}}</b>
            <object data="{{asset("storage/$igd->igd_ctt_perkembangan")}}" type="application/pdf" width="100%"
                height="700px"></object>
            <br><br>
            @endif
        </div>
        @break

        @case('r')
        <div class="card-header">
            IGD - Resume
        </div>
        <div class="card-body">
            @if ($igd->igd_resume)
            <hr>
            <b>Resume</b><br>
            <object data="{{asset("storage/$igd->igd_resume")}}" type="application/pdf" width="100%"
                height="700px"></object>
            <br><br>
            @endif
        </div>
        @break

        @case('p')
        <div class="card-header">
            IGD - Penunjang
        </div>
        <div class="card-body">
            @if ($igd->penunjang() != '[]')
            <hr>
            <b>Penunjang</b><br>
            @foreach ($igd->penunjang() as $p)
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