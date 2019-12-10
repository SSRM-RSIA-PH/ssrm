@extends('layouts.main')
@section('menu')
<a href="{{route('admin.index')}}" class="nav-item nav-link">Cari Pasien</a>
<a href="{{route('admin.show.rek', ['rek_id'=>$rek_id])}}" class="nav-item nav-link">{{$rek_id}}</a>
<a href="{{route('admin.create.igd', ['rek_id'=>$rek_id])}}" class="nav-item nav-link">IGD</a>
<a href="{{route('admin.create.poli', ['rek_id'=>$rek_id])}}" class="nav-item nav-link">POLI</a>
<a href="{{route('admin.create.nicu', ['rek_id'=>$rek_id])}}" class="nav-item nav-link">NICU</a>
<a href="{{route('admin.create.ri', ['rek_id'=>$rek_id])}}" class="nav-item nav-link">RAWAT INAP</a>
<a href="{{route('admin.create.arsip', ['rek_id'=>$rek_id])}}" class="nav-item nav-link active">ARSIP</a>
@endsection
@section('content')
<div class="container">

@if (session('status'))
<div class="alert alert-success">
    Berhasil menambahkan file Arsip <br>
</div>
@endif

    <div class="row">
        <div class="col-3">
            <div class="alert alert-primary text-center">{{$rek_id}}</div>
        </div>
        <div class="col-9">
            <div class="card mb-3">
                <div class="card-header">
                    Upload Arsip Tahunan
                </div>
                <div class="card-body">
                    <form action="{{route('admin.store.arsip')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <input type="text" name="rek_id" value="{{$rek_id}}" hidden>

                        <div class="col">
                            <div class="input-group pt-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Tanggal</span>
                                </div>
                                <div class="custom-file">
                                    <input name="date" type="datetime-local" class="form-control"
                                        style="border-top-left-radius:0px;border-bottom-left-radius:0px;" required
                                        autofocus>
                                </div>
                            </div>
                        </div><br>

                        <div class="col">
                            <div class="card mb-3">
                                <div class="card-header">
                                    File Arsip
                                </div>
                                <div class="card-body">
                                    <div class="custom-file">
                                        <label class="custom-file-label" id="cfl1" for="arsip">Choose file</label>
                                        <input type="file"
                                            class="custom-file-input {{$errors->first('arsip') ? 'is-invalid':''}}"
                                            value="{{old('arsip')}}" id="arsip" name="arsip" accept="application/zip">

                                        @if ($errors->first('arsip'))
                                        <div class="invalid-feedback">
                                            File harus berformat zip
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group mt-3">
                                <input type="submit" value="Simpan" class="btn btn-primary float-right">
                                <button type="reset" class="btn btn-danger float-right mr-2">Reset</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection