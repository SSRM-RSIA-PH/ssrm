@extends('layouts.main')
@section('title')
Add ID Rekam Medis
@endsection
@section('menu')
<a href="{{route('admin.index')}}" class="nav-item nav-link">Cari Pasien</a>
@endsection
@section('content')
<div class="row d-flex justify-content-center">
    @if (session('status'))
    <div class="alert alert-success">
        Berhasil Menambahkan {{session('status')}}
        <a href="{{route('admin.show.rek', ['rek_id'=>session('status')])}}">Rekam Medis</a>
    </div><br>
    @endif
    <div class="col-6">
        <div class="card" id="rp">
            <div class="card-header">
                Orang Tua
            </div>
            <div class="card-body">
                <form action="">
                    <div class="form-group">
                        <label for="rp_ibu">Nama Ibu</label>
                        <input type="text" class="form-control" name="rp_ibu" id="rp_ibu" aria-describedby="rp_ibu"
                            required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="rp_ibu_hp">No HP Ibu</label>
                        <input type="text" class="form-control" name="rp_ibu_hp" id="rp_ibu_hp"
                            aria-describedby="rp_ibu_hp" required>
                    </div>

                    <div class="form-group">
                        <label for="rp_ayah">Nama Ayah</label>
                        <input type="text" class="form-control" name="rp_ayah" id="rp_ayah" aria-describedby="rp_ayah"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="rp_ayah_hp">No HP Ayah</label>
                        <input type="text" class="form-control" name="rp_ayah_hp" id="rp_ayah_hp"
                            aria-describedby="rp_ayah_hp" required>
                    </div>
                    <input type="submit" value="Simpan" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection