@extends('layouts.main')
@section('title') Show @endsection
@section('content')
@section('menu')
{{-- <a href="" class="nav-link">{{$rek_id = $igd->first()->rek_id}}</a> --}}
<a class="nav-link" href="{{route('super.rekmed.show.igd', ['rek_id'=>$rek_id])}}">IGD</a>
<a class="nav-link" href="{{route('super.rekmed.show.nicu', ['rek_id'=>$rek_id])}}">NICU</a>
<a class="nav-link" href="{{route('super.rekmed.show.poli', ['rek_id'=>$rek_id])}}">POLI</a>
<a class="nav-link" href="{{route('super.rekmed.show.ri', ['rek_id'=>$rek_id])}}">RAWAT INAP</a>
@endsection
<div class="container">

    <table class="table table-bordered">
        <thead>
            <th>Tanggal Rekam Medis</th>
            <th>Kategori</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($igd as $i)
            <tr>
                <td>{{$i->igd_datetime}}</td>
                <td>IGD</td>
                <td>
                    <a href="{{route('super.rekmed.detail.igd', [
                            'rek_id'=>$i->rek_id, 
                            'id'=>$i->igd_id
                        ])}}" class="btn btn-primary">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$igd->links()}}
</div>
@endsection