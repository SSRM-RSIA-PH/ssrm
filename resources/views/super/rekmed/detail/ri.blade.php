@extends('layouts.main')
@section('title') Detail @endsection
@section('content')

<div class="col">
    <div class="alert alert-success w-100">
    </div>
    <div class="card mb-3">
        <div class="card-header">
            RAWAT INAP
        </div>
        <div class="card-body">
            @if ($ri->ri_ctt_integ)
            <hr>
            <b>Catatan Perkembangan Terintegrasi</b><br>
            <object data="{{asset("storage/$ri->ri_ctt_integ")}}" type="application/pdf" width="100%"
                height="700px"></object>
            <br><br>
            @endif

            @if ($ri->ri_resume)
            <hr>
            <b>Resume</b><br>
            <object data="{{asset("storage/$ri->ri_resume")}}" type="application/pdf" width="100%"
                height="700px"></object>
            <br><br>
            @endif

            @if ($ri->ri_ctt_oper)
            <hr>
            <b>Catatan Tindakan/Operasi</b><br>
            <object data="{{asset("storage/$ri->ri_ctt_oper")}}" type="application/pdf" width="100%"
                height="700px"></object>
            <br><br>
            @endif

            @if ($ri->ri_bayi)
            <hr>
            <b>Bayi</b><br>
            <object data="{{asset("storage/$ri->ri_bayi")}}" type="application/pdf" width="100%"
                height="700px"></object>
            <br><br>
            @endif

            @if ($ri->penunjang() != '[]')
            <hr>
            <b>Penunjang</b><br>
            @foreach ($ri->penunjang() as $p)
            <p>{{$p->p_name}}</p>
            <object data="{{asset("storage/$p->p_file")}}" type="application/pdf" width="100%" height="700px"></object>
            @endforeach
            @endif
        </div>
    </div>
</div>

@endsection