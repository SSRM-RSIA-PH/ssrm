@extends('layouts.main')
@section('title') Detail @endsection
@section('menu')
<a href="{{route('super.index')}}" class="nav-link">Dashboard</a>
<a href="{{route('super.rekmed.show.igd', ['rek_id'=>$rek_id])}}" class="nav-link">Kembali</a>
@endsection
@section('content')
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="ctp-tab" data-toggle="tab" href="#ctp" role="tab" aria-controls="ctp"
            aria-selected="true">Catatan Perkembangan</a>
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
            @if ($igd->igd_ctt_perkembangan)
            <b>{{$igd->igd_datetime}}</b>
            <object data="{{asset("storage/$igd->igd_ctt_perkembangan")}}" type="application/pdf" width="100%"
                height="700px"></object>
            @else
            <h3>Data Tidak Tersedia</h3>
            @endif
        </div>
        <div class="tab-pane fade" id="rsm" role="tabpanel" aria-labelledby="rsm-tab">

            @if ($igd->igd_resume)
            <b>{{$igd->igd_datetime}}</b>
            <object data="{{asset("storage/$igd->igd_resume")}}" type="application/pdf" width="100%"
                height="700px"></object>
            @else
            <h3>Data Tidak Tersedia</h3>
            @endif

        </div>
        <div class="tab-pane fade" id="pnj" role="tabpanel" aria-labelledby="pnj-tab">

            @if ($igd->penunjang() != '[]')
            <b>Penunjang</b><br>
            @foreach ($igd->penunjang() as $p)
            <hr>
            <p>{{$p->p_name}}</p>
            <object data="{{asset("storage/$p->p_file")}}" type="application/pdf" width="100%" height="700px"></object>
            @endforeach
            @else
            <h3>Data Tidak Tersedia</h3>
            @endif

        </div>
    </div>
</div>
<div class="card-footer">
    <a href="{{route('super.rekmed.igd.edit', [
                    'rek_id'=>$rek_id, 
                    'id'=>$igd->igd_id
    ])}}" class="btn btn-sm btn-primary">Edit</a>
</div>
@endsection