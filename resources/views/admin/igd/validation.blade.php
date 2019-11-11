@extends('layouts.admin')
@section('title') Admin @endsection
@section('content')

<div class="alert alert-success w-100">
    Show Upload {{$poli->poli_id}}
</div>

<div class="card">
    <div class="card-header">
        {{$poli->rek_id}} - poli
    </div>
    <div class="card-body">
        @if ($poli->poli_ctt_integ)
        <b>Catatan Perkembangan</b><br>
        <object data="{{asset("storage/$poli->poli_ctt_integ")}}" type="application/pdf" width="100%"
            height="700px"></object>
        <br><br>
        @endif

        @if ($poli->poli_resume)
        <b>Resume</b><br>
        <object data="{{asset("storage/$poli->poli_resume")}}" type="application/pdf" width="100%"
            height="700px"></object>
        <br><br>
        @endif

        <b>Penunjang</b><br>
        @foreach ($poli->penunjang() as $p)
        <p>{{$p->p_name}}</p>
        <object data="{{asset("storage/$p->p_file")}}" type="application/pdf" width="100%" height="700px"></object>
        @endforeach
    </div>

    <a href="{{route('admin.index')}}" class="btn btn-primary">Valid</a>
    <form class="form-inline" action="{{route('admin.validation.poli.cancel')}}" method="POST">
        @csrf
        <input type="text" name="poli_id" hidden value="{{$poli->poli_id}}">
        <input type="submit" class="btn btn-danger" value="Cancel">
    </form>
</div>

@endsection