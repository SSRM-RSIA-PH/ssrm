@extends('layouts.super')
@section('title') Supervisor @endsection
@section('content')

<div class="alert alert-success w-100">
    Show Upload {{$igd->igd_id}}
</div>

<div class="card">
    <div class="card-header">
        {{$igd->rek_id}} - IGD
    </div>
    <div class="card-body">
        @if ($igd->igd_ctt_perkembangan)
        <b>Catatan Perkembangan</b><br>
        <object data="{{asset("storage/$igd->igd_ctt_perkembangan")}}" type="application/pdf" width="100%"
            height="700px"></object>
        <br><br>
        @endif

        @if ($igd->igd_resume)
        <b>Resume</b><br>
        <object data="{{asset("storage/$igd->igd_resume")}}" type="application/pdf" width="100%"
            height="700px"></object>
        <br><br>
        @endif

        <b>Penunjang</b><br>
        @foreach ($igd->penunjang() as $p)
        <p>{{$p->p_name}}</p>
        <object data="{{asset("storage/$p->p_file")}}" type="application/pdf" width="100%" height="700px"></object>
        @endforeach
    </div>

    <form class="form-inline" action="{{route('admin.index')}}">
        <input type="submit" value="Valid" class="btn btn-primary">
    </form>
    <form class="form-inline" action="{{route('admin.validation.cancel')}}" method="POST">
        @csrf
        <input type="text" name="igd_id" hidden value="{{$igd->igd_id}}">
        <input type="submit" class="btn btn-danger" value="Cancel">
    </form>
</div>

@endsection