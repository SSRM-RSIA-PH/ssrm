@extends('layouts.main')
@section('title') Show @endsection
@section('menu')
<a href="{{route('dokter.index')}}" class="nav-item nav-link">Cari Pasien</a>
<a class="nav-item nav-link" href="{{route('dokter.show', ['rek_id'=>$rek_id])}}">{{$rek_id}}</a>
<a class="nav-link" href="{{route('dokter.show.igd', ['rek_id'=>$rek_id])}}">IGD</a>
<a class="nav-link active" href="{{route('dokter.show.nicu', ['rek_id'=>$rek_id])}}">NICU</a>
<a class="nav-link" href="{{route('dokter.show.poli', ['rek_id'=>$rek_id])}}">POLI</a>
<a class="nav-link" href="{{route('dokter.show.ri', ['rek_id'=>$rek_id])}}">RAWAT INAP</a>
<a class="nav-link" href="{{route('dokter.show.arsip', ['rek_id'=>$rek_id])}}">ARSIP</a>

@endsection
@section('pasien')
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#pasienProfile">
    {{$rekmed->rek_name}} ({{$rekmed->rek_id}})
</button>
@endsection
@section('content')
<div hidden>{{$check = $nicu->first()}}</div>

@if (isset($check))
<table class="table table-bordered">
    <thead>
        <th>Tanggal Rekam Medis</th>
        <th width="100px"></th>
    </thead>
    <tbody>
        @foreach ($nicu as $n)
        <tr>
            <td>{{$n->nicu_datetime}}</td>
            <td>
                <a href="{{route('dokter.detail.nicu', [
                            'rek_id'=>$n->rek_id,
                            'id'=>$n->nicu_id,
                            'ctg'=>'c'
                        ])}}" class="btn btn-info btn-sm">View</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="row ">
    <div class="col d-flex justify-content-center">
        {{$nicu->links()}}
    </div>
</div>
@else
<h3>Data tidak tersedia!</h3>
@endif
@endsection