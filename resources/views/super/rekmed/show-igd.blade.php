@extends('layouts.user')

@section('title')
Detail User
@endsection

@section('content')

@if ($detail->igd_ctt_perkembangan)    
<b>Catatan Perkembangan</b><br>
<object data="{{asset("storage/$detail->igd_ctt_perkembangan")}}" type="application/pdf" width="100%" height="700px"></object>
<br><br>
@endif

@if ($detail->igd_resum)   
<b>Resume</b><br>
<object data="{{asset("storage/e")}}" type="application/pdf" width="100%" height="700px"></object>
<br><br>
@endif

<b>Penunjang</b><br>
@foreach ($detail->penunjang() as $p)
<p>{{$p->p_name}}</p>
<object data="{{asset("storage/$p->p_file")}}" type="application/pdf" width="100%" height="700px"></object>
@endforeach

<div class="col-md-8">
    <a href="{{route('super.rekmed')}}" class="btn btn-primary mb-3">Back</a>
    <div class="card">
        <div class="card-body">
        </div>
    </div>
</div>
@endsection