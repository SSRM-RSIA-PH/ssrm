@extends('layouts.main')
@section('menu')
<a href="{{route('admin.index')}}" class="nav-item nav-link">Cari Pasien</a>
<a href="{{route('admin.show.rek', ['rek_id'=>$rek_id])}}" class="nav-item nav-link">{{$rek_id}}</a>
<a href="{{route('admin.create.igd', ['rek_id'=>$rek_id])}}" class="nav-item nav-link">IGD</a>
<a href="{{route('admin.create.poli', ['rek_id'=>$rek_id])}}" class="nav-item nav-link active">POLI</a>
<a href="{{route('admin.create.nicu', ['rek_id'=>$rek_id])}}" class="nav-item nav-link">NICU</a>
<a href="{{route('admin.create.ri', ['rek_id'=>$rek_id])}}" class="nav-item nav-link">RAWAT INAP</a>
<a href="{{route('admin.create.arsip', ['rek_id'=>$rek_id])}}" class="nav-item nav-link">ARSIP</a>
@endsection
@section('title') Admin @endsection
@section('content')

<div class="container">
    @if ($errors->count() > 0)
    <div class="alert alert-danger">
        @if ($errors->first('ct'))
        File pdf pada <strong>Catatan Perkembangan</strong> tidak valid <br>
        @endif
        @if ($errors->first('resume'))
        File pdf pada <strong>Resume</strong> tidak valid <br>
        @endif
        @if ($errors->first('usg'))
        File pdf pada <strong>USG</strong> tidak valid <br>
        @endif
        @if ($errors->first('ctg'))
        File pdf pada <strong>CTG</strong> tidak valid <br>
        @endif
        @if ($errors->first('ekg'))
        File pdf pada <strong>EKG</strong> tidak valid <br>
        @endif
        @if ($errors->first('lab'))
        File pdf pada <strong>LAB</strong> tidak valid <br>
        @endif
        @if ($errors->first('xray'))
        File pdf pada <strong>X-RAY</strong> tidak valid <br>
        @endif
        @if ($errors->first('fl'))
        File pdf pada <strong>File Lengkap</strong> tidak valid <br>
        @endif
    </div>
    @endif

    @if (session('status'))
    <div class="alert alert-success">
        Berhasil ditambahkan <br>
        <a class="btn btn-primary" href="{{route('admin.validation.poli', ['id'=>session('status')])}}">Check</a>
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

                    <form enctype="multipart/form-data" action="{{route('admin.store.poli')}}" method="POST">
                        @csrf

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

                            @if ($errors->first('date'))
                            <div class="error-message">
                                Masukkan Tanggal dengan format <strong>YYYY-MM-DD HH-mm</strong> <br>
                                atau gunakan <strong>Browser Google Chrome</strong>
                            </div>
                            @endif
                        </div><br>

                        <div class="col">
                            <input type="text" name="rek_id" value="{{$rek_id}}" hidden>

                            {{-- catatan terintegrasi --}}
                            <div class="card mb-3">
                                <div class="card-header">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Catatan
                                            Terintegrasi</label>
                                    </div>
                                </div>
                                <div class="card-body" hidden id="perkembangan">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="ct"
                                            accept="application/pdf">
                                        <label class="custom-file-label" id="cfl1" for="customFile">Choose file</label>
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
                                        <input type="file" class="custom-file-input" id="customFile" name="resume"
                                            accept="application/pdf">
                                        <label class="custom-file-label" id="cfl2" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{-- kolom 2 --}}
                        <div class="col">
                            {{-- penunjang --}}
                            <div class="card">
                                <div class="card-header">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck3">
                                        <label class="custom-control-label" for="customCheck3">Penunjang</label>
                                    </div>
                                </div>
                                <div class="card-body" hidden id="penunjang">
                                    {{-- 1 --}}
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="cusg">
                                            <label class="custom-control-label" for="cusg">USG</label>
                                        </div>

                                        <div class="custom-file" hidden id="fusg">
                                            <input type="file" class="custom-file-input" id="customFile" name="usg"
                                                accept="application/pdf">
                                            <label class="custom-file-label" id="cflp1" for="customFile">Choose
                                                file</label>
                                        </div>
                                    </div>

                                    {{-- 2 --}}
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="cctg">
                                            <label class="custom-control-label" for="cctg">CTG</label>
                                        </div>

                                        <div class="custom-file" hidden id="fctg">
                                            <input type="file" class="custom-file-input" id="customFile" name="ctg"
                                                accept="application/pdf">
                                            <label class="custom-file-label" id="cflp2" for="customFile">Choose
                                                file</label>
                                        </div>
                                    </div>

                                    {{-- 3 --}}
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="cxray">
                                            <label class="custom-control-label" for="cxray">X-RAY</label>
                                        </div>

                                        <div class="custom-file" hidden id="fxray">
                                            <input type="file" class="custom-file-input" id="customFile" name="xray"
                                                accept="application/pdf">
                                            <label class="custom-file-label" id="cflp3" for="customFile">Choose
                                                file</label>
                                        </div>
                                    </div>

                                    {{-- 4 --}}
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="cekg">
                                            <label class="custom-control-label" for="cekg">EKG</label>
                                        </div>

                                        <div class="custom-file" hidden id="fekg">
                                            <input type="file" class="custom-file-input" id="customFile" name="ekg"
                                                accept="application/pdf">
                                            <label class="custom-file-label" id="cflp4" for="customFile">Choose
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
                                            <input type="file" class="custom-file-input" id="customFile" name="lab"
                                                accept="application/pdf">
                                            <label class="custom-file-label" id="cflp5" for="customFile">Choose
                                                file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- file lengkap --}}
                            <br>
                            <div class="card mb-3">
                                <div class="card-header">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck4">
                                        <label class="custom-control-label" for="customCheck4">File Lengkap</label>
                                    </div>
                                </div>
                                <div class="card-body" hidden id="filelengkap">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="fl" name="fl"
                                            accept="application/pdf">
                                        <label class="custom-file-label" id="cfl2" for="fl">Choose file</label>
                                    </div>
                                </div>
                            </div>

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