@extends('layouts.super')
@section('title')
Edit
@endsection
@section('menu')
<a href="{{route('super.index')}}" class="nav-item nav-link">Dashboard</a>
<a class="nav-link" href="{{route('super.rekmed')}}">Rekam Medis</a>
<a href="" class="nav-link active">Edit Rekam Medis</a>
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

                    <div class="form-group">
                        <label for="rek_id">Rekam Medis ID</label>
                        <input type="text" class="form-control" name="rek_id" id="rek_id" aria-describedby="rek_id"
                            value="{{$rekmed->rek_id}}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="rek_name">Nama Pasien</label>
                        <input type="text" class="form-control" name="rek_name" id="rek_name"
                            aria-describedby="rek_name" required autofocus value="{{$rekmed->rek_name}}" required>
                    </div>

                    <div class="form-group">
                        <label for="rek_nik">NIK</label>
                        <input type="text" class="form-control" name="rek_nik" id="rek_nik" aria-describedby=""
                            placeholder="" value="{{$rekmed->rek_nik}}" required>

                        @if ($errors->first('rek_nik'))
                        <div class="small" style="color:red; padding-top: 5px">
                            NIK "{{old('rek_nik')}}" sudah terdaftar
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="rek_darah">Golongan Darah</label>
                        <select class="form-control" name="rek_darah" id="rek_darah">
                            <option value="">Pilih</option>
                            <option value="A" {{$rekmed->rek_darah == 'A' ? 'selected':''}}>A</option>
                            <option value="B" {{$rekmed->rek_darah == 'B' ? 'selected':''}}>B</option>
                            <option value="AB" {{$rekmed->rek_darah == 'AB' ? 'selected':''}}>AB</option>
                            <option value="O" {{$rekmed->rek_darah == 'O' ? 'selected':''}}>O</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="rek_tempat_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" name="rek_tempat_lahir" id="rek_tempat_lahir"
                            aria-describedby="" placeholder="" value="{{$rekmed->rek_tempat_lahir}}">
                    </div>

                    <div class="form-group">
                        <label for="rek_tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="rek_tanggal_lahir" id="rek_tanggal_lahir"
                            aria-describedby="" placeholder="" value="{{$rekmed->rek_tanggal_lahir}}">
                    </div>

                    <div class="form-group">
                        <label for="rek_agama">Agama</label>
                        <input type="text" class="form-control" name="rek_agama" id="rek_agama" aria-describedby=""
                            placeholder="" value="{{$rekmed->rek_agama}}" required>
                    </div>

                    <div class="form-group">
                        <label for="rek_job">Pekerjaan</label>
                        <input type="text" class="form-control" name="rek_job" id="rek_job" aria-describedby=""
                            placeholder="" value="{{$rekmed->rek_job}}">
                    </div>

                    <div class="form-group">
                        <label for="rek_hp">No HP</label>
                        <input type="text" class="form-control" name="rek_hp" id="rek_hp" aria-describedby=""
                            placeholder="" value="{{$rekmed->rek_hp}}">
                    </div>

                    <div class="form-group">
                        <label for="rek_alamat">Alamat</label>
                        <input type="text" class="form-control" name="rek_alamat" id="rek_alamat" aria-describedby=""
                            placeholder="" value="{{$rekmed->rek_alamat}}" required>
                    </div>

                    @if ($rekmed->rek_status == 'ibu')
                    {{-- profile suami --}}
                    <div class="form-group">
                        <label for="rs_name">Nama Suami</label>
                        <input type="text" class="form-control" name="rs_name" id="rs_name" aria-describedby=""
                            placeholder="" value="{{$rekmed->s_name}}">
                    </div>

                    <div class="form-group">
                        <label for="rs_job">Pekerjaan Suami</label>
                        <input type="text" class="form-control" name="rs_job" id="rs_job" aria-describedby="helpId"
                            placeholder="" value="{{$rekmed->s_job}}">
                    </div>

                    <div class="form-group">
                        <label for="rs_darah">Golongan Darah Suami</label>
                        <select class="form-control" name="rs_darah" id="rs_darah">
                            <option value="">Pilih</option>
                            <option value="A" {{$rekmed->s_darah == 'A' ? 'selected':''}}>A</option>
                            <option value="B" {{$rekmed->s_darah == 'B' ? 'selected':''}}>B</option>
                            <option value="AB" {{$rekmed->s_darah == 'AB' ? 'selected':''}}>AB</option>
                            <option value="O" {{$rekmed->s_darah == 'O' ? 'selected':''}}>O</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="rs_hp">No HP Suami</label>
                        <input type="text" class="form-control" name="rs_hp" id="rs_hp" aria-describedby=""
                            placeholder="" value="{{$rekmed->s_hp}}">
                    </div>

                    <div class="form-group">
                        <label for="rs_alamat">Alamat Suami</label>
                        <input type="text" class="form-control" name="rs_alamat" id="rs_alamat" aria-describedby=""
                            placeholder="" value="{{$rekmed->s_alamat}}">
                    </div>
                    @endif

                    @if ($rekmed->rek_status == 'anak')
                    {{-- profile orangtua --}}
                    <div class="form-group">
                        <label for="rp_ibu">Nama Ibu</label>
                        <input type="text" class="form-control" name="rp_ibu" id="rp_ibu" aria-describedby="rp_ibu"
                            value="{{$rekmed->p_ibu}}">
                    </div>

                    <div class="form-group">
                        <label for="rp_ibu_hp">No Telp Ibu</label>
                        <input type="text" class="form-control" name="rp_ibu_hp" id="rp_ibu_hp"
                            aria-describedby="rp_ibu_hp" value="{{$rekmed->p_ibu_hp}}">
                    </div>

                    <div class="form-group">
                        <label for="rp_ayah">Nama Ayah</label>
                        <input type="text" class="form-control" name="rp_ayah" id="rp_ayah" aria-describedby="rp_ayah"
                            value="{{$rekmed->p_bpk}}">
                    </div>

                    <div class="form-group">
                        <label for="rp_ayah_hp">No Telp Ayah</label>
                        <input type="text" class="form-control" name="rp_ayah_hp" id="rp_ayah_hp"
                            aria-describedby="rp_ayah_hp" value="{{$rekmed->p_bpk_hp}}">
                    </div>
                    @endif

                    <input type="submit" value="Simpan" class="btn btn-sm btn-primary">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection