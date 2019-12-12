@extends('layouts.main')
@section('title') Admin @endsection
@section('menu')
<a href="{{route('admin.index')}}" class="nav-item nav-link">Cari Pasien</a>
@endsection
@section('content')

<div class="col">
    <div class="alert alert-success w-100">
        Preview Upload {{$nicu->rek_id}}
    </div>
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
            <p>{{strtoupper($p->p_name)}}</p>
            <object data="{{asset("storage/$p->p_file")}}" type="application/pdf" width="100%" height="700px"></object>
            @endforeach
            @endif

            @if ($nicu->nicu_file_lengkap)
            <hr>
            <b>File Lengkap</b><br>
            <object data="{{asset("storage/$nicu->nicu_file_lengkap")}}" type="application/pdf" width="100%"
                height="700px"></object>
            <br><br>
            @endif

        </div>

        <div class="card-footer">
            <a href="{{route('admin.show.rek', ['rek_id'=>$nicu->rek_id])}}"
                class="btn btn-primary float-right">Confirm</a>
            <form class="float-right mr-2" action="{{route('admin.validation.nicu.cancel')}}" method="POST">
                @csrf
                <input type="text" name="nicu_id" hidden value="{{$nicu->nicu_id}}">
                <input type="submit" class="btn btn-danger" value="Hapus">
            </form>
        </div>
    </div>
</div>

@endsection