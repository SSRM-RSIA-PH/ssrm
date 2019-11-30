@extends('layouts.main')
@section('title')
    Log
@endsection
@section('menu')
<a href="{{route('super.index')}}" class="nav-item nav-link">Dashboard</a>
<a class="nav-link active" href="{{route('super.log')}}">Log Upload</a>
<a class="nav-link" href="{{route('user.index')}}">Manage Users</a>
<a class="nav-link" href="{{route('super.rekmed')}}">Rekam Medis</a>
@endsection

@section('content')
    <div class="container">
        <table class="table table-bordered">
            <tr>
                <th>Tanggal</th>
                <th>User</th>
                <th>Note</th>
                <th>Rekam Medis ID</th>
                <th>Kategori</th>
                <th></th>
            </tr>
            @foreach ($logs as $log)
                <tr>
                    <td>{{$log->created_at}}</td>
                    <td>{{$log->user()->name}}</td>
                    <td>{{$log->log_do}}</td>
                    <td>{{$log->rek_id}}</td>
                    <td>{{strtoupper($log->ctg)}}</td>
                    <th>
                        @if ($log->id_ctg)
                            <a href="{{route("super.rekmed.detail.$log->ctg", [
                                'rek_id'=>$log->rek_id,
                                'id'=>$log->id_ctg
                            ])}}" class="btn btn-primary btn-sm">View</a>
                            </th>
                        @else
                            <a href="" class="btn btn-sm btn-danger">Deleted</a>
                        @endif
                </tr>
            @endforeach
        </table>
    </div>
@endsection