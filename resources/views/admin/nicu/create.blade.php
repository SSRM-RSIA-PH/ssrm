@extends('layouts.main')
@section('menu')
<a href="{{route('admin.index')}}" class="nav-item nav-link">Dashboard</a>
<a href="{{route('admin.show.rek', ['rek_id'=>$rek_id])}}" class="nav-item nav-link">{{$rek_id}}</a>
<a href="{{route('admin.create.igd', ['rek_id'=>$rek_id])}}" class="nav-item nav-link">IGD</a>
<a href="{{route('admin.create.poli', ['rek_id'=>$rek_id])}}" class="nav-item nav-link">POLI</a>
<a href="{{route('admin.create.nicu', ['rek_id'=>$rek_id])}}" class="nav-item nav-link active">NICU</a>
<a href="{{route('admin.create.ri', ['rek_id'=>$rek_id])}}" class="nav-item nav-link">RAWAT INAP</a>
<a href="{{route('admin.create.arsip', ['rek_id'=>$rek_id])}}" class="nav-item nav-link">ARSIP</a>
@endsection
@section('title') Admin @endsection
@section('content')

<div class="container">
    @if (session('status'))
    <div class="alert alert-success">
        Berhasil ditambahkan <br>
        <a class="btn btn-primary" href="{{route('admin.validation.nicu', ['id'=>session('status')])}}">Check</a>
    </div>
    @endif

    <div class="row">
        <div class="col-3">
            <div class="alert alert-primary text-center">{{$rek_id}}</div>
        </div>
        <div class="col-9">
            <div class="card mb-3">
                <div class="card-header">
                    Upload Rekam Medis
                </div>
                <div class="card-body">

                    <form enctype="multipart/form-data" action="{{route('admin.store.nicu')}}" method="POST">
                        @csrf

                        <div class="input-group pt-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Tanggal</span>
                            </div>
                            <div class="custom-file">
                                <input name="date" type="datetime-local" class="form-control"
                                    style="border-top-left-radius:0px;border-bottom-left-radius:0px;" required autofocus>
                            </div>
                        </div><br>

                        <input type="text" name="rek_id" value="{{$rek_id}}" hidden>

                        {{-- catatan perkembangan terintegrasi --}}
                        <div class="card mb-3">
                            <div class="card-header">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1t">
                                    <label class="custom-control-label" for="customCheck1t">Catatan Perkembangan
                                        Terintegrasi</label>
                                </div>
                            </div>
                            <div class="card-body" hidden id="perkembangant">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="ct" name="ct" accept="application/pdf">
                                    <label class="custom-file-label" id="cflct" for="ct">Choose file</label>
                                </div>
                            </div>
                        </div>

                        {{-- resume --}}
                        <div class="card mb-3">
                            <div class="card-header">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                                    <label class="custom-control-label" for="customCheck2">Resume</label>
                                </div>
                            </div>
                            <div class="card-body" hidden id="resume">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="rsm" name="resume" accept="application/pdf">
                                    <label class="custom-file-label" id="cfl2" for="rsm">Choose file</label>
                                </div>
                            </div>
                        </div>

                        {{-- pengkajian awal --}}
                        <div class="card mb-3">
                            <div class="card-header">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheckpa">
                                    <label class="custom-control-label" for="customCheckpa">Pengkajian Awal</label>
                                </div>
                            </div>
                            <div class="card-body" hidden id="pa">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="cfpa" name="pengkajian" accept="application/pdf">
                                    <label class="custom-file-label" id="cflpa" for="cfpa">Choose file</label>
                                </div>
                            </div>
                        </div>

                        {{-- grafik perkembangan --}}
                        <div class="card mb-3">
                            <div class="card-header">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheckgp">
                                    <label class="custom-control-label" for="customCheckgp">Grafik Perkembangan</label>
                                </div>
                            </div>
                            <div class="card-body" hidden id="gp">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="cfgp" name="gp" accept="application/pdf">
                                    <label class="custom-file-label" id="cflgp" for="cfgp">Choose file</label>
                                </div>
                            </div>
                        </div>

                        {{-- penunjang --}}
                        <div class="card">
                            <div class="card-header">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck3">
                                    <label class="custom-control-label" for="customCheck3">Penunjang</label>
                                </div>
                            </div>
                            <div class="card-body" hidden id="penunjang">

                                {{-- 3 --}}
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="cxray">
                                        <label class="custom-control-label" for="cxray">X-RAY</label>
                                    </div>

                                    <div class="custom-file" hidden id="fxray">
                                        <input type="file" class="custom-file-input" id="xray" name="xray" accept="application/pdf">
                                        <label class="custom-file-label" id="cflp3" for="xray">Choose
                                            file</label>
                                    </div>
                                </div>

                                {{-- 5 --}}
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="clab">
                                        <label class="custom-control-label" for="clab">LAB</label>
                                    </div>

                                    <div class="custom-file" hidden id="flab">
                                        <input type="file" class="custom-file-input" id="lab" name="lab" accept="application/pdf">
                                        <label class="custom-file-label" id="cflp5" for="lab">Choose
                                            file</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <input type="submit" value="Simpan" class="btn btn-primary float-right">
                            <button type="reset" class="btn btn-danger float-right mr-2">Reset</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection