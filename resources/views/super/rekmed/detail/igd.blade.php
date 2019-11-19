@extends('layouts.main')
@section('title') Detail @endsection
@section('menu')
<a href="{{route('super.rekmed.show.igd', ['rek_id'=>$rek_id])}}">Kembali</a>
@endsection
@section('content')

<div class="col">
    <div class="alert alert-success w-100">
    </div>
    <div class="card mb-3">
        <div class="card-header">
            IGD
        </div>
        <div class="card-body">
            @if ($igd->igd_ctt_perkembangan)
            <hr>
            <b>Catatan Perkembangan</b><br>
            <object data="{{asset("storage/$igd->igd_ctt_perkembangan")}}" type="application/pdf" width="100%"
                height="700px"></object>
            <br><br>
            @endif

            @if ($igd->igd_resume)
            <hr>
            <b>Resume</b><br>
            <object data="{{asset("storage/$igd->igd_resume")}}" type="application/pdf" width="100%"
                height="700px"></object>
            <br><br>
            @endif

            @if ($igd->penunjang() != '[]')
            <hr>
            <b>Penunjang</b><br>
            @foreach ($igd->penunjang() as $p)
            <p>{{$p->p_name}}</p>
            <object data="{{asset("storage/$p->p_file")}}" type="application/pdf" width="100%" height="700px"></object>
            @endforeach
            @endif
        </div>
    </div>
</div>
@endsection