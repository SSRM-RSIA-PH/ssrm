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
    <div class="col-md-6 mb-3" id="div1">
        <div id="ibu">
            <div class="card">
                <div class="card-header">
                    Suami
                </div>
                <div class="card-body">
                    <form action="">
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

    <div class="col-md-6" id="div2">
        <div class="card">
            <div class="card-header">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="ca1">
                    <label class="custom-control-label" for="ca1">Anak Pertama</label>
                </div>
            </div>
            <div class="card-body" hidden id="ba1">
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
        <div class="card">
            <div class="card-header">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="ca2">
                    <label class="custom-control-label" for="ca2">Anak Kedua</label>
                </div>
            </div>
            <div class="card-body" hidden id="ba2">
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
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="ca3">
                    <label class="custom-control-label" for="ca3">Anak Ketiga</label>
                </div>
            </div>
            <div class="card-body" hidden id="ba3">
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
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="ca4">
                    <label class="custom-control-label" for="ca4">Anak Keempat</label>
                </div>
            </div>
            <div class="card-body" hidden id="ba4">
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
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="ca5">
                    <label class="custom-control-label" for="ca5">Anak Kelima</label>
                </div>
            </div>
            <div class="card-body" hidden id="ba5">
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
        </div>
        <div class="mt-3 mb-3">
            <input type="submit" value="Simpan" class="btn btn-primary">
        </div>
        </form>
    </div>
</div>
@endsection