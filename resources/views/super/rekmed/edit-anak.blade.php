@extends('layouts.super')
@section('title')
Edit
@endsection
@section('menu')
<a href="{{route('super.index')}}" class="nav-item nav-link">Dashboard</a>
<a class="nav-link" href="{{route('super.rekmed')}}">Rekam Medis</a>
<a href="" class="nav-link active">Edit Rekam Medis</a>
@endsection
@section('content')
<div class="row d-flex justify-content-center">

    <div class="col-md-6" id="div2">
        <form action="{{route('super.rekmed.update-anak', ['rek_id'=>$rek_id])}}" method="POST">
            @csrf
            <input type="hidden" name="_method" value="PUT">

            @if (isset($anak1))
            <input type="hidden" name="id1" value="{{$anak1->ra_id}}">
            <div class="card">
                <div class="card-header">
                    <strong>Anak Ke-1</strong>
                </div>

                <div class="card-body" id="ba1">
                    <div class="form-group">
                        <label for="ra_name1">Nama Anak</label>
                        <input type="text" class="form-control" name="ra_name1" id="ra_name1" aria-describedby=""
                            placeholder="" value="{{$anak1->ra_name}}">
                    </div>

                    <div class="form-group">
                        <label for="ra_tempat_lahir1">Tempat Lahir Anak</label>
                        <input type="text" class="form-control" name="ra_tempat_lahir1" id="ra_tempat_lahir1"
                            aria-describedby="" placeholder="" value="{{$anak1->ra_tempat_lahir}}">
                    </div>

                    <div class="form-group">
                        <label for="ra_tanggal_lahir1">Tanggal Lahir Anak</label>
                        <input type="date" class="form-control" name="ra_tanggal_lahir1" id="ra_tanggal_lahir1"
                            aria-describedby="" placeholder="" value="{{$anak1->ra_tanggal_lahir}}">
                    </div>

                    <div class="form-group">
                        <label for="ra_darah1">Golongan Darah Anak</label>
                        <select class="form-control" name="ra_darah1" id="ra_darah1">
                            <option value="">Pilih</option>
                            <option value="A" {{$anak1->ra_darah == 'A' ? 'selected':''}}>A</option>
                            <option value="B" {{$anak1->ra_darah == 'B' ? 'selected':''}}>B</option>
                            <option value="AB" {{$anak1->ra_darah == 'AB' ? 'selected':''}}>AB</option>
                            <option value="O" {{$anak1->ra_darah == 'O' ? 'selected':''}}>O</option>
                        </select>
                    </div>
                </div>
            </div>
            <hr>
            @else
            <div class="card">
                <div class="card-header">
                    <strong>Anak Ke-1</strong>
                </div>

                <div class="card-body" id="ba1">
                    <div class="form-group">
                        <label for="ra_name1">Nama Anak</label>
                        <input type="text" class="form-control" name="ra_name1" id="ra_name1" aria-describedby=""
                            placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="ra_tempat_lahir1">Tempat Lahir Anak</label>
                        <input type="text" class="form-control" name="ra_tempat_lahir1" id="ra_tempat_lahir1"
                            aria-describedby="" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="ra_tanggal_lahir1">Tanggal Lahir Anak</label>
                        <input type="date" class="form-control" name="ra_tanggal_lahir1" id="ra_tanggal_lahir1"
                            aria-describedby="" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="ra_darah1">Golongan Darah Anak</label>
                        <select class="form-control" name="ra_darah1" id="ra_darah1">
                            <option value="">Pilih</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                        </select>
                    </div>
                </div>
            </div>
            <hr>
            @endif


            @if (isset($anak2))
            <input type="hidden" name="id2" value="{{$anak2->ra_id}}">
            <div class="card">
                <div class="card-header">
                    <strong>Anak Ke-2</strong>
                </div>

                <div class="card-body" id="ba1">
                    <div class="form-group">
                        <label for="ra_name2">Nama Anak</label>
                        <input type="text" class="form-control" name="ra_name2" id="ra_name2" aria-describedby=""
                            placeholder="" value="{{$anak2->ra_name}}">
                    </div>

                    <div class="form-group">
                        <label for="ra_tempat_lahir2">Tempat Lahir Anak</label>
                        <input type="text" class="form-control" name="ra_tempat_lahir2" id="ra_tempat_lahir2"
                            aria-describedby="" placeholder="" value="{{$anak2->ra_tempat_lahir}}">
                    </div>

                    <div class="form-group">
                        <label for="ra_tanggal_lahir2">Tanggal Lahir Anak</label>
                        <input type="date" class="form-control" name="ra_tanggal_lahir2" id="ra_tanggal_lahir2"
                            aria-describedby="" placeholder="" value="{{$anak2->ra_tanggal_lahir}}">
                    </div>

                    <div class="form-group">
                        <label for="ra_darah2">Golongan Darah Anak</label>
                        <select class="form-control" name="ra_darah2" id="ra_darah2">
                            <option value="">Pilih</option>
                            <option value="A" {{$anak2->ra_darah == 'A' ? 'selected':''}}>A</option>
                            <option value="B" {{$anak2->ra_darah == 'B' ? 'selected':''}}>B</option>
                            <option value="AB" {{$anak2->ra_darah == 'AB' ? 'selected':''}}>AB</option>
                            <option value="O" {{$anak2->ra_darah == 'O' ? 'selected':''}}>O</option>
                        </select>
                    </div>
                </div>
            </div>
            <hr>
            @else
            <div class="card">
                <div class="card-header">
                    <strong>Anak Ke-2</strong>
                </div>

                <div class="card-body" id="ba1">
                    <div class="form-group">
                        <label for="ra_name2">Nama Anak</label>
                        <input type="text" class="form-control" name="ra_name2" id="ra_name2" aria-describedby=""
                            placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="ra_tempat_lahir2">Tempat Lahir Anak</label>
                        <input type="text" class="form-control" name="ra_tempat_lahir2" id="ra_tempat_lahir2"
                            aria-describedby="" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="ra_tanggal_lahir2">Tanggal Lahir Anak</label>
                        <input type="date" class="form-control" name="ra_tanggal_lahir2" id="ra_tanggal_lahir2"
                            aria-describedby="" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="ra_darah2">Golongan Darah Anak</label>
                        <select class="form-control" name="ra_darah2" id="ra_darah2">
                            <option value="">Pilih</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                        </select>
                    </div>
                </div>
            </div>
            <hr>
            @endif


            @if (isset($anak3))
            <input type="hidden" name="id3" value="{{$anak3->ra_id}}">
            <div class="card">
                <div class="card-header">
                    <strong>Anak Ke-3</strong>
                </div>

                <div class="card-body" id="ba1">
                    <div class="form-group">
                        <label for="ra_name3">Nama Anak</label>
                        <input type="text" class="form-control" name="ra_name3" id="ra_name3" aria-describedby=""
                            placeholder="" value="{{$anak3->ra_name}}">
                    </div>

                    <div class="form-group">
                        <label for="ra_tempat_lahir3">Tempat Lahir Anak</label>
                        <input type="text" class="form-control" name="ra_tempat_lahir3" id="ra_tempat_lahir3"
                            aria-describedby="" placeholder="" value="{{$anak3->ra_tempat_lahir}}">
                    </div>

                    <div class="form-group">
                        <label for="ra_tanggal_lahir3">Tanggal Lahir Anak</label>
                        <input type="date" class="form-control" name="ra_tanggal_lahir3" id="ra_tanggal_lahir3"
                            aria-describedby="" placeholder="" value="{{$anak3->ra_tanggal_lahir}}">
                    </div>

                    <div class="form-group">
                        <label for="ra_darah3">Golongan Darah Anak</label>
                        <select class="form-control" name="ra_darah3" id="ra_darah3">
                            <option value="">Pilih</option>
                            <option value="A" {{$anak3->ra_darah == 'A' ? 'selected':''}}>A</option>
                            <option value="B" {{$anak3->ra_darah == 'B' ? 'selected':''}}>B</option>
                            <option value="AB" {{$anak3->ra_darah == 'AB' ? 'selected':''}}>AB</option>
                            <option value="O" {{$anak3->ra_darah == 'O' ? 'selected':''}}>O</option>
                        </select>
                    </div>
                </div>
            </div>
            <hr>
            @else
            <div class="card">
                <div class="card-header">
                    <strong>Anak Ke-3</strong>
                </div>

                <div class="card-body" id="ba1">
                    <div class="form-group">
                        <label for="ra_name3">Nama Anak</label>
                        <input type="text" class="form-control" name="ra_name3" id="ra_name3" aria-describedby=""
                            placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="ra_tempat_lahir3">Tempat Lahir Anak</label>
                        <input type="text" class="form-control" name="ra_tempat_lahir3" id="ra_tempat_lahir3"
                            aria-describedby="" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="ra_tanggal_lahir3">Tanggal Lahir Anak</label>
                        <input type="date" class="form-control" name="ra_tanggal_lahir3" id="ra_tanggal_lahir3"
                            aria-describedby="" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="ra_darah3">Golongan Darah Anak</label>
                        <select class="form-control" name="ra_darah3" id="ra_darah3">
                            <option value="">Pilih</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                        </select>
                    </div>
                </div>
            </div>
            <hr>
            @endif


            @if (isset($anak4))
            <input type="hidden" name="id4" value="{{$anak4->ra_id}}">
            <div class="card">
                <div class="card-header">
                    <strong>Anak Ke-4</strong>
                </div>

                <div class="card-body" id="ba1">
                    <div class="form-group">
                        <label for="ra_name4">Nama Anak</label>
                        <input type="text" class="form-control" name="ra_name4" id="ra_name4" aria-describedby=""
                            placeholder="" value="{{$anak4->ra_name}}">
                    </div>

                    <div class="form-group">
                        <label for="ra_tempat_lahir4">Tempat Lahir Anak</label>
                        <input type="text" class="form-control" name="ra_tempat_lahir4" id="ra_tempat_lahir4"
                            aria-describedby="" placeholder="" value="{{$anak4->ra_tempat_lahir}}">
                    </div>

                    <div class="form-group">
                        <label for="ra_tanggal_lahir4">Tanggal Lahir Anak</label>
                        <input type="date" class="form-control" name="ra_tanggal_lahir4" id="ra_tanggal_lahir4"
                            aria-describedby="" placeholder="" value="{{$anak4->ra_tanggal_lahir}}">
                    </div>

                    <div class="form-group">
                        <label for="ra_darah4">Golongan Darah Anak</label>
                        <select class="form-control" name="ra_darah4" id="ra_darah4">
                            <option value="">Pilih</option>
                            <option value="A" {{$anak4->ra_darah == 'A' ? 'selected':''}}>A</option>
                            <option value="B" {{$anak4->ra_darah == 'B' ? 'selected':''}}>B</option>
                            <option value="AB" {{$anak4->ra_darah == 'AB' ? 'selected':''}}>AB</option>
                            <option value="O" {{$anak4->ra_darah == 'O' ? 'selected':''}}>O</option>
                        </select>
                    </div>
                </div>
            </div>
            <hr>
            @else
            <div class="card">
                <div class="card-header">
                    <strong>Anak Ke-4</strong>
                </div>

                <div class="card-body" id="ba1">
                    <div class="form-group">
                        <label for="ra_name4">Nama Anak</label>
                        <input type="text" class="form-control" name="ra_name4" id="ra_name4" aria-describedby=""
                            placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="ra_tempat_lahir4">Tempat Lahir Anak</label>
                        <input type="text" class="form-control" name="ra_tempat_lahir4" id="ra_tempat_lahir4"
                            aria-describedby="" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="ra_tanggal_lahir4">Tanggal Lahir Anak</label>
                        <input type="date" class="form-control" name="ra_tanggal_lahir4" id="ra_tanggal_lahir4"
                            aria-describedby="" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="ra_darah4">Golongan Darah Anak</label>
                        <select class="form-control" name="ra_darah4" id="ra_darah4">
                            <option value="">Pilih</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                        </select>
                    </div>
                </div>
            </div>
            <hr>
            @endif


            @if (isset($anak5))
            <input type="hidden" name="id5" value="{{$anak5->ra_id}}">
            <div class="card">
                <div class="card-header">
                    <strong>Anak Ke-5</strong>
                </div>

                <div class="card-body" id="ba1">
                    <div class="form-group">
                        <label for="ra_name5">Nama Anak</label>
                        <input type="text" class="form-control" name="ra_name5" id="ra_name5" aria-describedby=""
                            placeholder="" value="{{$anak5->ra_name}}">
                    </div>

                    <div class="form-group">
                        <label for="ra_tempat_lahir5">Tempat Lahir Anak</label>
                        <input type="text" class="form-control" name="ra_tempat_lahir5" id="ra_tempat_lahir5"
                            aria-describedby="" placeholder="" value="{{$anak5->ra_tempat_lahir}}">
                    </div>

                    <div class="form-group">
                        <label for="ra_tanggal_lahir5">Tanggal Lahir Anak</label>
                        <input type="date" class="form-control" name="ra_tanggal_lahir5" id="ra_tanggal_lahir5"
                            aria-describedby="" placeholder="" value="{{$anak5->ra_tanggal_lahir}}">
                    </div>

                    <div class="form-group">
                        <label for="ra_darah5">Golongan Darah Anak</label>
                        <select class="form-control" name="ra_darah5" id="ra_darah5">
                            <option value="">Pilih</option>
                            <option value="A" {{$anak5->ra_darah == 'A' ? 'selected':''}}>A</option>
                            <option value="B" {{$anak5->ra_darah == 'B' ? 'selected':''}}>B</option>
                            <option value="AB" {{$anak5->ra_darah == 'AB' ? 'selected':''}}>AB</option>
                            <option value="O" {{$anak5->ra_darah == 'O' ? 'selected':''}}>O</option>
                        </select>
                    </div>
                </div>
            </div>
            <hr>
            @else
            <div class="card">
                <div class="card-header">
                    <strong>Anak Ke-5</strong>
                </div>

                <div class="card-body" id="ba1">
                    <div class="form-group">
                        <label for="ra_name5">Nama Anak</label>
                        <input type="text" class="form-control" name="ra_name5" id="ra_name5" aria-describedby=""
                            placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="ra_tempat_lahir5">Tempat Lahir Anak</label>
                        <input type="text" class="form-control" name="ra_tempat_lahir5" id="ra_tempat_lahir5"
                            aria-describedby="" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="ra_tanggal_lahir5">Tanggal Lahir Anak</label>
                        <input type="date" class="form-control" name="ra_tanggal_lahir5" id="ra_tanggal_lahir5"
                            aria-describedby="" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="ra_darah5">Golongan Darah Anak</label>
                        <select class="form-control" name="ra_darah5" id="ra_darah5">
                            <option value="">Pilih</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                        </select>
                    </div>
                </div>
            </div>
            <hr>
            @endif

            <div class="mt-3 mb-3">
                <input type="submit" value="Simpan" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>
@endsection
