@extends('layouts.main')
@section('title') Dokter @endsection
@section('menu')
<a href="{{route('dokter.index')}}" class="nav-item nav-link">Dashboard</a>
<a href="{{route('dokter.detail.poli', [
    'rek_id'=>$rek_id,
    'id'=>$poli->poli_id,
    'ctg'=>'c'
])}}" class="nav-link {{$ctg == 'c' ? 'active' : ''}}">Catatan Perkembangan</a>

<a href="{{route('dokter.detail.poli', [
    'rek_id'=>$rek_id,
    'id'=>$poli->poli_id,
    'ctg'=>'r'
])}}" class="nav-link {{$ctg == 'r' ? 'active' : ''}}">Resume</a>

<a href="{{route('dokter.detail.poli', [
    'rek_id'=>$rek_id,
    'id'=>$poli->poli_id,
    'ctg'=>'p'
])}}" class="nav-link {{$ctg == 'p' ? 'active' : ''}}">Penunjang</a>
@endsection

@section('content')

<div class="col">
    <div class="card mb-3">
        @switch($ctg)
        @case('c')
        <div class="card-header">
            POLI - Catatan Perkembangan
        </div>
        <div class="card-body">
            @if ($poli->poli_ctt_integ)
            <hr>
            <object data="{{asset("storage/$poli->poli_ctt_integ")}}" type="application/pdf" width="100%"
                height="700px"></object>
            <br><br>
            @endif
        </div>
        @break

        @case('r')
        <div class="card-header">
            POLI - Resume
        </div>
        <div class="card-body">
            @if ($poli->poli_resume)
            <hr>
            <object data="{{asset("storage/$poli->poli_resume")}}" type="application/pdf" width="100%"
                height="700px"></object>
            <br><br>
            @endif
        </div>
        @break

        @case('p')
        <div class="card-header">
            POLI - Penunjang
        </div>
        <div class="card-body">
            @if ($poli->penunjang() != '[]')
            <hr>
            @foreach ($poli->penunjang() as $p)
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