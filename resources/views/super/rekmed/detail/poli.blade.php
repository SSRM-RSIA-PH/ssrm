@extends('layouts.main')
@section('title') Detail @endsection
@section('content')

<div class="col">
    <div class="alert alert-success w-100">
    </div>
    <div class="card mb-3">
        <div class="card-header">
            POLI
        </div>
        <div class="card-body">
            @if ($poli->poli_ctt_integ)
            <hr>
            <b>Catatan Perkembangan</b><br>
            <object data="{{asset("storage/$poli->poli_ctt_integ")}}" type="application/pdf" width="100%"
                height="700px"></object>
            <br><br>
            @endif

            @if ($poli->poli_resume)
            <hr>
            <b>Resume</b><br>
            <object data="{{asset("storage/$poli->poli_resume")}}" type="application/pdf" width="100%"
                height="700px"></object>
            <br><br>
            @endif

            @if ($poli->penunjang() != '[]')
            <hr>
            <b>Penunjang</b><br>
            @foreach ($poli->penunjang() as $p)
            <p>{{$p->p_name}}</p>
            <object data="{{asset("storage/$p->p_file")}}" type="application/pdf" width="100%" height="700px"></object>
            @endforeach
            @endif
        </div>
    </div>
</div>

@endsection