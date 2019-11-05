@extends('layouts.admin')
@section('title') Admin @endsection
@section('content')
<div class="col-3">
    <div class="alert alert-primary text-center">{{$rek_id}}</div>
    <form action="">
        {{-- catatan Perkembangan --}}
        <div class="card mb-3">
            <div class="card-header">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                    <label class="custom-control-label" for="customCheck1">Catatan Perkembangan</label>
                </div>
            </div>
            <div class="card-body" hidden id="perkembangan">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="filename">
                    <label class="custom-file-label" id="cfl1" for="customFile">Choose file</label>
                </div>
            </div>
        </div>

        {{-- resume --}}
        <div class="card mb-3">
            <div class="card-header">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                    <label class="custom-control-label" id="cfl2" for="customCheck2">Resume</label>
                </div>
            </div>
            <div class="card-body" hidden id="resume">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="filename">
                    <label class="custom-file-label" id="cfl3" for="customFile">Choose file</label>
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
                {{-- 1 --}}
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="cusg">
                        <label class="custom-control-label" for="cusg">USG</label>
                    </div>

                    <div class="custom-file" hidden id="fusg">
                        <input type="file" class="custom-file-input" id="customFile" name="filename">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
                
                {{-- 2 --}}
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="cctg">
                        <label class="custom-control-label" for="cctg">CTG</label>
                    </div>

                    <div class="custom-file" hidden id="fctg">
                        <input type="file" class="custom-file-input" id="customFile" name="filename">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
                
                {{-- 3 --}}
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="cxray">
                        <label class="custom-control-label" for="cxray">X-RAY</label>
                    </div>

                    <div class="custom-file" hidden id="fxray">
                        <input type="file" class="custom-file-input" id="customFile" name="filename">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
                
                {{-- 4 --}}
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="cekg">
                        <label class="custom-control-label" for="cekg">EKG</label>
                    </div>

                    <div class="custom-file" hidden id="fekg">
                        <input type="file" class="custom-file-input" id="customFile" name="filename">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
                
                {{-- 5 --}}
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="clab">
                        <label class="custom-control-label" for="clab">LAB</label>
                    </div>

                    <div class="custom-file" hidden id="flab">
                        <input type="file" class="custom-file-input" id="customFile" name="filename">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="">Tanggal</label>
            <input type="datetime-local" class="form-control" name="" id="">
        </div>
        <input type="submit" value="Simpan" class="btn btn-primary float-right">
        <button type="reset" class="btn btn-danger float-right mr-2">Reset</button>
    </form>
</div>
<div class="col-9">
    <div class="card">
        <embed src="{{ asset('img/1.pdf') }}" type="application/pdf" width="100%" height="600px" />
    </div>
</div>
@endsection