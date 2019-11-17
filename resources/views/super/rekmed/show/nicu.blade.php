@extends('layouts.main')
@section('title') Show @endsection
@section('menu')
<a href="" class="nav-link">{{$rek_id = $nicu->first()->rek_id}}</a>
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
        <th></th>
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
                        ])}}" class="btn btn-primary">View</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$nicu->links()}}
@endsection