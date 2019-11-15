@extends('layouts.main')

@section('title')
List User
@endsection
@section('menu')
<a href="{{route('super.index')}}" class="nav-item nav-link">Dashboard</a>
<a class="nav-link" href="{{-- {{route('logupload')}} --}}">Log Upload</a>
<a class="nav-link active" href="{{route('user.index')}}">Manage Users</a>
<a class="nav-link" href="{{route('super.rekmed')}}">Manage Rekmed</a>
@endsection

@section('content')

<div class="row">
    <div class="col-6">
        <form action="{{route('user.index')}}">
            <div class="input-group mb-3">
                <select class="form-control col-md-10" name="filter">
                    <option value="">All</option>
                    <option value="SUPERVISOR" {{Request::get('filter') == 'SUPERVISOR' ? 'selected' : ''}}>Supervisor
                    </option>
                    <option value="ADMIN" {{Request::get('filter') == 'ADMIN' ? 'selected' : ''}}>Admin</option>
                    <option value="DOKTER" {{Request::get('filter') == 'DOKTER' ? 'selected' : ''}}>Dokter</option>
                </select>
                <div class="input-group-append">
                    <input type="submit" value="Filter" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>

    <div class="col-6 text-right">
        <a href="{{route('user.create')}}" class="btn btn-primary text-right">Add User</a>
    </div>
</div>

<table class="table table-bordered">
    <thead>
        <th>Name</th>
        {{-- <th><b>Username</b></th> --}}
        {{-- <th><b>Email</b></th> --}}
        <th>Hak Akses</th>
        <th style="width: 20%">Action</th>
    </thead>
    <tbody>
        @foreach ($users as $u)
        <tr>
            <td>{{$u->name}}</td>
            {{-- <td>{{$u->username}}</td> --}}
            {{-- <td>{{$u->email}}</td> --}}
            <td>{{$u->role}}</td>

            <td>
                <a href="{{route('user.show', ['id' => $u->id])}}" class="btn btn-primary btn-sm">Detail</a>
                <a class="btn btn-info text-white btn-sm" href="{{route('user.edit',['id'=> $u->id])}}">Edit</a>
                <form onsubmit="return confirm('Delete user {{$u->name}} permanently ?')" class="d-inline"
                    action="{{route('user.destroy', ['id' => $u->id ])}}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$users->appends(Request::all())->links()}}
@endsection