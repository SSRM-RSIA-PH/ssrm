@extends('layouts.main')
@section('title') Admin @endsection
@section('menu')
<a href="{{route('admin.index')}}" class="nav-item nav-link">Dashboard</a>
@endsection
@section('content')

<div class="col">
    <div class="alert alert-success w-100">
        Preview Upload {{$ri->rek_id}}
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

        <div class="card-footer">
            <a href="{{route('admin.show.rek',['rek_id'=>$ri->rek_id])}}"
                class="btn btn-primary float-right">Confirm</a>
            <form class="float-right mr-2" action="{{route('admin.validation.ri.cancel')}}" method="POST">
                @csrf
                <input type="text" name="ri_id" hidden value="{{$ri->ri_id}}">
                <input type="submit" class="btn btn-danger" value="Hapus">
            </form>
        </div>
    </div>
</div>

@endsection