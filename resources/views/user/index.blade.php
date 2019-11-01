@extends('layouts.global')

@section('title')
List User
@endsection

@section('content')
@if(session('status'))
<div class="alert alert-success">
    {{session('status')}}
</div>
@endif

<div class="row">
    <div class="col-md-6">
        <form action="{{route('user.index')}}">
            <div class="input-group mb-3">
                <select class="form-control col-md-10" name="keyword">
                    <option value="">All</option>
                    <option value="SUPERVISOR" {{Request::get('keyword') == 'SUPERVISOR' ? 'selected' : ''}}>Supervisor</option>
                    <option value="ADMIN" {{Request::get('keyword') == 'ADMIN' ? 'selected' : ''}}>Admin</option>
                    <option value="DOKTER" {{Request::get('keyword') == 'DOKTER' ? 'selected' : ''}}>Dokter</option>
                </select>
                <div class="input-group-append">
                    <input type="submit" value="Filter" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-4"></div>
    <div class="col-md-2">
        <div class="col-md-12 text-right">
            <a href="{{route('user.create')}}" class="btn btn-primary">Add User</a>
        </div>
    </div>
</div>

<table class="table table-bordered">
    <thead>
        <th><b>Name</b></th>
        {{-- <th><b>Username</b></th> --}}
        {{-- <th><b>Email</b></th> --}}
        <th><b>Hak Akses</b></th>
        <th><b>Action</b></th>
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
    <tfoot>
        <tr>
            <td colspan=10>
                {{$users->appends(Request::all())->links()}}
            </td>
        </tr>
    </tfoot>
</table>
@endsection