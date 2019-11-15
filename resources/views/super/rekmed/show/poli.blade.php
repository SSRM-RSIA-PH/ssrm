@extends('layouts.dokter')
@section('title') Show @endsection
@section('content')
<div class="container">
    {{$rek_id = $poli->first()->rek_id}} <br>
    <a class="btn btn-primary" href="{{route('super.rekmed.show.igd', ['rek_id'=>$rek_id])}}">IGD</a>
    <a class="btn btn-primary" href="{{route('super.rekmed.show.nicu', ['rek_id'=>$rek_id])}}">NICU</a>
    <a class="btn btn-primary" href="{{route('super.rekmed.show.poli', ['rek_id'=>$rek_id])}}">POLI</a>
    <a class="btn btn-primary" href="{{route('super.rekmed.show.ri', ['rek_id'=>$rek_id])}}">RAWAT INAP</a>
    <br><br>
    <table class="table table-bordered">
        <thead>
            <th>Tanggal Rekam Medis</th>
            <th>Kategori</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($poli as $p)
            <tr>
                <td>{{$p->poli_datetime}}</td>
                <td>Poli</td>
                <td>
                    <a href="{{route('super.rekmed.detail.poli', [
                            'rek_id'=>$p->rek_id,
                            'id'=>$p->poli_id
                        ])}}" class="btn btn-primary">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$poli->links()}}
</div>
@endsection