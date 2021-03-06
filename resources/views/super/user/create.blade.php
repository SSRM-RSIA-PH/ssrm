@extends("layouts.super")

@section("title") Tambah User @endsection
@section('menu')
<a href="{{route('super.index')}}" class="nav-item nav-link">Home</a>
<a class="nav-link" href="{{route('super.log')}}">Log Upload</a>
<a class="nav-link active" href="{{route('user.index')}}">Manage Users</a>
<a class="nav-link" href="{{route('super.rekmed')}}">Manage Rekmed</a>
@endsection
@section("content")
<div class="row d-flex justify-content-center">
    <div class="col-md-8 mb-3">
        @if (session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
        @endif
        <a href="{{route('user.index')}}" class="btn btn-primary mb-3">Kembali</a>
        <div class="card">
            <div class="card-header">Tambah User</div>
            <div class="card-body">
                <form enctype="multipart/form-data" action="{{route('user.store')}}" method="POST">
                    @csrf
                    <label for="name">Name</label>
                    <input class="form-control {{$errors->first('name') ? 'is-invalid':''}}" value="{{old('name')}}"
                        type="text" name="name" id="name" required />
                    @if ($errors->first('name'))
                    <div class="invalid-feedback">
                        {{$errors->first('name')}}
                    </div>
                    @endif
                    <br>

                    <label for="username">Username</label>
                    <input class="form-control {{$errors->first('username') ? 'is-invalid':''}}"
                        value="{{old('username')}}" type="text" name="username" id="username" required />
                    @if ($errors->first('username'))
                    <div class="invalid-feedback">
                        {{$errors->first('username')}}
                    </div>
                    @endif
                    <br>

                    <label for="email">Email</label>
                    <input class="form-control {{$errors->first('email') ? 'is-invalid':''}}" value="{{old('email')}}"
                        type="email" name="email" id="email" required />
                    @if ($errors->first('email'))
                    <div class="invalid-feedback">
                        {{$errors->first('email')}}
                    </div>
                    @endif
                    <br>

                    <label for="role">Role</label>
                    <br>
                    <select name="role" id="role" class="form-control {{$errors->first('role') ? 'is-invalid':''}}">
                        <option value=" DOKTER">Dokter</option>
                        <option value="ADMIN">Admin</option>
                        <option value="SUPERVISOR">Supervisor</option>
                    </select>
                    @if ($errors->first('role'))
                    <div class="invalid-feedback">
                        {{$errors->first('role')}}
                    </div>
                    @endif
                    <br>

                    <label for="password">Password</label>
                    <input class="form-control {{$errors->first('password') ? 'is-invalid':''}}"
                        value="{{old('password')}}" type="password" name="password" id="password" required />
                    @if ($errors->first('password'))
                    <div class="invalid-feedback">
                        {{$errors->first('password')}}
                    </div>
                    @endif
                    <br>

                    <label for="password_confirmation">Password Confirmation</label>
                    <input class="form-control {{$errors->first('password_confirmation') ? 'is-invalid':''}}"
                        value="{{old('password_confirmation')}}" type="password" name="password_confirmation"
                        id="password_confirmation" required />
                    @if ($errors->first('password_confirmation'))
                    <div class="invalid-feedback">
                        {{$errors->first('password_confirmation')}}
                    </div>
                    @endif
                    <br>
            </div>
            <div class="card-footer">
                <input class="btn btn-primary" type="submit" value="Simpan" />
                <button type="reset" class="btn btn-danger">Reset</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection