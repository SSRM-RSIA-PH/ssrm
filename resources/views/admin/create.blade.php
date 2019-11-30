@extends('layouts.main')
@section('title')
Add ID Rekam Medis
@endsection
@section('content')

<div class="container">
    @if (session('status'))
    <div class="alert alert-success">
        Berhasil Menambahkan {{session('status')}}
        <a href="{{route('admin.show.rek', ['rek_id'=>session('status')])}}">Rekam Medis</a>
    </div><br>
    @endif

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Tambah Pasien Baru</div>
            <div class="card-body">
                <form action="{{route('admin.store.rek')}}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="rek_id">Rekam Medis ID</label>
                        <input type="text" class="form-control {{$errors->first('rek_id') ? 'is-invalid':''}}"
                            name="rek_id" id="rek_id" aria-describedby="rek_id" placeholder=""
                            value="{{$errors->first('rek_id') ? old('rek_id'):$id}}" required
                            {{$errors->first('rek_id') ? 'autofocus':''}}>
                        @if ($errors->first('rek_id'))
                        <div class="invalid-feedback">
                            {{$errors->first('rek_id')}}
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="rek_name">Nama Pasien</label>
                        <input type="text" class="form-control" name="rek_name" id="rek_name"
                            aria-describedby="rek_name" required autofocus value="{{old('rek_name')}}">
                    </div>

                    @if (Auth::user())
                    <input name="u_id" type="text" hidden value="{{Auth::user()->id}}">
                    @endif

            </div>
            <div class="card-footer">
                <button id="simpan" type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection