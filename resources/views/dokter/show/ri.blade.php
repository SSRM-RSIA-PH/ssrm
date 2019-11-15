@extends('layouts.main')
@section('title') Show @endsection
@section('menu')
{{$rek_id = $igd->first()->rek_id}} <br>
<a class="nav-link" href="{{route('dokter.show.igd', ['rek_id'=>$rek_id])}}">IGD</a>
<a class="nav-link" href="{{route('dokter.show.nicu', ['rek_id'=>$rek_id])}}">NICU</a>
<a class="nav-link" href="{{route('dokter.show.poli', ['rek_id'=>$rek_id])}}">POLI</a>
<a class="nav-link active" href="{{route('dokter.show.ri', ['rek_id'=>$rek_id])}}">RAWAT INAP</a>
@endsection
@section('content')

    <table class="table table-bordered">
        <thead>
            <th>Tanggal Rekam Medis</th>
            <th>Kategori</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($ri as $r)
            <tr>
                <td>{{$r->ri_datetime}}</td>
                <td>Rawat Inap</td>
                <td>
                    <a href="{{route('dokter.detail.ri', [
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