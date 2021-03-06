@extends('layouts.super')
@section('title') Detail @endsection
@section('menu')
<a href="{{route('super.index')}}" class="nav-item nav-link">Home</a>
<a href="{{route('super.rekmed.show.poli', ['rek_id'=>$rek_id])}}" class="nav-link">Kembali</a>
@endsection
@section('content')
@section('content')
@foreach ($poli->penunjang() as $p)
@switch($p->p_name)
@case('usg')
<div hidden>{{$usg = $p}}</div>
@break
@case('ctg')
<div hidden>{{$ctgd = $p}}</div>
@break
@case('ekg')
<div hidden>{{$ekg = $p}}</div>
@break
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
    <li class="nav-item">
        <a class="nav-link" id="bru-tab" data-toggle="tab" href="#bru" role="tab" aria-controls="bru"
            aria-selected="false">File Lengkap</a>
    </li>
</ul>

<div class="card-body">
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade bg-white show active" id="ctp" role="tabpanel" aria-labelledby="ctp-tab">
            @if ($poli->poli_ctt_integ)
            <object data="{{asset("storage/$poli->poli_ctt_integ")}}" type="application/pdf" width="100%"
                height="700px"></object>
            @else
            <h3>Data Tidak Tersedia</h3>
            @endif
        </div>
        <div class="tab-pane fade bg-white" id="rsm" role="tabpanel" aria-labelledby="rsm-tab">
            @if ($poli->poli_resume)
            <object data="{{asset("storage/$poli->poli_resume")}}" type="application/pdf" width="100%"
                height="700px"></object>
            @else
            <h3>Data Tidak Tersedia</h3>
            @endif
        </div>
        <div class="tab-pane fade bg-white" id="pnj" role="tabpanel" aria-labelledby="pnj-tab" class="bg-white"
            style="background-color: white">
            <ul class="nav nav-tabs font-weight-bold" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pnj-usg" data-toggle="tab" href="#usg" role="tab" aria-controls="usg"
                        aria-selected="true">USG</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pnj-ctg" data-toggle="tab" href="#ctg" role="tab" aria-controls="ctg"
                        aria-selected="false">CTG</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pnj-xray" data-toggle="tab" href="#xray" role="tab" aria-controls="xray"
                        aria-selected="false">X RAY</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pnj-ekg" data-toggle="tab" href="#ekg" role="tab" aria-controls="ekg"
                        aria-selected="false">EKG</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pnj-lab" data-toggle="tab" href="#lab" role="tab" aria-controls="lab"
                        aria-selected="false">LAB</a>
                </li>
            </ul>

            <div class="card-body">
                <div class="tab-content" id="myTabContent2">
                    <div class="tab-pane fade bg-white show active" id="usg" role="tabpanel" aria-labelledby="pnj-usg">
                        @if (isset($usg))
                        <object data="{{asset("storage/$usg->p_file")}}" type="application/pdf" width="100%"
                            height="700px"></object>
                        @else
                        <h3>Data Tidak Tersedia</h3>
                        @endif
                    </div>
                    <div class="tab-pane fade bg-white show" id="ctg" role="tabpanel" aria-labelledby="pnj-ctg">
                        @if (isset($ctgd))
                        <object data="{{asset("storage/$ctgd->p_file")}}" type="application/pdf" width="100%"
                            height="700px"></object>
                        @else
                        <h3>Data Tidak Tersedia</h3>
                        @endif
                    </div>
                    <div class="tab-pane fade bg-white show" id="xray" role="tabpanel" aria-labelledby="pnj-xray">
                        @if (isset($xray))
                        <object data="{{asset("storage/$xray->p_file")}}" type="application/pdf" width="100%"
                            height="700px"></object>
                        @else
                        <h3>Data Tidak Tersedia</h3>
                        @endif
                    </div>
                    <div class="tab-pane fade bg-white show" id="ekg" role="tabpanel" aria-labelledby="pnj-ekg">
                        @if (isset($ekg))
                        <object data="{{asset("storage/$ekg->p_file")}}" type="application/pdf" width="100%"
                            height="700px"></object>
                        @else
                        <h3>Data Tidak Tersedia</h3>
                        @endif
                    </div>
                    <div class="tab-pane fade bg-white show" id="lab" role="tabpanel" aria-labelledby="pnj-lab">
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
        <div class="tab-pane fade bg-white" id="bru" role="tabpanel" aria-labelledby="bru-tab">
            @if ($poli->poli_file_lengkap)
            <object data="{{asset("storage/$poli->poli_file_lengkap")}}" type="application/pdf" width="100%"
                height="700px"></object>
            @else
            <h3>Data Tidak Tersedia</h3>
            @endif
        </div>
    </div>
</div>
<div class="card-footer">
    <a href="{{route('super.rekmed.poli.edit', [
                    'rek_id'=>$rek_id, 
                    'id'=>$poli->poli_id
    ])}}" class="btn btn-primary">Edit</a>
</div>
@endsection