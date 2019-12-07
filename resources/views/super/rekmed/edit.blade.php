@extends('layouts.super')
@section('title')
Edit
@endsection
@section('menu')
<a href="{{route('super.index')}}" class="nav-item nav-link">Dashboard</a>
<a class="nav-link" href="{{-- {{route('logupload')}} --}}">Log Upload</a>
<a class="nav-link" href="{{route('user.index')}}">Manage Users</a>
<a class="nav-link active" href="{{route('super.rekmed')}}">Manage Rekmed</a>
@endsection
@section('content')
<div class="row d-flex justify-content-center">
    <div class="col-8">
        @if (session('status'))
        <div class="alert alert-success">
            {{session('status')}}
            <a href="{{route('super.rekmed')}}">Kembali</a>
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                Edit Rekam Medis
            </div>
            <div class="card-body">
                <form action="{{route('super.rekmed.update', ['rek_id'=>$rekmed->rek_id])}}" method="POST">
                    @csrf
                    <input type="hidden" value="PUT" name="_method">

                    <label for="">ID Rekam Medis</label><br>
                    <input class="form-control" type="text" name="rek_id" value="{{$rekmed->rek_id}}" required readonly>
                    <br>
                    <label for="">Nama Pasien</label><br>
                    <input class="form-control" type="text" name="rek_name" value="{{$rekmed->rek_name}}" required>
                    <br>
                    <input type="submit" value="Simpan" class="btn btn-sm btn-primary">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection