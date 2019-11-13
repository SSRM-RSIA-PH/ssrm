@extends('layouts.admin')
@section('title') Admin @endsection
@section('content')

<div class="col">
    <div class="alert alert-success w-100">
        Preview Upload {{$poli->rek_id}}
    </div>
    <div class="card mb-3">
        <div class="card-header">
            IGD
        </div>
        <div class="card-body">
            <hr>
            @if ($poli->poli_ctt_integ)
            <b>Catatan Perkembangan</b><br>
            <object data="{{asset("storage/$poli->poli_ctt_integ")}}" type="application/pdf" width="100%"
                height="700px"></object>
            <br><br>
            @endif

            <hr>
            @if ($poli->poli_resume)
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

        <div class="card-footer">
            <a href="{{route('admin.show.rek', ['rek_id'=>$poli->rek_id])}}" class="btn btn-primary float-right">Confirm</a>
            <form class="float-right mr-2" action="{{route('admin.validation.poli.cancel')}}" method="POST">
                @csrf
                <input type="text" name="poli_id" hidden value="{{$poli->poli_id}}">
                <input type="submit" class="btn btn-danger" value="Hapus">
            </form>
        </div>
    </div>
</div>

@endsection