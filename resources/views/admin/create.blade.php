@extends('layouts.admin')
@section('title') Admin @endsection
@section('content')

<div class="container">
    <h4 class="h4">Input Data Baru Rekam Medis</h4>
    <hr>
    <div class="col-md-6">
        <form action="">
            <div class="form-group">
                <label for="">No Rekam Medis</label>
                <input type="number" class="form-control" placeholder="No Rekam Medis">
            </div>
            <div class="form-group">
                <label for="">Nama Pasien</label>
                <input type="text" class="form-control" placeholder="Nama Pasien">
            </div>
            <input type="submit" value="Simpan" class="btn btn-primary float-right">
            <button type="reset" class="btn btn-danger float-right mr-2">Reset</button>
        </form>
    </div>
</div>

@endsection