@extends('layouts.admin')
@section('title') Admin @endsection
@section('content')
<div class="col-3">
    <div class="alert alert-primary text-center">{{$rek_id}}</div>


    <form enctype="multipart/form-data" action="{{route('admin.store.igd')}}" method="POST" >
        @csrf

        <input type="text" name="rek_id" value="{{$rek_id}}" hidden>

        @if (Auth::user())
        <input name="u_id" type="text" hidden value="{{Auth::user()->id}}">
        @endif


        <label class="custom-control-label" for="customCheck1">Catatan Perkembangan</label>
        <input type="file" class="form-control" name="catatan">
        
        

        <input type="submit" value="Simpan" class="btn btn-primary float-right">
        <button type="reset" class="btn btn-danger float-right mr-2">Reset</button>
    </form>
</div>
<div class="col-9">
    <div class="card">
        <embed src="{{ asset('img/1.pdf') }}" type="application/pdf" width="100%" height="600px" />
    </div>
</div>
@endsection