@extends('layouts.super')
@section('title') Show @endsection
@section('menu')
<a href="{{route('super.index')}}" class="nav-item nav-link">Dashboard</a>
<a href="{{route('super.rekmed')}}" class="nav-link">Rekam Medis</a>
<a href="{{route('super.rekmed.show', ['rek_id'=>$rek_id])}}" class="nav-link">{{$rek_id}}</a>
<a class="nav-link" href="{{route('super.rekmed.show.igd', ['rek_id'=>$rek_id])}}">IGD</a>
<a class="nav-link" href="{{route('super.rekmed.show.nicu', ['rek_id'=>$rek_id])}}">NICU</a>
<a class="nav-link" href="{{route('super.rekmed.show.poli', ['rek_id'=>$rek_id])}}">POLI</a>
<a class="nav-link" href="{{route('super.rekmed.show.ri', ['rek_id'=>$rek_id])}}">RAWAT INAP</a>
<a class="nav-link active" href="{{route('super.show.arsip', ['rek_id'=>$rek_id])}}">ARSIP</a>
@endsection

@section('content')
<div hidden>{{$check = $arsip->first()}}</div>

@if (isset($check))
<table class="table table-bordered">
    <thead>
        <th>Tanggal Rekam Medis</th>
        <th width="100px"></th>
    </thead>
    <tbody>
        @foreach ($arsip as $i)
        <tr>
            <td>{{$i->arsip_datetime}}</td>
            <td>
                <a href="{{route('download.arsip-tahunan', ['id_arsip'=>$i->arsip_id])}}"
                    class="btn btn-info btn-sm">Simpan</a>
                <a href="{{route('super.rekmed.arsip.edit', ['rek_id'=>$rek_id, 'id'=>$i->arsip_id])}}"
                    class="btn btn-primary btn-sm">Edit</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<h3>Data tidak tersedia!</h3>
@endif
{{$arsip->links()}}
@endsection