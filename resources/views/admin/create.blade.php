@extends('layouts.main')
@section('title')
Add ID Rekam Medis
@endsection
@section('menu')
<a href="{{route('admin.index')}}" class="nav-item nav-link">Cari Pasien</a>
@endsection
@section('content')
<div class="row d-flex justify-content-center">
    <div class="col-md-6">
        @if (session('status'))
        <div class="alert alert-success">
            Berhasil Menambahkan Rekam Medis <a class="btn btn-sm btn-success"
                href="{{route('admin.show.rek', ['rek_id'=>session('status')])}}">{{session('status')}}</a>
        </div>
        @endif

        <div class="card mb-3">
            <div class="card-header">Tambah Pasien Baru</div>
            <div class="card-body">
                <form action="{{route('admin.store.rek')}}" method="POST">
                    @csrf

                    {{-- profile utama --}}
                    <div class="form-group">
                        <label for="rek_id">Rekam Medis ID</label>
                        <input type="text" class="form-control {{$errors->first('rek_id') ? 'is-invalid':''}}"
                            name="rek_id" id="rek_id" aria-describedby="rek_id" placeholder="" maxlength="6" minlength="6"
                            value="{{$errors->first('rek_id') ? old('rek_id'):$id}}" required autofocus>

                        @if ($errors->first('rek_id'))
                        <div class="error-message">
                            ID Rekam Medis sudah terdaftar
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="rek_name">Nama Pasien</label>
                        <input type="text" class="form-control" name="rek_name" id="rek_name"
                            aria-describedby="rek_name" required value="{{old('rek_name')}}" required>
                    </div>

                    <div class="form-group">
                        <label for="rek_nik">NIK</label>
                        <input type="text" class="form-control {{$errors->first('rek_nik') ? 'is-invalid':''}}"
                            name="rek_nik" id="rek_nik" aria-describedby="" placeholder="" value="{{old('rek_nik')}}"
                            maxlength="16">

                        @if ($errors->first('rek_nik'))
                        <div class="error-message">
                            NIK sudah terdaftar
                        </div>
                        @endif
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
                        <label for="rek_tempat_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" name="rek_tempat_lahir" id="rek_tempat_lahir"
                            aria-describedby="" placeholder="" value="{{old('rek_tempat_lahir')}}">
                    </div>

                    <div class="form-group">
                        <label for="rek_tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="rek_tanggal_lahir" id="rek_tanggal_lahir"
                            aria-describedby="" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="rek_agama">Agama</label>
                        <select class="form-control" name="rek_agama" id="rek_agama" required>
                            <option>Pilih</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="rek_job">Pekerjaan</label>
                        <input type="text" class="form-control" name="rek_job" id="rek_job" aria-describedby=""
                            placeholder="" value="{{old('rek_job')}}">
                    </div>

                    <div class="form-group">
                        <label for="rek_hp">No HP</label>
                        <input type="text" class="form-control" name="rek_hp" id="rek_hp" aria-describedby=""
                            placeholder="" value="{{old('rek_hp')}}" maxlength="15">
                    </div>

                    <div class="form-group">
                        <label for="rek_alamat">Alamat</label>
                        <input type="text" class="form-control" name="rek_alamat" id="rek_alamat" aria-describedby=""
                            placeholder="" value="{{old('rek_alamat')}}" required>
                    </div>

                    <div class="form-group">
                        <label for="rek_status">Status</label>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="ribu" name="rek_status" class="custom-control-input" value="ibu">
                            <label class="custom-control-label" for="ribu">Ibu</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="ranak" name="rek_status" class="custom-control-input" value="anak">
                            <label class="custom-control-label" for="ranak">Anak</label>
                        </div>

                        @if ($errors->first('rek_status'))
                        <p class="error-message">Silahkan pilih status terlebih dahulu</p>
                        @endif
                    </div>

                    <div id="suami">
                        {{-- profile suami --}}
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
                                <option value="">Pilih</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="AB">AB</option>
                                <option value="O">O</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="rs_hp">No HP Suami</label>
                            <input type="text" class="form-control" name="rs_hp" id="rs_hp" aria-describedby=""
                                placeholder="" maxlength="15">
                        </div>

                        <div class="form-group">
                            <label for="rs_alamat">Alamat Suami</label>
                            <input type="text" class="form-control" name="rs_alamat" id="rs_alamat" aria-describedby=""
                                placeholder="">
                        </div>
                    </div>

                    <div id="ortu">
                        {{-- profile orangtua --}}
                        <div class="form-group">
                            <label for="rp_ibu">Nama Ibu</label>
                            <input type="text" class="form-control" name="rp_ibu" id="rp_ibu" aria-describedby="rp_ibu">
                        </div>

                        <div class="form-group">
                            <label for="rp_ibu_hp">No Telp Ibu</label>
                            <input type="text" class="form-control" name="rp_ibu_hp" id="rp_ibu_hp"
                                aria-describedby="rp_ibu_hp" maxlength="15">
                        </div>

                        <div class="form-group">
                            <label for="rp_ayah">Nama Ayah</label>
                            <input type="text" class="form-control" name="rp_ayah" id="rp_ayah"
                                aria-describedby="rp_ayah">
                        </div>

                        <div class="form-group">
                            <label for="rp_ayah_hp">No Telp Ayah</label>
                            <input type="text" class="form-control" name="rp_ayah_hp" id="rp_ayah_hp"
                                aria-describedby="rp_ayah_hp" maxlength="15">
                        </div>
                    </div>

            </div>
            <div class="card-footer">
                <button id="simpan" type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
    @endsection