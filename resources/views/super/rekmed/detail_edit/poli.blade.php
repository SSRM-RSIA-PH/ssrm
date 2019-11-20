@extends('layouts.main')
@section('content')

<div class="container">
    @if (session('status'))
    <div class="alert alert-success">
        {{session('status')}} <br>
        <a class="btn btn-primary" href="{{route('super.rekmed.show.poli', ['rek_id'=>$rek_id])}}">Back</a>
    </div>
    @endif

    {{-- deklarasi nilai --}}
    <div hidden>
        {{$usg = NULL}}
        {{$ctg = NULL}}
        {{$xray = NULL}}
        {{$ekg = NULL}}
        {{$lab = NULL}}
    </div>

    {{-- isi nilai untuk dipake edit dan delete dibawah --}}
    @foreach ($penunjang as $p)
        @switch($p->p_name)
            @case('usg')
                <div hidden>
                    {{$usg = $p}}
                </div>
                @break
            @case('ctg')
                <div hidden>
                    {{$ctg = $p}}
                </div>
                @break
            @case('xray')
                <div hidden>
                    {{$xray = $p}}
                </div>
                @break
            @case('ekg')
                <div hidden>
                    {{$ekg = $p}}
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

                    <form enctype="multipart/form-data" action="{{route('super.rekmed.poli.update', [
                        'rek_id'=>$rek_id,
                        'id'=>$poli->poli_id
                    ])}}" method="POST">
                        @csrf
                        <input type="hidden" value="PUT" name="_method">

                        <div class="col">
                            <div class="input-group pt-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Tanggal</span>
                                </div>
                                <div class="custom-file">
                                    <input value="{{str_replace(" ","T",$poli->poli_datetime)}}" name="date" type="datetime-local" class="form-control"
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
                                        <label class="custom-file-label" id="cfl1" for="cp">
                                            @if ($poli->poli_ctt_integ)
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
                                            @if ($poli->poli_resume)
                                            <strong>File Resume</strong>
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

                                    {{-- 1 --}}
                                    <div class="form-group">
                                        USG

                                        <div class="custom-file" id="fusg">
                                            <input type="file" class="custom-file-input" id="usg" name="usg">
                                            @if ($usg)
                                            <input type="hidden" name="id_usg" id="" value="{{$usg->id}}">
                                            <label class="custom-file-label" id="cflp1" for="usg"><strong>File
                                                    Penunjang</strong></label>
                                            @else
                                            <input type="hidden" name="id_usg" id="" value="">
                                            <label class="custom-file-label" id="cflp1" for="usg">Tidak ada File</label>
                                            @endif
                                        </div>
                                    </div>

                                    {{-- 2 --}}
                                    <div class="form-group">
                                        CTG

                                        <div class="custom-file" id="fctg">
                                            <input type="file" class="custom-file-input" id="ctg" name="ctg">
                                            @if ($ctg)
                                            <input type="hidden" name="id_ctg" id="" value="{{$ctg->id}}">
                                            <label class="custom-file-label" id="cflp2" for="ctg"><strong>File
                                                    Penunjang</strong></label>
                                            @else
                                            <input type="hidden" name="id_ctg" id="" value="">
                                            <label class="custom-file-label" id="cflp2" for="ctg">Tidak ada File</label>
                                            @endif
                                        </div>
                                    </div>

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

                                    {{-- 4 --}}
                                    <div class="form-group">
                                        EKG

                                        <div class="custom-file" id="fekg">
                                            <input type="file" class="custom-file-input" id="ekg" name="ekg">
                                            @if ($ekg)
                                            <input type="hidden" name="id_ekg" id="" value="{{$ekg->id}}">
                                            <label class="custom-file-label" id="cflp4" for="ekg"><strong>File
                                                    Penunjang</strong></label>
                                            @else
                                            <input type="hidden" name="id_ekg" id="" value="">
                                            <label class="custom-file-label" id="cflp4" for="ekg">Tidak ada File</label>
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
            @if ($poli->poli_ctt_integ)    
                <form onsubmit="return confirm('Delete permanently ?')" action="{{route('super.rekmed.destroy_detail', [
                        'id' => $poli->poli_id,
                        'ctg' => 'poli'
                    ])}}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">

                    <input type="hidden" name="field" value="poli_ctt_integ">
                    <input type="submit" class="btn btn-danger" value="Delete">
                </form>
            @endif

            <br><br><br><br>
            @if ($poli->poli_resume)    
                <form onsubmit="return confirm('Delete permanently ?')" action="{{route('super.rekmed.destroy_detail', [
                        'id' => $poli->poli_id,
                        'ctg' => 'poli'
                    ])}}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">

                    <input type="hidden" name="field" value="poli_resume">
                    <input type="submit" class="btn btn-danger" value="Delete">
                </form>
            @endif

            <br><br><br><br><br><br>
            @if ($usg)
                <form onsubmit="return confirm('Delete permanently ?')" action="{{route('super.rekmed.destroy_penunjang', [
                    'id' => $usg->id,
                    'ctg' => 'poli'
                ])}}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="DELETE">

                <input type="hidden" name="rek_id" value="{{$rek_id}}">
                <input type="hidden" name="id" value={{$poli->poli_id}}>
                <input type="submit" class="btn btn-danger" value="Delete">
                </form>
            @endif

            <br><br>
            @if ($ctg)
                <form onsubmit="return confirm('Delete permanently ?')" action="{{route('super.rekmed.destroy_penunjang', [
                    'id' => $ctg->id,
                    'ctg' => 'poli'
                ])}}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="DELETE">

                <input type="hidden" name="rek_id" value="{{$rek_id}}">
                <input type="hidden" name="id" value={{$poli->poli_id}}>
                <input type="submit" class="btn btn-danger" value="Delete">
                </form>
            @endif

            <br><br>
            @if ($xray)
                <form onsubmit="return confirm('Delete permanently ?')" action="{{route('super.rekmed.destroy_penunjang', [
                    'id' => $xray->id,
                    'ctg' => 'poli'
                ])}}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="DELETE">

                <input type="hidden" name="rek_id" value="{{$rek_id}}">
                <input type="hidden" name="id" value={{$poli->poli_id}}>
                <input type="submit" class="btn btn-danger" value="Delete">
                </form>
            @endif

            <br><br>
            @if ($ekg)
                <form onsubmit="return confirm('Delete permanently ?')" action="{{route('super.rekmed.destroy_penunjang', [
                    'id' => $ekg->id,
                    'ctg' => 'poli'
                ])}}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="DELETE">

                <input type="hidden" name="rek_id" value="{{$rek_id}}">
                <input type="hidden" name="id" value={{$poli->poli_id}}>
                <input type="submit" class="btn btn-danger" value="Delete">
                </form>
            @endif

            <br><br>
            @if ($lab)
                <form onsubmit="return confirm('Delete permanently ?')" action="{{route('super.rekmed.destroy_penunjang', [
                    'id' => $lab->id,
                    'ctg' => 'poli'
                ])}}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="DELETE">

                <input type="hidden" name="rek_id" value="{{$rek_id}}">
                <input type="hidden" name="id" value={{$poli->poli_id}}>
                <input type="submit" class="btn btn-danger" value="Delete">
                </form>
            @endif
        </div>
    </div>
</div>

@endsection