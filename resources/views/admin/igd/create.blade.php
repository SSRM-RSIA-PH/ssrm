@extends('layouts.admin')
@section('menu') 
<a href="{{route('admin.create.igd', ['rek_id'=>$rek_id])}}" class="nav-item nav-link">IGD</a>
@endsection
@section('title') Admin @endsection
@section('content')


<div class="container">
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
                                        style="border-top-left-radius:0px;border-bottom-left-radius:0px;">
                                </div>
                            </div>
                        </div><br>

                        <div class="col">
                            <input type="text" name="rek_id" value="{{$rek_id}}" hidden>
                            @if (Auth::user())
                            <input name="u_id" type="text" hidden value="{{Auth::user()->id}}">
                            @endif

                            {{-- catatan Perkembangan --}}
                            <div class="card mb-3">
                                <div class="card-header">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Catatan
                                            Perkembangan</label>
                                    </div>
                                </div>
                                <div class="card-body" hidden id="perkembangan">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="cp">
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
                                        <input type="file" class="custom-file-input" id="customFile" name="resume">
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
                                            <input type="file" class="custom-file-input" id="customFile" name="usg">
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
                                            <input type="file" class="custom-file-input" id="customFile" name="ctg">
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
                                            <input type="file" class="custom-file-input" id="customFile" name="xray">
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
                                            <input type="file" class="custom-file-input" id="customFile" name="ekg">
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
                                            <input type="file" class="custom-file-input" id="customFile" name="lab">
                                            <label class="custom-file-label" id="cflp5" for="customFile">Choose
                                                file</label>
                                        </div>
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