@extends('layouts.main')
@section('title') Admin @endsection
@section('menu')
<a href="{{route('admin.index')}}" class="nav-item nav-link">Dashboard</a>
@endsection
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
            {{-- {{$igd->igd_ctt_perkembangan}} --}}
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
            <p>{{strtoupper($p->p_name)}}</p>
            <object data="{{asset("storage/$p->p_file")}}" type="application/pdf" width="100%" height="700px"></object>
            @endforeach
            @endif

        </div>

        <div class="card-footer">
            <a href="{{route('admin.show.rek', ['rek_id'=>$igd->rek_id])}}"
                class="btn btn-primary float-right">Confirm</a>
            <form class="float-right mr-2" action="{{route('admin.validation.igd.cancel')}}" method="POST">
                @csrf
                <input type="text" name="igd_id" hidden value="{{$igd->igd_id}}">
                <input type="submit" class="btn btn-danger" value="Hapus">
            </form>
        </div>
    </div>
</div>
@endsection