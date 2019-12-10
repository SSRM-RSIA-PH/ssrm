@extends('layouts.super')
@section('title') Show @endsection
@section('menu')
<a href="{{route('super.index')}}" class="nav-item nav-link">Dashboard</a>
<a href="{{route('super.rekmed')}}" class="nav-link">Rekam Medis</a>
<a href="{{route('super.rekmed.show', ['rek_id'=>$rek_id])}}" class="nav-link">{{$rek_id}}</a>
<a class="nav-link" href="{{route('super.rekmed.show.igd', ['rek_id'=>$rek_id])}}">IGD</a>
<a class="nav-link" href="{{route('super.rekmed.show.nicu', ['rek_id'=>$rek_id])}}">NICU</a>
<a class="nav-link" href="{{route('super.rekmed.show.poli', ['rek_id'=>$rek_id])}}">POLI</a>
<a class="nav-link active" href="{{route('super.rekmed.show.ri', ['rek_id'=>$rek_id])}}">RAWAT INAP</a>
<a class="nav-link" href="{{route('super.show.arsip', ['rek_id'=>$rek_id])}}">ARSIP</a>

@endsection
@section('content')
<table class="table table-bordered">
    <thead>
        <th>Tanggal Rekam Medis</th>
        <th>Kategori</th>
        <th>User</th>
        <th width="200px"></th>
    </thead>
    <tbody>
        @foreach ($ri as $r)
        <tr>
            <td>{{$r->ri_datetime}}</td>
            <td>Rawat Inap</td>
            <td>{{$r->user()->name}}</td>
            <td>
                <a href="{{route('super.rekmed.detail.ri', [
                        'rek_id'=>$r->rek_id,
                        'id'=>$r->ri_id
                    ])}}" class="btn btn-sm btn-info">View</a>
                <a href="{{route('super.rekmed.ri.edit', [
                        'rek_id'=>$r->rek_id, 
                        'id'=>$r->ri_id
                    ])}}" class="btn btn-sm btn-primary">Edit</a>
                <form class="d-inline" onsubmit="return confirm('Delete {{$r->ri_datetime}} permanently ?')"
                    action="{{route('super.rekmed.destroy_ctg', [
                        'id'=>$r->ri_id,
                        'ctg'=>'ri'
                    ])}}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" value="Delete" class="btn btn-sm btn-danger">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$ri->links()}}
@endsection