@extends('layouts.main')

@section('title')
Detail Rekmed
@endsection
@section('menu')
<a class="nav-link" href="{{-- {{route('logupload')}} --}}">Log Upload</a>
<a class="nav-link" href="{{route('user.index')}}">Manage Users</a>
<a class="nav-link active" href="{{route('super.rekmed')}}">Manage Rekmed</a>
@endsection

@section('content')
@if(session('status'))
<div class="alert alert-success">
    {{session('status')}}
</div>
@endif

<table class="table table-bordered">
    <thead>
        <th>Tanggal Rekam Medis</th>
        <th>Kategori</th>
        <th>User</th>
        <th>Upload Date</th>
        <th width="100px">Action</th>
    </thead>
    <tbody>
        @foreach ($igd as $i)
        <tr>
            <td>{{$i->igd_datetime}}</td>
            <td>IGD</td>
            <td>{{$i->user()->name}}</td>
            <td>{{$i->created_at}}</td>
            <td>
                <form action="{{route('super.rekmed.showdetail', [
                    'id'=>$i->rek_id, 
                    'ctg'=>'IGD', 
                    'id_ctg'=>$i->igd_id
                ])}}" method="POST">
                    @csrf
                    <input type="submit" class="btn btn-primary" value="View Detail">
                </form>
            </td>
        </tr>
        @endforeach

        @foreach ($nicu as $n)
        <tr>
            <td>{{$n->nicu_datetime}}</td>
            <td>NICU</td>
            <td>{{$n->user()->name}}</td>
            <td>{{$n->created_at}}</td>
            <td>
                <form action="{{route('super.rekmed.showdetail', [
                        'id'=>$n->rek_id, 
                        'ctg'=>'NICU', 
                        'id_ctg'=>$n->nicu_id
                    ])}}" method="POST">
                    @csrf
                    <input type="submit" class="btn btn-primary" value="View Detail">
                </form>
            </td>
        </tr>
        @endforeach

        @foreach ($poli as $p)
        <tr>
            <td>{{$p->poli_datetime}}</td>
            <td>Poli</td>
            <td>{{$p->user()->name}}</td>
            <td>{{$p->created_at}}</td>
            <td>
                <form action="{{route('super.rekmed.showdetail', [
                        'id'=>$p->rek_id, 
                        'ctg'=>'POLI', 
                        'id_ctg'=>$p->poli_id
                    ])}}" method="POST">
                    @csrf
                    <input type="submit" class="btn btn-primary" value="View Detail">
                </form>
            </td>
        </tr>
        @endforeach

        @foreach ($ri as $r)
        <tr>
            <td>{{$r->ri_datetime}}</td>
            <td>Rawat Inap</td>
            <td>{{$r->user()->name}}</td>
            <td>{{$r->created_at}}</td>
            <td>
                <form action="{{route('super.rekmed.showdetail', [
                        'id'=>$r->rek_id, 
                        'ctg'=>'RI', 
                        'id_ctg'=>$r->ri_id
                    ])}}" method="POST">
                    @csrf
                    <input type="submit" class="btn btn-primary" value="View Detail">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection