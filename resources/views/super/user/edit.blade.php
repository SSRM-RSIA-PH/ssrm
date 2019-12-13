@extends('layouts.super')

@section('title')
Edit User
@endsection
@section('menu')
<a href="{{route('super.index')}}" class="nav-item nav-link">Home</a>
<a class="nav-link" href="{{route('super.log')}}">Log Upload</a>
<a class="nav-link active" href="{{route('user.index')}}">Manage Users</a>
<a class="nav-link" href="{{route('super.rekmed')}}">Manage Rekmed</a>
@endsection

@section('content')
<div class="container">

    @if (session('status'))
    <div class="alert alert-success">
        User {{session('status')}} berhasil diedit
    </div>
    @endif

    <div class="col-md-8 mb-3">
        <a href="{{route('user.index')}}" class="btn btn-primary mb-3">Back</a>
        <div class="card">
            <div class="card-header">
                Edit User
            </div>
            <div class="card-body">
                <form action="{{route('user.update', ['id'=>$user->id])}}" method="POST">
                    @csrf
                    <input type="hidden" value="PUT" name="_method">

                    <label for="name">Name</label>
                    <input class="form-control {{$errors->first('name') ? 'is-invalid':''}}"
                        value="{{$user->name ? $user->name:old('name')}}" type="text" name="name" id="name" required />
                    @if ($errors->first('name'))
                    <div class="error-message">
                        {{$errors->first('name')}}
                    </div>
                    @endif
                    <br>

                    <label for="username">Username</label>
                    <input class="form-control {{$errors->first('username') ? 'is-invalid':''}}"
                        value="{{$user->username ? $user->username:old('username')}}" type="text" name="username"
                        id="username" required />
                    @if ($errors->first('username'))
                    <div class="error-message">
                        {{$errors->first('username')}}
                    </div>
                    @endif
                    <br>

                    <label for="email">Email</label>
                    <input class="form-control {{$errors->first('email') ? 'is-invalid':''}}"
                        value="{{$user->email ? $user->email:old('email')}}" type="email" name="email" id="email"
                        required readonly />
                    @if ($errors->first('email'))
                    <div class="error-message">
                        Email sudah terdaftar
                    </div>
                    @endif
                    <br>

                    <label for="role">Role</label>
                    <br>
                    <select name="role" id="role" class="form-control {{$errors->first('role') ? 'is-invalid':''}}">
                        <option value="DOKTER" {{$user->role == 'DOKTER' ? 'SELECTED':''}}>Dokter</option>
                        <option value="ADMIN" {{$user->role == 'ADMIN' ? 'SELECTED':''}}>Admin</option>
                        <option value="SUPERVISOR" {{$user->role == 'SUPERVISOR' ? 'SELECTED':''}}>Supervisor</option>
                    </select>
                    @if ($errors->first('role'))
                    <div class="error-message">
                        {{$errors->first('role')}}
                    </div>
                    @endif
                    <br>

                    <label for="password">Password</label>
                    <input class="form-control {{$errors->first('password') ? 'is-invalid':''}}"
                        value="{{old('password')}}" type="password" name="password" id="password" required />
                    @if ($errors->first('password'))
                    <div class="error-message">
                        {{$errors->first('password')}}
                    </div>
                    @endif
                    <br>

                    <label for="password_confirmation">Password Confirmation</label>
                    <input class="form-control {{$errors->first('password_confirmation') ? 'is-invalid':''}}"
                        value="{{old('password_confirmation')}}" type="password" name="password_confirmation"
                        id="password_confirmation" required />
                    @if ($errors->first('password_confirmation'))
                    <div class="error-message">
                        Password tidak sama
                    </div>
                    @endif
                    <br>
            </div>
            <div class="card-footer">
                <input type="submit" class="btn btn-primary" value="Simpan">
                <input type="reset" class="btn btn-danger" value="Reset">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection