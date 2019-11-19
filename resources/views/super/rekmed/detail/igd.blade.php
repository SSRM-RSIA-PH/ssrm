@extends('layouts.main')
@section('title') Detail @endsection
@section('menu')
<a href="{{route('super.index')}}" class="nav-link">Dashboard</a>
<a href="{{route('super.rekmed.show.igd', ['rek_id'=>$rek_id])}}" class="nav-link">Kembali</a>
@endsection
@section('content')
<div class="col">
    <div class="card mb-3">
        <div class="card-header">
            <a href="" aria-label="Close" class="close">
                <span aria-hidden="true">&times;</span>
            </a>
            IGD
        </div>
        <div class="card-body">
            @if ($igd->igd_ctt_perkembangan)
            <b>Catatan Perkembangan</b><br>
            <div class="embed-responsive embed-responsive-16by9">
                <object data="{{asset("storage/$igd->igd_ctt_perkembangan")}}" type="application/pdf"></object>
            </div>
            @endif

            @if ($igd->igd_resume)
            <hr>
            <b>Resume</b><br>
            <div class="embed-responsive embed-responsive-16by9">
                <object data="{{asset("storage/$igd->igd_resume")}}" type="application/pdf"></object>
            </div>
            @endif

            @if ($igd->penunjang() != '[]')
            <hr>
            <b>Penunjang</b><br>
            @foreach ($igd->penunjang() as $p)
            <p>{{$p->p_name}}</p>
            <div class="embed-responsive embed-responsive-16by9">
                <object data="{{asset("storage/$p->p_file")}}" type="application/pdf"></object>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
@endsection