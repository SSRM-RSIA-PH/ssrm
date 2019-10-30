@extends("layouts.global")

@section("title") Create User @endsection

@section("content")
@if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
@endif

<form 
    class="bg-white shadow-sm p-3"
    enctype="multipart/form-data" 
    action="{{route('user.store')}}" 
    method="POST">

    @csrf
    <label for="email">Email</label>
    <input
        class="form-control"
        type="email"
        name="email"
        id="email"/>
    <br>

    <label for="name">Name</label>
    <input
        class="form-control"
        type="text"
        name="name"
        id="name"/>
    <br>
    
    <label for="username">Username</label>
    <input
        class="form-control"
        type="text"
        name="username"
        id="username"/>
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
    <input
        class="form-control"
        type="password"
        name="password"
        id="password"/>
    <br>
        
    <label for="password_confirmation">Password Confirmation</label>
    <input
        class="form-control"
        type="password"
        name="password_confirmation"
        id="password_confirmation"/>
    <br>
        
    <input
        class="btn btn-primary"
        type="submit"
        value="Save"/>
</form>
@endsection