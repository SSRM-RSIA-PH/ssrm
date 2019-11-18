@extends('layouts.main')
@section('content')

<div class="container">
    @if (session('status'))
    <div class="alert alert-success">
        {{session('status')}} <br>
        <a class="btn btn-primary" href="{{route('super.rekmed.show.igd', ['rek_id'=>$rek_id])}}">Back</a>
    </div>
    @endif

    <div class="row">
        <div class="col-3">
            <div class="alert alert-primary text-center">{{$rek_id}}</div>
        </div>
        <div class="col-9">
            <div class="card mb-3">
                <div class="card-header">
                    Edit Rekam Medis {{$rek_id}}
                </div>
                <div class="card-body">

                    <form enctype="multipart/form-data" action="{{route('super.rekmed.igd.update', [
                        'rek_id'=>$rek_id,
                        'id'=>$id
                    ])}}" method="POST">
                        @csrf
                        <input type="hidden" value="PUT" name="_method">

                        <div class="col">
                            <div class="input-group pt-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Tanggal</span>
                                </div>
                                <div class="custom-file">
                                    <input name="date" type="datetime-local" class="form-control"
                                        style="border-top-left-radius:0px;border-bottom-left-radius:0px;" autofocus>
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
                                    Catatan Perkembangan
                                </div>
                                <div class="card-body" id="perkembangan">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="cp" name="cp">
                                        <label class="custom-file-label" id="cfl1" for="cp">Choose file</label>
                                    </div>
                                </div>
                            </div>

                            {{-- resume --}}
                            <div class="card mb-3">
                                <div class="card-header">
                                    Resume
                                </div>
                                <div class="card-body" id="resume">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="rsm" name="resume">
                                        <label class="custom-file-label" id="cfl2" for="rsm">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{-- kolom 2 --}}
                        <div class="col">
                            {{-- penunjang --}}
                            <div class="card">
                                <div class="card-header">
                                    Penunjang
                                </div>
                                <div class="card-body" id="penunjang">
                                    {{-- 1 --}}
                                    <div class="form-group">
                                        USG

                                        <div class="custom-file" id="fusg">
                                            <input type="file" class="custom-file-input" id="usg" name="usg">
                                            <label class="custom-file-label" id="cflp1" for="usg">Choose
                                                file</label>
                                        </div>
                                    </div>

                                    {{-- 2 --}}
                                    <div class="form-group">
                                        CTG

                                        <div class="custom-file" id="fctg">
                                            <input type="file" class="custom-file-input" id="ctg" name="ctg">
                                            <label class="custom-file-label" id="cflp2" for="ctg">Choose
                                                file</label>
                                        </div>
                                    </div>

                                    {{-- 3 --}}
                                    <div class="form-group">
                                        X-RAY

                                        <div class="custom-file" id="fxray">
                                            <input type="file" class="custom-file-input" id="xray" name="xray">
                                            <label class="custom-file-label" id="cflp3" for="xray">Choose
                                                file</label>
                                        </div>
                                    </div>

                                    {{-- 4 --}}
                                    <div class="form-group">
                                        EKG

                                        <div class="custom-file" id="fekg">
                                            <input type="file" class="custom-file-input" id="ekg" name="ekg">
                                            <label class="custom-file-label" id="cflp4" for="ekg">Choose
                                                file</label>
                                        </div>
                                    </div>

                                    {{-- 5 --}}
                                    <div class="form-group">
                                        LAB

                                        <div class="custom-file" id="flab">
                                            <input type="file" class="custom-file-input" id="lab" name="lab">
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
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection