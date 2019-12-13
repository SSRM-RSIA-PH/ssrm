@extends('layouts.super')
@section('title') Detail @endsection
@section('menu')
<a href="{{route('super.index')}}" class="nav-item nav-link">Home</a>
<a href="{{route('super.rekmed.show.ri', ['rek_id'=>$rek_id])}}" class="nav-link">Kembali</a>
@endsection
@section('content')
@foreach ($ri->penunjang() as $p)
@switch($p->p_name)
@case('lab')
<div hidden>{{$lab = $p}}</div>
@break
@case('xray')
<div hidden>{{$xray = $p}}</div>
@break
@default
@endswitch
@endforeach

<ul class="nav nav-tabs font-weight-bold" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="cpt-tab" data-toggle="tab" href="#cpt" role="tab" aria-controls="cpt"
            aria-selected="true">Catatan Perkembangan Terintegrasi</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="cot-tab" data-toggle="tab" href="#cot" role="tab" aria-controls="cot"
            aria-selected="false">Catatan Operasi/Tindakan</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="byi-tab" data-toggle="tab" href="#byi" role="tab" aria-controls="byi"
            aria-selected="false">Bayi</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="rsm-tab" data-toggle="tab" href="#rsm" role="tab" aria-controls="rsm"
            aria-selected="false">Resume Inap</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pnj-tab" data-toggle="tab" href="#pnj" role="tab" aria-controls="pnj"
            aria-selected="false">Penunjang</a>
    </li>
</ul>
<div class="card-body">
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="cpt" role="tabpanel" aria-labelledby="cpt-tab">
            @if ($ri->ri_ctt_integ)
            <object data="{{asset("storage/$ri->ri_ctt_integ")}}" type="application/pdf" width="100%"
                height="700px"></object>
            @else
            <h3>Data Tidak Tersedia</h3>
            @endif
        </div>
        <div class="tab-pane fade" id="cot" role="tabpanel" aria-labelledby="cot-tab">
            @if ($ri->ri_ctt_oper)
            <object data="{{asset("storage/$ri->ri_ctt_oper")}}" type="application/pdf" width="100%"
                height="700px"></object>
            @else
            <h3>Data Tidak Tersedia</h3>
            @endif
        </div>
        <div class="tab-pane fade" id="byi" role="tabpanel" aria-labelledby="byi-tab">

            @if ($ri->ri_bayi)
            <object data="{{asset("storage/$ri->ri_bayi")}}" type="application/pdf" width="100%"
                height="700px"></object>
            @else
            <h3>Data Tidak Tersedia</h3>
            @endif
        </div>
        <div class="tab-pane fade" id="rsm" role="tabpanel" aria-labelledby="rsm-tab">
            @if ($ri->ri_resume)
            <object data="{{asset("storage/$ri->ri_resume")}}" type="application/pdf" width="100%"
                height="700px"></object>
            @else
            <h3>Data Tidak Tersedia</h3>
            @endif
        </div>
        <div class="tab-pane fade" id="pnj" role="tabpanel" aria-labelledby="pnj-tab" class="bg-white"
            style="background-color: white">
            <ul class="nav nav-tabs font-weight-bold" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pnj-xray" data-toggle="tab" href="#xray" role="tab" aria-controls="xray"
                        aria-selected="false">X RAY</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pnj-lab" data-toggle="tab" href="#lab" role="tab" aria-controls="lab"
                        aria-selected="false">LAB</a>
                </li>
            </ul>

            <div class="card-body">
                <div class="tab-content" id="myTabContent2">
                    <div class="tab-pane fade show active" id="xray" role="tabpanel" aria-labelledby="pnj-xray">
                        @if (isset($xray))
                        <object data="{{asset("storage/$xray->p_file")}}" type="application/pdf" width="100%"
                            height="700px"></object>
                        @else
                        <h3>Data Tidak Tersedia</h3>
                        @endif
                    </div>
                    <div class="tab-pane fade show" id="lab" role="tabpanel" aria-labelledby="pnj-lab">
                        @if (isset($lab))
                        <object data="{{asset("storage/$lab->p_file")}}" type="application/pdf" width="100%"
                            height="700px"></object>
                        @else
                        <h3>Data Tidak Tersedia</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card-footer">
    <a href="{{route('super.rekmed.ri.edit', [
                    'rek_id'=>$rek_id, 
                    'id'=>$ri->ri_id
    ])}}" class="btn btn-primary">Edit</a>
</div>
@endsection