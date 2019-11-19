@extends('layouts.main')
@section('title') Detail @endsection
@section('menu')
<a href="{{route('super.index')}}" class="nav-item nav-link">Dashboard</a>
@endsection
@section('content')
<div class="col">
    <div class="card mb-3">
        <div class="card-header">
            NICU
        </div>
        <div class="card-body">
            @if ($nicu->nicu_ctt_integ)
            <hr>
            <b>Catatan Perkembangan Terintegrasi</b><br>
            <object data="{{asset("storage/$nicu->nicu_ctt_integ")}}" type="application/pdf" width="100%"
                height="700px"></object>
            <br><br>
            @endif

            @if ($nicu->nicu_resume)
            <hr>
            <b>Resume</b><br>
            <object data="{{asset("storage/$nicu->nicu_resume")}}" type="application/pdf" width="100%"
                height="700px"></object>
            <br><br>
            @endif

            @if ($nicu->nicu_pengkajian)
            <hr>
            <b>Pengkajian Awal</b><br>
            <object data="{{asset("storage/$nicu->nicu_pengkajian")}}" type="application/pdf" width="100%"
                height="700px"></object>
            <br><br>
            @endif

            @if ($nicu->nicu_grafik)
            <hr>
            <b>Grafik</b><br>
            <object data="{{asset("storage/$nicu->nicu_grafik")}}" type="application/pdf" width="100%"
                height="700px"></object>
            <br><br>
            @endif

            @if ($nicu->penunjang() != '[]')
            <hr>
            <b>Penunjang</b><br>
            @foreach ($nicu->penunjang() as $p)
            <p>{{$p->p_name}}</p>
            <object data="{{asset("storage/$p->p_file")}}" type="application/pdf" width="100%" height="700px"></object>
            @endforeach
            @endif
        </div>
    </div>
</div>
@endsection