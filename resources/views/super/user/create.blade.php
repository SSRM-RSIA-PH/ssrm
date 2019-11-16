@extends("layouts.main")

@section("title") Tambah User @endsection
@section('menu')
<a href="{{route('super.index')}}" class="nav-item nav-link">Dashboard</a>
<a class="nav-link" href="{{-- {{route('logupload')}} --}}">Log Upload</a>
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
        <div class="card">
            <div class="card-header">Tambah User</div>
            <div class="card-body">
                <form enctype="multipart/form-data" action="{{route('user.store')}}" method="POST">
                    @csrf
                    <label for="name">Name</label>
                    <input class="form-control" type="text" name="name" id="name" required />
                    <br>

                    <label for="username">Username</label>
                    <input class="form-control" type="text" name="username" id="username" required />
                    <br>

                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" id="email" required />
                    <br>

                    <label for="role">Role</label>
                    <br>
                    <select name="role" id="role" class="form-control">
                        <option value="SUPERVISOR">Supervisor</option>
                        <option value="ADMIN">Admin</option>
                        <option value="DOKTER">Dokter</option>
                    </select>
                    <br>

                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password" required />
                    <br>

                    <label for="password_confirmation">Password Confirmation</label>
                    <input class="form-control" type="password" name="password_confirmation" id="password_confirmation"
                        required />
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