@extends('layouts.main')
@section('title') Dokter @endsection
@section('menu')
<a href="{{route('dokter.index')}}" class="nav-item nav-link">Dashboard</a>
<a href="{{route('dokter.show.nicu', ['rek_id'=>$rek_id])}}" class="nav-link">Kembali</a>
@endsection
@section('pasien')
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#pasienProfile">
    {{$rekmed->rek_name}} ({{$rekmed->rek_id}})
</button>
@endsection
@section('content')

<ul class="nav nav-tabs font-weight-bold" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="cpt-tab" data-toggle="tab" href="#cpt" role="tab" aria-controls="cpt"
            aria-selected="true">Catatan Perkembangan Terintegrasi</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="rsm-tab" data-toggle="tab" href="#rsm" role="tab" aria-controls="rsm"
            aria-selected="false">Resume</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pka-tab" data-toggle="tab" href="#pka" role="tab" aria-controls="pka"
            aria-selected="false">Pengkajian Awal</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="gfp-tab" data-toggle="tab" href="#gfp" role="tab" aria-controls="gfp"
            aria-selected="false">Grafik Perkembangan</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pnj-tab" data-toggle="tab" href="#pnj" role="tab" aria-controls="pnj"
            aria-selected="false">Penunjang</a>
    </li>
</ul>
<div class="card-body">
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="cpt" role="tabpanel" aria-labelledby="cpt-tab">
            @if ($nicu->nicu_ctt_integ)
            <object data="{{asset("storage/$nicu->nicu_ctt_integ")}}" type="application/pdf" width="100%"
                height="700px"></object>
            @else
            <h3>Data Tidak Tersedia</h3>
            @endif
        </div>
        <div class="tab-pane fade" id="rsm" role="tabpanel" aria-labelledby="rsm-tab">
            @if ($nicu->nicu_resume)
            <object data="{{asset("storage/$nicu->nicu_resume")}}" type="application/pdf" width="100%"
                height="700px"></object>
            @else
            <h3>Data Tidak Tersedia</h3>
            @endif
        </div>
        <div class="tab-pane fade" id="pka" role="tabpanel" aria-labelledby="pka-tab">
            @if ($nicu->nicu_pengkajian)
            <object data="{{asset("storage/$nicu->nicu_pengkajian")}}" type="application/pdf" width="100%"
                height="700px"></object>
            @else
            <h3>Data Tidak Tersedia</h3>
            @endif
        </div>
        <div class="tab-pane fade" id="gfp" role="tabpanel" aria-labelledby="gfp-tab">
            @if ($nicu->nicu_grafik)
            <object data="{{asset("storage/$nicu->nicu_grafik")}}" type="application/pdf" width="100%"
                height="700px"></object>
            @else
            <h3>Data Tidak Tersedia</h3>
            @endif
        </div>
        <div class="tab-pane fade" id="pnj" role="tabpanel" aria-labelledby="pnj-tab">
            @if ($nicu->penunjang() != '[]')
                @foreach ($nicu->penunjang() as $p)
                <hr>
                <h3 class="text-center">{{strtoupper($p->p_name)}}</h3>
                    <object data="{{asset("storage/$p->p_file")}}" type="application/pdf" width="100%" height="700px"></object>
                @endforeach
            @else
                <h3>Data Tidak Tersedia</h3>
            @endif
        </div>
    </div>
</div>
@endsection