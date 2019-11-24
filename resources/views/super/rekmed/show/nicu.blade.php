@extends('layouts.main')
@section('title') Show @endsection
@section('menu')
<a href="{{route('super.index')}}" class="nav-item nav-link">Dashboard</a>
<a href="{{route('super.rekmed')}}" class="nav-link">Rekam Medis</a>
<a href="{{route('super.rekmed.show', ['rek_id'=>$rek_id])}}" class="nav-link">{{$rek_id}}</a>
<a class="nav-link" href="{{route('super.rekmed.show.igd', ['rek_id'=>$rek_id])}}">IGD</a>
<a class="nav-link active" href="{{route('super.rekmed.show.nicu', ['rek_id'=>$rek_id])}}">NICU</a>
<a class="nav-link" href="{{route('super.rekmed.show.poli', ['rek_id'=>$rek_id])}}">POLI</a>
<a class="nav-link" href="{{route('super.rekmed.show.ri', ['rek_id'=>$rek_id])}}">RAWAT INAP</a>
@endsection
@section('content')
<table class="table table-bordered">
    <thead>
        <th>Tanggal Rekam Medis</th>
        <th>Kategori</th>
        <th>User</th>
        <th width="120px"></th>
    </thead>
    <tbody>
        @foreach ($nicu as $n)
        <tr>
            <td>{{$n->nicu_datetime}}</td>
            <td>NICU</td>
            <td>{{$n->user()->name}}</td>
            <td>
                <a href="{{route('super.rekmed.detail.nicu', [
                            'rek_id'=>$n->rek_id,
                            'id'=>$n->nicu_id
                        ])}}" class="btn btn-sm btn-info">View</a>
                <a href="{{route('super.rekmed.nicu.edit', [
                            'rek_id'=>$n->rek_id, 
                            'id'=>$n->nicu_id
                        ])}}" class="btn btn-sm btn-primary">Edit</a>
                <form class="d-inline" onsubmit="return confirm('Delete {{$n->nicu_datetime}} permanently ?')"
                    action="{{route('super.rekmed.destroy_ctg', [
                    'id'=>$n->nicu_id,
                    'ctg'=>'nicu'
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
{{$nicu->links()}}
@endsection