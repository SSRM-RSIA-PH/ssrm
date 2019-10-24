@extends('layouts.super')
@section('title') Log @endsection
@section('content')

<h4 class="h4">Log Upload</h4>
<hr>
<br><br>
<table class="table table-bordered table-hover">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>
                <button class="btn btn-primary">View</button>
                <input type="submit" class="btn btn-danger" value="Hapus">
            </td>
        </tr>
    </tbody>
</table>

@endsection