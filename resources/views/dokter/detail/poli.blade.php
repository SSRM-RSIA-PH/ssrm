@extends('layouts.main')
@section('title') Dokter @endsection
@section('menu')
<a href="{{route('dokter.index')}}" class="nav-item nav-link">Dashboard</a>
<a href="{{route('dokter.show.poli', ['rek_id'=>$rek_id])}}" class="nav-link">Kembali</a>
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
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="ctp-tab" data-toggle="tab" href="#ctp" role="tab" aria-controls="ctp"
            aria-selected="true">Catatan Terintegrasi</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="rsm-tab" data-toggle="tab" href="#rsm" role="tab" aria-controls="rsm"
            aria-selected="false">Resume</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pnj-tab" data-toggle="tab" href="#pnj" role="tab" aria-controls="pnj"
            aria-selected="false">Penunjang</a>
    </li>
</ul>

<div class="card-body">
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="ctp" role="tabpanel" aria-labelledby="ctp-tab">
            @if ($poli->poli_ctt_integ)
            <hr>
            <object data="{{asset("storage/$poli->poli_ctt_integ")}}" type="application/pdf" width="100%"
                height="700px"></object>
            @else
            <h3>Data Tidak Tersedia</h3>
            @endif
        </div>
        <div class="tab-pane fade" id="rsm" role="tabpanel" aria-labelledby="rsm-tab">
            @if ($poli->poli_resume)
            <hr>
            <object data="{{asset("storage/$poli->poli_resume")}}" type="application/pdf" width="100%"
                height="700px"></object>
            @else
            <h3>Data Tidak Tersedia</h3>
            @endif
        </div>
        <div class="tab-pane fade" id="pnj" role="tabpanel" aria-labelledby="pnj-tab">
            @if ($poli->penunjang() != '[]')
            <hr>
            @foreach ($poli->penunjang() as $p)
            <p>{{$p->p_name}}</p>
            <object data="{{asset("storage/$p->p_file")}}" type="application/pdf" width="100%" height="700px"></object>
            @endforeach
            @else
            <h3>Data Tidak Tersedia</h3>
            @endif
        </div>
    </div>
</div>


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