@extends('layouts.global')
@section('title') Admin @endsection
@section('content')

<div class="col-3">
    <div class="alert alert-primary text-center">[No RM]</div>
    <form action="">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Select</label>
            <select class="form-control" id="exampleFormControlSelect1">
                <option value="">Pilih..</option>
                <option value="">Catatan Perkembangan</option>
                <option value="">Resume</option>
            </select>
        </div>
        <div class="card mb-3">
            <div class="card-header">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" checked id="customCheck1">
                    <label class="custom-control-label" for="customCheck1">Penunjang</label>
                </div>
            </div>
            <div class="card-body" id="penunjang">
                <div class="form-group">
                    <select class="form-control" id="">
                        <option value="">Pilih..</option>
                        <option value="">USG</option>
                        <option value="">CTG</option>
                        <option value="">X-Ray</option>
                        <option value="">EKG</option>
                        <option value="">LAB</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" id="customFile" name="filename">
            <label class="custom-file-label" for="customFile">Choose file</label>
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