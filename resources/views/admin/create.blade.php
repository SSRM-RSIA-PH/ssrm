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

    <div class="col-md-4">
        <div class="card mb-3">
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

                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" name="rek_nik" id="rek_nik" aria-describedby=""
                            placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="rek_darah">Golongan Darah</label>
                        <select class="form-control" name="rek_darah" id="rek_darah">
                            <option>Pilih</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="rek_tempat-lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" name="rek_tempat-lahir" id="rek_tempat-lahir"
                            aria-describedby="" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="rek_tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="rek_tanggal_lahir" id="rek_tanggal_lahir"
                            aria-describedby="" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="rek_agama">Agama</label>
                        <input type="text" class="form-control" name="rek_agama" id="rek_agama" aria-describedby=""
                            placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="rek_job">Pekerjaan</label>
                        <input type="text" class="form-control" name="rek_job" id="rek_job" aria-describedby=""
                            placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="rek_hp">No HP</label>
                        <input type="text" class="form-control" name="rek_hp" id="rek_hp" aria-describedby=""
                            placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="rek_alamat">Alamat</label>
                        <input type="text" class="form-control" name="rek_alamat" id="rek_alamat" aria-describedby=""
                            placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="rek_status">Status</label>
                        <select class="form-control" name="rek_status" id="rek_status">
                            <option>Pilih</option>
                            <option value="Ibu">Ibu</option>
                            <option value="Anak">Anak</option>
                        </select>
                    </div>



                    @if (Auth::user())
                    <input name="u_id" type="text" hidden value="{{Auth::user()->id}}">
                    @endif

            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div id="ibu">
            <div class="card">
                <div class="card-header">
                    Suami
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="rs_name">Nama Suami</label>
                        <input type="text" class="form-control" name="rs_name" id="rs_name" aria-describedby=""
                            placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="rs_job">Pekerjaan Suami</label>
                        <input type="text" class="form-control" name="rs_job" id="rs_job" aria-describedby="helpId"
                            placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="rs_darah">Golongan Darah Suami</label>
                        <select class="form-control" name="rs_darah" id="rs_darah">
                            <option>Pilih</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="rs_hp">No HP Suami</label>
                        <input type="text" class="form-control" name="rs_hp" id="rs_hp" aria-describedby=""
                            placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="rs_alamat">Alamat Suami</label>
                        <input type="text" class="form-control" name="rs_alamat" id="rs_alamat" aria-describedby=""
                            placeholder="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card" id="a1">
            <div class="card-header">
                Anak Pertama
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="ra_name1">Nama Anak</label>
                    <input type="text" class="form-control" name="ra_name1" id="ra_name1" aria-describedby=""
                        placeholder="">
                </div>

                <div class="form-group">
                    <label for="ra_tempat_lahir1">Tempat Lahir Anak</label>
                    <input type="text" class="form-control" name="ra_tempat_lahir1" id="ra_tempat_lahir1"
                        aria-describedby="" placeholder="">
                </div>

                <div class="form-group">
                    <label for="ra_tanggal_lahir1">Tanggal Lahir Anak</label>
                    <input type="date" class="form-control" name="ra_tanggal_lahir1" id="ra_tanggal_lahir1"
                        aria-describedby="" placeholder="">
                </div>

                <div class="form-group">
                    <label for="ra_darah1">Golongan Darah Anak</label>
                    <select class="form-control" name="ra_darah1" id="ra_darah1">
                        <option>Pilih</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                        <option value="O">O</option>
                    </select>
                </div>
            </div>
        </div>

        <hr>
        <div class="card" id="a2">
            <div class="card-header">
                Anak Kedua
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="ra_name2">Nama Anak</label>
                    <input type="text" class="form-control" name="ra_name2" id="ra_name2" aria-describedby=""
                        placeholder="">
                </div>

                <div class="form-group">
                    <label for="ra_tempat_lahir2">Tempat Lahir Anak</label>
                    <input type="text" class="form-control" name="ra_tempat_lahir2" id="ra_tempat_lahir2"
                        aria-describedby="" placeholder="">
                </div>

                <div class="form-group">
                    <label for="ra_tanggal_lahir2">Tanggal Lahir Anak</label>
                    <input type="date" class="form-control" name="ra_tanggal_lahir2" id="ra_tanggal_lahir2"
                        aria-describedby="" placeholder="">
                </div>

                <div class="form-group">
                    <label for="ra_darah2">Golongan Darah Anak</label>
                    <select class="form-control" name="ra_darah2" id="ra_darah2">
                        <option>Pilih</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                        <option value="O">O</option>
                    </select>
                </div>
            </div>
        </div>

        <hr>
        <div class="card" id="a3">
            <div class="card-header">
                Anak Ketiga
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="ra_name3">Nama Anak</label>
                    <input type="text" class="form-control" name="ra_name3" id="ra_name3" aria-describedby=""
                        placeholder="">
                </div>

                <div class="form-group">
                    <label for="ra_tempat_lahir3">Tempat Lahir Anak</label>
                    <input type="text" class="form-control" name="ra_tempat_lahir3" id="ra_tempat_lahir3"
                        aria-describedby="" placeholder="">
                </div>

                <div class="form-group">
                    <label for="ra_tanggal_lahir3">Tanggal Lahir Anak</label>
                    <input type="date" class="form-control" name="ra_tanggal_lahir3" id="ra_tanggal_lahir3"
                        aria-describedby="" placeholder="">
                </div>

                <div class="form-group">
                    <label for="ra_darah3">Golongan Darah Anak</label>
                    <select class="form-control" name="ra_darah3" id="ra_darah3">
                        <option>Pilih</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                        <option value="O">O</option>
                    </select>
                </div>
            </div>
        </div>

        <hr>
        <div class="card" id="a4">
            <div class="card-header">
                Anak Empat
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="ra_name4">Nama Anak</label>
                    <input type="text" class="form-control" name="ra_name4" id="ra_name4" aria-describedby=""
                        placeholder="">
                </div>

                <div class="form-group">
                    <label for="ra_tempat_lahir4">Tempat Lahir Anak</label>
                    <input type="text" class="form-control" name="ra_tempat_lahir4" id="ra_tempat_lahir4"
                        aria-describedby="" placeholder="">
                </div>

                <div class="form-group">
                    <label for="ra_tanggal_lahir4">Tanggal Lahir Anak</label>
                    <input type="date" class="form-control" name="ra_tanggal_lahir4" id="ra_tanggal_lahir4"
                        aria-describedby="" placeholder="">
                </div>

                <div class="form-group">
                    <label for="ra_darah4">Golongan Darah Anak</label>
                    <select class="form-control" name="ra_darah4" id="ra_darah4">
                        <option>Pilih</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                        <option value="O">O</option>
                    </select>
                </div>
            </div>
        </div>

        <hr>
        <div class="card" id="a5">
            <div class="card-header">
                Anak Kelima
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="ra_name5">Nama Anak</label>
                    <input type="text" class="form-control" name="ra_name5" id="ra_name5" aria-describedby=""
                        placeholder="">
                </div>

                <div class="form-group">
                    <label for="ra_tempat_lahir5">Tempat Lahir Anak</label>
                    <input type="text" class="form-control" name="ra_tempat_lahir5" id="ra_tempat_lahir5"
                        aria-describedby="" placeholder="">
                </div>

                <div class="form-group">
                    <label for="ra_tanggal_lahir5">Tanggal Lahir Anak</label>
                    <input type="date" class="form-control" name="ra_tanggal_lahir5" id="ra_tanggal_lahir5"
                        aria-describedby="" placeholder="">
                </div>

                <div class="form-group">
                    <label for="ra_darah5">Golongan Darah Anak</label>
                    <select class="form-control" name="ra_darah5" id="ra_darah5">
                        <option>Pilih</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                        <option value="O">O</option>
                    </select>
                </div>
            </div>
            <div class="card-footer">
                <button id="simpan" type="submit" class="btn btn-primary">Simpan</button></form>
            </div>
        </div>
    </div>
</div>
@endsection