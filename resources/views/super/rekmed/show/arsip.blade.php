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
        <th width="200px"></th>
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
                <form class="d-inline" onsubmit="return confirm('Delete Arsip {{$i->arsip_datetime}} permanen ?')"
                    action="{{route('super.rekmed.destroy_arsip_tahunan', ['id'=>$i->arsip_id])}}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<h3>Data tidak tersedia!</h3>
@endif
<div class="row ">
    <div class="col d-flex justify-content-center">
        {{$arsip->links()}}
    </div>
</div>
@endsection