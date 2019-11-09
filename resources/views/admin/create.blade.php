@extends('layouts.admin')
@section('title')
Add ID Rekam Medis
@endsection
@section('content')
<div class="container">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Tambah Pasien Baru</div>
            <div class="card-body">
                <form action="{{route('admin.store.rek')}}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="rek_id">Rekam Medis ID</label>
                        <input type="text" class="form-control" name="rek_id" id="rek_id" aria-describedby="rek_id"
                            placeholder="" value="{{$id}}" required>
                    </div>

                    <div class="form-group">
                        <label for="rek_name">Nama Pasien</label>
                        <input type="text" class="form-control" name="rek_name" id="rek_name"
                            aria-describedby="rek_name" placeholder="" required>
                    </div>

                    @if (Auth::user())
                    <input name="u_id" type="text" hidden value="{{Auth::user()->id}}">
                    @endif

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection