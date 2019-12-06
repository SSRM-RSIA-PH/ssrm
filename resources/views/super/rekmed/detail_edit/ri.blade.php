@extends('layouts.main')
@section('title')
Edit Detail
@endsection
@section('menu')
<a href="{{route('super.index')}}" class="nav-item nav-link">Dashboard</a>
<a href="{{route('super.rekmed.show.ri', ['rek_id'=>$rek_id])}}" class="nav-link">Kembali</a>
@endsection
@section('content')

<div class="container">
    @if (session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif

    {{-- deklarasi nilai --}}
    <div hidden>
        {{$xray = NULL}}
        {{$lab = NULL}}
    </div>

    {{-- isi nilai untuk dipake edit dan delete dibawah --}}
    @foreach ($penunjang as $p)
    @switch($p->p_name)
    @case('xray')
    <div hidden>
        {{$xray = $p}}
    </div>
    @break
    @case('lab')
    <div hidden>
        {{$lab = $p}}
    </div>
    @break
    @default
    @endswitch
    @endforeach

    <div class="row">
        <div class="col-2">
            <div class="alert alert-primary text-center">{{$rek_id}}</div>
        </div>
        <div class="col-9">
            <div class="card mb-3">
                <div class="card-header">
                    Edit Rekam Medis {{$rek_id}}
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-11">
                            <form enctype="multipart/form-data" action="{{route('super.rekmed.ri.update', [
                                    'rek_id'=>$rek_id,
                                    'id'=>$ri->ri_id
                                ])}}" method="POST">
                                @csrf
                                <input type="hidden" value="PUT" name="_method">

                                <div class="col">
                                    <div class="input-group pt-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupFileAddon01">Tanggal</span>
                                        </div>
                                        <div class="custom-file">
                                            <input value="{{str_replace(" ","T",$ri->ri_datetime)}}" name="date"
                                                type="datetime-local" class="form-control"
                                                style="border-top-left-radius:0px;border-bottom-left-radius:0px;"
                                                autofocus>
                                        </div>
                                    </div>
                                </div><br>

                                <div class="col">
                                    <input type="text" name="rek_id" value="{{$rek_id}}" hidden>

                                    {{-- catatan Perkembangan --}}
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            Catatan Perkembangan Terintegrasi
                                        </div>
                                        <div class="card-body" id="perkembangan">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="cp" name="cp">
                                                <label class="custom-file-label" id="cfl1" for="cp">
                                                    @if ($ri->ri_ctt_integ)
                                                    <strong>File Catatan Perkembangan</strong>
                                                    @else
                                                    Choose file
                                                    @endif
                                                </label>
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
                                                <label class="custom-file-label" id="cfl2" for="rsm">
                                                    @if ($ri->ri_resume)
                                                    <strong>File Resume</strong>
                                                    @else
                                                    Choose file
                                                    @endif
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- catatan tindakan --}}
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            Catatan Operasi/Tindakan
                                        </div>
                                        <div class="card-body" id="cto">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="rsm" name="cto">
                                                <label class="custom-file-label" id="cfl2" for="rsm">
                                                    @if ($ri->ri_ctt_oper)
                                                    <strong>File Catatan Operasi/Tindakan</strong>
                                                    @else
                                                    Choose file
                                                    @endif
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- bayi --}}
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            Bayi
                                        </div>
                                        <div class="card-body" id="bayi">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="rsm" name="bayi">
                                                <label class="custom-file-label" id="cfl2" for="rsm">
                                                    @if ($ri->ri_bayi)
                                                    <strong>File Bayi</strong>
                                                    @else
                                                    Choose file
                                                    @endif
                                                </label>
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

                                            {{-- 3 --}}
                                            <div class="form-group">
                                                X-RAY

                                                <div class="custom-file" id="fxray">
                                                    <input type="file" class="custom-file-input" id="xray" name="xray">
                                                    @if ($xray)
                                                    <input type="hidden" name="id_xray" id="" value="{{$xray->id}}">
                                                    <label class="custom-file-label" id="cflp3" for="xray"><strong>File
                                                            Penunjang</strong></label>
                                                    @else
                                                    <input type="hidden" name="id_xray" id="" value="">
                                                    <label class="custom-file-label" id="cflp3" for="xray">Choose
                                                        file</label>
                                                    @endif
                                                </div>
                                            </div>

                                            {{-- 5 --}}
                                            <div class="form-group">
                                                LAB

                                                <div class="custom-file" id="flab">
                                                    <input type="file" class="custom-file-input" id="lab" name="lab">
                                                    @if ($lab)
                                                    <input type="hidden" name="id_lab" id="" value="{{$lab->id}}">
                                                    <label class="custom-file-label" id="cflp5" for="lab"><strong>File
                                                            Penunjang</strong></label>
                                                    @else
                                                    <input type="hidden" name="id_lab" id="" value="">
                                                    <label class="custom-file-label" id="cflp5" for="lab">Choose
                                                        file</label>
                                                    @endif
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

                        {{-- ini buat button delete --}}
                        <div class="col-1 pl-0">
                            <div class="row align-items-end" style="height:180px">
                                <div class="col pl-0">
                                    @if ($ri->ri_ctt_integ)
                                    <form
                                        onsubmit="return confirm('Delete Catatan Perkembangan Terintegrasi permanently ?')"
                                        action="{{route('super.rekmed.destroy_detail', [
                                    'id' => $ri->ri_id,
                                    'ctg' => 'ri'
                                ])}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">

                                        <input type="hidden" name="field" value="ri_ctt_integ">
                                        <input type="submit" class="btn btn-danger" value="Delete">
                                    </form>
                                    @endif
                                </div>
                            </div>

                            <div class="row align-items-end" style="height:145px">
                                <div class="col pl-0">
                                    @if ($ri->ri_resume)
                                    <form onsubmit="return confirm('Delete Resume permanently ?')" action="{{route('super.rekmed.destroy_detail', [
                                    'id' => $ri->ri_id,
                                    'ctg' => 'ri'
                                ])}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">

                                        <input type="hidden" name="field" value="ri_resume">
                                        <input type="submit" class="btn btn-danger" value="Delete">
                                    </form>
                                    @endif
                                </div>
                            </div>

                            <div class="row align-items-end" style="height:145px">
                                <div class="col pl-0">
                                    @if ($ri->ri_ctt_oper)
                                    <form onsubmit="return confirm('Delete Catatan Operasi/Tindakan permanently ?')"
                                        action="{{route('super.rekmed.destroy_detail', [
                                    'id' => $ri->ri_id,
                                    'ctg' => 'ri'
                                ])}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">

                                        <input type="hidden" name="field" value="ri_ctt_oper">
                                        <input type="submit" class="btn btn-danger" value="Delete">
                                    </form>
                                    @endif
                                </div>
                            </div>

                            <div class="row align-items-end" style="height:145px">
                                <div class="col pl-0">
                                    @if ($ri->ri_bayi)
                                    <form onsubmit="return confirm('Delete Bayi permanently ?')" action="{{route('super.rekmed.destroy_detail', [
                                    'id' => $ri->ri_id,
                                    'ctg' => 'ri'
                                ])}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">

                                        <input type="hidden" name="field" value="ri_bayi">
                                        <input type="submit" class="btn btn-danger" value="Delete">
                                    </form>
                                    @endif
                                </div>
                            </div>

                            <div class="row align-items-end" style="height:167px">
                                <div class="col pl-0">
                                    @if ($xray)
                                    <form onsubmit="return confirm('Delete XRAY permanently ?')" action="{{route('super.rekmed.destroy_penunjang', [
                                    'id' => $xray->id,
                                    'ctg' => 'ri'
                                ])}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">

                                        <input type="hidden" name="rek_id" value="{{$rek_id}}">
                                        <input type="hidden" name="id" value={{$ri->ri_id}}>
                                        <input type="submit" class="btn btn-danger" value="Delete">
                                    </form>
                                    @endif
                                </div>
                            </div>

                            <div class="row align-items-end" style="height:77px">
                                <div class="col pl-0">
                                    @if ($lab)
                                    <form onsubmit="return confirm('Delete LAB permanently ?')" action="{{route('super.rekmed.destroy_penunjang', [
                            'id' => $lab->id,
                            'ctg' => 'ri'
                        ])}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">

                                        <input type="hidden" name="rek_id" value="{{$rek_id}}">
                                        <input type="hidden" name="id" value={{$ri->ri_id}}>
                                        <input type="submit" class="btn btn-danger" value="Delete">
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- link back --}}
{{-- <a class="btn btn-primary" href="{{route('super.rekmed.show.nicu', ['rek_id'=>$rek_id])}}">Back</a> --}}