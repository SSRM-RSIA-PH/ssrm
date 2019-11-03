@extends('layouts.super')
@section('title') Log @endsection
@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-header">
            Log Upload
        </div>
        <div class="card-body">

            <table class="table table-hover">
                <thead>
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
        </div>
    </div>
</div>

@endsection