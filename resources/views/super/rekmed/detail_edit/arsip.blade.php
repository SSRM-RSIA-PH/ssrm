@extends('layouts.super')
@section('title')
Edit Arsip Tahunan
@endsection
@section('menu')
<a href="{{route('super.index')}}" class="nav-link">Dashboard</a>
<a href="{{route('super.show.arsip', ['rek_id'=>$rek_id])}}" class="nav-link">Kembali</a>
@endsection
@section('content')
<div class="container">

    @if (session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif

    <div class="row">
        <div class="col-3">
            <div class="alert alert-primary text-center">{{$rek_id}}</div>
        </div>
        <div class="col-9">
            <div class="card mb-3">
                <div class="card-header">
                    Arsip Tahunan
                </div>
                <div class="card-body">
                    <form action="{{route('super.rekmed.arsip.update', ['rek_id'=>$rek_id, 'id'=>$arsip->arsip_id])}}"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        <input type="hidden" value="PUT" name="_method">
                        <input type="hidden" value="{{$arsip->arsip_id}}" name="id">

                        <div class="col">
                            <div class="input-group pt-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Tanggal</span>
                                </div>
                                <div class="custom-file">
                                    <input name="date" type="datetime-local" class="form-control"
                                        style="border-top-left-radius:0px;border-bottom-left-radius:0px;" required
                                        value="{{str_replace(" ","T",$arsip->arsip_datetime)}}">
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
                            <div class="card mb-3">
                                <div class="card-header">
                                    Arsip Tahunan
                                </div>
                                <div class="card-body" id="perkembangan">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="arsip_file" name="arsip_file">
                                        <label class="custom-file-label" id="cfl1" for="arsip_file">
                                            @if ($arsip->arsip_file)
                                            <strong>File Arsip Tahunan</strong>
                                            @else
                                            Choose file
                                            @endif
                                        </label>
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