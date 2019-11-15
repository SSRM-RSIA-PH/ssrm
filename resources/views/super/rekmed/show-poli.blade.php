@extends('layouts.main')

@section('title')
Detail User
@endsection
@section('menu')
<a class="nav-link" href="{{-- {{route('logupload')}} --}}">Log Upload</a>
<a class="nav-link" href="{{route('user.index')}}">Manage Users</a>
<a class="nav-link active" href="{{route('super.rekmed')}}">Manage Rekmed</a>
@endsection

@section('content')

@if ($detail->poli_ctt_integ)
<b>Catatan Terintegrasi</b><br>
<object data="{{asset("storage/$detail->poli_ctt_integ")}}" type="application/pdf" width="100%" height="700px"></object>
<br><br>
@endif

@if ($detail->poli_resume)
<b>Resume</b><br>
<object data="{{asset("storage/$detail->poli_resume")}}" type="application/pdf" width="100%" height="700px"></object>
<br><br>
@endif

@if ($detail->penunjang()== NULL)
<b>Penunjang</b><br>
@foreach ($detail->penunjang() as $p)
<p>{{$p->p_name}}</p>
<object data="{{asset("storage/$p->p_file")}}" type="application/pdf" width="100%" height="700px"></object>
@endforeach
@endif

<div class="col-md-8">
    <a href="{{route('super.rekmed')}}" class="btn btn-primary mb-3">Back</a>
    {{-- <div class="card">
        <div class="card-body">
        </div>
    </div> --}}
</div>
@endsection