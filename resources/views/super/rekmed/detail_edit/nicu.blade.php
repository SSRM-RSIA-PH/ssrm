@extends('layouts.main')
@section('content')

<div class="container">
    @if (session('status'))
    <div class="alert alert-success">
        {{session('status')}} <br>
        <a class="btn btn-primary" href="{{route('super.rekmed.show.nicu', ['rek_id'=>$rek_id])}}">Back</a>
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

                    <form enctype="multipart/form-data" action="{{route('super.rekmed.nicu.update', [
                        'rek_id'=>$rek_id,
                        'id'=>$nicu->nicu_id
                    ])}}" method="POST">
                        @csrf
                        <input type="hidden" value="PUT" name="_method">

                        <div class="col">
                            <div class="input-group pt-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Tanggal</span>
                                </div>
                                <div class="custom-file">
                                    <input value="{{str_replace(" ","T",$nicu->nicu_datetime)}}" name="date" type="datetime-local" class="form-control"
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
                                    Catatan Perkembangan Terintegrasi
                                </div>
                                <div class="card-body" id="perkembangan">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="cp" name="cp">
                                        <label class="custom-file-label" id="cfl1" for="cp">
                                            @if ($nicu->nicu_ctt_integ)
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
                                            @if ($nicu->nicu_resume)
                                            <strong>File Resume</strong>
                                            @else
                                            Choose file
                                            @endif
                                        </label>
                                    </div>
                                </div>
                            </div>

                            {{-- pengkajian --}}
                            <div class="card mb-3">
                                <div class="card-header">
                                    Pengkajian Awal
                                </div>
                                <div class="card-body" id="pengkajian">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="rsm" name="pengkajian">
                                        <label class="custom-file-label" id="cfl2" for="rsm">
                                            @if ($nicu->nicu_pengkajian)
                                            <strong>File Pengkajian</strong>
                                            @else
                                            Choose file
                                            @endif
                                        </label>
                                    </div>
                                </div>
                            </div>

                            {{-- grafik --}}
                            <div class="card mb-3">
                                <div class="card-header">
                                    Grafik
                                </div>
                                <div class="card-body" id="grafik">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="rsm" name="grafik">
                                        <label class="custom-file-label" id="cfl2" for="rsm">
                                            @if ($nicu->nicu_grafik)
                                            <strong>File Grafik</strong>
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
                                            <label class="custom-file-label" id="cflp3" for="xray">Tidak ada
                                                File</label>
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
                                            <label class="custom-file-label" id="cflp5" for="lab">Tidak ada File</label>
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
            </div>
        </div>

        {{-- ini buat button delete --}}
        <div class="col-1">
            <br><br><br><br><br><br><br><br>
            @if ($nicu->nicu_ctt_integ)    
                <form onsubmit="return confirm('Delete permanently ?')" action="{{route('super.rekmed.destroy_detail', [
                        'id' => $nicu->nicu_id,
                        'ctg' => 'nicu'
                    ])}}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">

                    <input type="hidden" name="field" value="nicu_ctt_integ">
                    <input type="submit" class="btn btn-danger" value="Delete ctt   ">
                </form>
            @endif

            <br><br><br><br>
            @if ($nicu->nicu_resume)    
                <form onsubmit="return confirm('Delete permanently ?')" action="{{route('super.rekmed.destroy_detail', [
                        'id' => $nicu->nicu_id,
                        'ctg' => 'nicu'
                    ])}}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">

                    <input type="hidden" name="field" value="nicu_resume">
                    <input type="submit" class="btn btn-danger" value="Delete resume">
                </form>
            @endif

            @if ($nicu->nicu_pengkajian)    
                <form onsubmit="return confirm('Delete permanently ?')" action="{{route('super.rekmed.destroy_detail', [
                        'id' => $nicu->nicu_id,
                        'ctg' => 'nicu'
                    ])}}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">

                    <input type="hidden" name="field" value="nicu_pengkajian">
                    <input type="submit" class="btn btn-danger" value="Delete pengkajian">
                </form>
            @endif

            @if ($nicu->nicu_grafik)    
                <form onsubmit="return confirm('Delete permanently ?')" action="{{route('super.rekmed.destroy_detail', [
                        'id' => $nicu->nicu_id,
                        'ctg' => 'nicu'
                    ])}}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">

                    <input type="hidden" name="field" value="nicu_grafik">
                    <input type="submit" class="btn btn-danger" value="Delete grafik">
                </form>
            @endif

            <br><br>

            @if ($xray)
                <form onsubmit="return confirm('Delete permanently ?')" action="{{route('super.rekmed.destroy_penunjang', [
                    'id' => $xray->id,
                    'ctg' => 'nicu'
                ])}}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="DELETE">

                <input type="hidden" name="rek_id" value="{{$rek_id}}">
                <input type="hidden" name="id" value={{$nicu->nicu_id}}>
                <input type="submit" class="btn btn-danger" value="Delete xray">
                </form>
            @endif

            <br><br>
            @if ($lab)
                <form onsubmit="return confirm('Delete permanently ?')" action="{{route('super.rekmed.destroy_penunjang', [
                    'id' => $lab->id,
                    'ctg' => 'nicu'
                ])}}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="DELETE">

                <input type="hidden" name="rek_id" value="{{$rek_id}}">
                <input type="hidden" name="id" value={{$nicu->nicu_id}}>
                <input type="submit" class="btn btn-danger" value="Delete lab">
                </form>
            @endif
        </div>
    </div>
</div>

@endsection