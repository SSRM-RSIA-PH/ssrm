@extends('layouts.main')
@section('title') Show @endsection
@section('menu')
<a href="{{route('super.index')}}" class="nav-item nav-link">Dashboard</a>
<a href="" class="nav-link">{{$rek_id = $igd->first()->rek_id}}</a>
<a class="nav-link" href="{{route('super.rekmed.show.igd', ['rek_id'=>$rek_id])}}">IGD</a>
<a class="nav-link" href="{{route('super.rekmed.show.nicu', ['rek_id'=>$rek_id])}}">NICU</a>
<a class="nav-link" href="{{route('super.rekmed.show.poli', ['rek_id'=>$rek_id])}}">POLI</a>
<a class="nav-link active" href="{{route('super.rekmed.show.ri', ['rek_id'=>$rek_id])}}">RAWAT INAP</a>
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
            @foreach ($ri as $r)
            <tr>
                <td>{{$r->ri_datetime}}</td>
                <td>Rawat Inap</td>
                <td>{{$r->user()->name}}</td>
                <td>
                    <a href="{{route('super.rekmed.detail.ri', [
                            'rek_id'=>$r->rek_id,
                            'id'=>$r->ri_id
                        ])}}" class="btn btn-primary">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$ri->links()}}
@endsection