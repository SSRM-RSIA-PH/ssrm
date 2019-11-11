@extends('layouts.admin')
@section('title') Admin @endsection
@section('content')

<div class="col">
    <div class="alert alert-success w-100">
        Preview Upload {{$igd->rek_id}}
    </div>
    <div class="card mb-3">
        <div class="card-header">
            IGD
        </div>
        <div class="card-body">
            <hr>
            @if ($igd->igd_ctt_perkembangan)
            <b>Catatan Perkembangan</b><br>
            <object data="{{asset("storage/$igd->igd_ctt_perkembangan")}}" type="application/pdf" width="100%"
                height="700px"></object>
            <br><br>
            @endif

            <hr>
            @if ($igd->igd_resume)
            <b>Resume</b><br>
            <object data="{{asset("storage/$igd->igd_resume")}}" type="application/pdf" width="100%"
                height="700px"></object>
            <br><br>
            @endif

            <hr>
            <b>Penunjang</b><br>
            @foreach ($igd->penunjang() as $p)
            <p>{{$p->p_name}}</p>
            <object data="{{asset("storage/$p->p_file")}}" type="application/pdf" width="100%" height="700px"></object>
            @endforeach

        </div>

        <div class="card-footer">
            <a href="{{route('admin.index')}}" class="btn btn-primary float-right">Confirm</a>
            <form class="float-right mr-2" action="{{route('admin.validation.cancel')}}" method="POST">
                @csrf
                <input type="text" name="igd_id" hidden value="{{$igd->igd_id}}">
                <input type="submit" class="btn btn-danger" value="Hapus">
            </form>
        </div>
    </div>
</div>

@endsection