@extends('layouts.main')
@section('title') Show @endsection
@section('menu')
<a href="{{route('dokter.index')}}" class="nav-item nav-link">Dashboard</a>
<a class="nav-item nav-link" href="{{route('dokter.show', ['rek_id'=>$rek_id])}}">{{$rek_id}}</a>
<a class="nav-link" href="{{route('dokter.show.igd', ['rek_id'=>$rek_id])}}">IGD</a>
<a class="nav-link active" href="{{route('dokter.show.nicu', ['rek_id'=>$rek_id])}}">NICU</a>
<a class="nav-link" href="{{route('dokter.show.poli', ['rek_id'=>$rek_id])}}">POLI</a>
<a class="nav-link" href="{{route('dokter.show.ri', ['rek_id'=>$rek_id])}}">RAWAT INAP</a>
@endsection
@section('content')

    <table class="table table-bordered">
        <thead>
            <th>Tanggal Rekam Medis</th>
            <th width="100px">Action</th>
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
    {{$nicu->links()}}

@endsection