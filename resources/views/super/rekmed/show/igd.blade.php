@extends('layouts.main')
@section('title') Show @endsection
@section('menu')
<a href="{{route('super.index')}}" class="nav-item nav-link">Dashboard</a>
<a href="{{route('super.rekmed')}}" class="nav-link">Rekam Medis</a>
<a href="{{route('super.rekmed.show', ['rek_id'=>$rek_id])}}" class="nav-link">{{$rek_id}}</a>
<a class="nav-link active" href="{{route('super.rekmed.show.igd', ['rek_id'=>$rek_id])}}">IGD</a>
<a class="nav-link" href="{{route('super.rekmed.show.nicu', ['rek_id'=>$rek_id])}}">NICU</a>
<a class="nav-link" href="{{route('super.rekmed.show.poli', ['rek_id'=>$rek_id])}}">POLI</a>
<a class="nav-link" href="{{route('super.rekmed.show.ri', ['rek_id'=>$rek_id])}}">RAWAT INAP</a>
@endsection
@section('content')
<div class="container">
    <table class="table table-bordered">
        <thead>
            <th>Tanggal Rekam Medis</th>
            <th>Kategori</th>
            <th>User</th>
            <th width="150px"></th>
        </thead>
        <tbody>
            @foreach ($igd as $i)
            <tr>
                <td>{{$i->igd_datetime}}</td>
                <td>IGD</td>
                <td>{{$i->user()->name}}</td>
                <td>
                    <a href="{{route('super.rekmed.detail.igd', [
                            'rek_id'=>$i->rek_id, 
                            'id'=>$i->igd_id
                        ])}}" class="btn btn-info">View</a>
                    <a href="{{route('super.rekmed.igd.edit', [
                        'rek_id'=>$i->rek_id, 
                        'id'=>$i->igd_id
                    ])}}" class="btn btn-primary">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$igd->links()}}
</div>
@endsection