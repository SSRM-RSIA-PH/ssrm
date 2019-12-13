@extends('layouts.main')
@section('menu')
<a href="{{route('admin.index')}}" class="nav-item nav-link">Cari Pasien</a>
<a href="{{route('admin.show.rek', ['rek_id'=>$rek_id])}}" class="nav-item nav-link">{{$rek_id}}</a>
<a href="{{route('admin.create.igd', ['rek_id'=>$rek_id])}}" class="nav-item nav-link active">IGD</a>
<a href="{{route('admin.create.poli', ['rek_id'=>$rek_id])}}" class="nav-item nav-link">POLI</a>
<a href="{{route('admin.create.nicu', ['rek_id'=>$rek_id])}}" class="nav-item nav-link">NICU</a>
<a href="{{route('admin.create.ri', ['rek_id'=>$rek_id])}}" class="nav-item nav-link">RAWAT INAP</a>
<a href="{{route('admin.create.arsip', ['rek_id'=>$rek_id])}}" class="nav-item nav-link">ARSIP</a>
@endsection
@section('content')

<div class="container">
    @if (session('status'))
    <div class="alert alert-success">
        Berhasil ditambahkan <br>
        <a class="btn btn-primary" href="{{route('admin.validation.igd', ['id'=>session('status')])}}">Check</a>
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

                    <form enctype="multipart/form-data" action="{{route('admin.store.igd')}}" method="POST">
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

                            {{-- catatan Perkembangan --}}
                            <div class="card mb-3">
                                <div class="card-header">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1"
                                            {{$errors->first('cp') ? 'CHECKED':''}}>
                                        <label class="custom-control-label" for="customCheck1">Catatan
                                            Perkembangan</label>
                                    </div>
                                </div>
                                <div class="card-body" hidden id="perkembangan">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="cp" name="cp"
                                            accept="application/pdf">
                                        <label class="custom-file-label" id="cfl1" for="cp">Choose file</label>
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
                                        <input type="file" class="custom-file-input" id="rsm" name="resume"
                                            accept="application/pdf">
                                        <label class="custom-file-label" id="cfl2" for="rsm">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{-- kolom 2 --}}
                        <div class="col">
                            {{-- penunjang --}}
                            <div class="card mb-3">
                                <div class="card-header">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck3">
                                        <label class="custom-control-label" for="customCheck3">Penunjang</label>
                                    </div>
                                </div>
                                <div class="card-body" {{$errors->first('resume') ? '':'hidden'}} id="penunjang">
                                    {{-- 1 --}}
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="cusg">
                                            <label class="custom-control-label" for="cusg">USG</label>
                                        </div>

                                        <div class="custom-file" hidden id="fusg">
                                            <input type="file" class="custom-file-input" id="usg" name="usg"
                                                accept="application/pdf">
                                            <label class="custom-file-label" id="cflp1" for="usg">Choose
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
                                            <input type="file" class="custom-file-input" id="ctg" name="ctg"
                                                accept="application/pdf">
                                            <label class="custom-file-label" id="cflp2" for="ctg">Choose
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
                                            <input type="file" class="custom-file-input" id="xray" name="xray"
                                                accept="application/pdf">
                                            <label class="custom-file-label" id="cflp3" for="xray">Choose
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
                                            <input type="file" class="custom-file-input" id="ekg" name="ekg"
                                                accept="application/pdf">
                                            <label class="custom-file-label" id="cflp4" for="ekg">Choose
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
                                            <input type="file" class="custom-file-input" id="lab" name="lab"
                                                accept="application/pdf">
                                            <label class="custom-file-label" id="cflp5" for="lab">Choose
                                                file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- file lengkap --}}
                        <div class="col">
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