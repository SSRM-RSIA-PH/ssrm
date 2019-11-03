@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="card bg-white border">
                {{-- <div class="card-header bg-transparent border-0">{{ __('Login') }}</div> --}}
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    @if(session()->has('login_error'))
                    <div class="alert alert-success">
                        {{ session()->get('login_error') }}
                    </div>
                    @endif

                    <div class="form-group row{{ $errors->has('identity') ? ' has-error' : '' }}">
                        <label for="identity" class="col-md-12 control-label">Email or Username</label>

                        <div class="col-md-12">
                            <input id="identity" type="identity" class="form-control" name="identity" value="{{ old('identity') }}" autofocus>

                            @if ($errors->has('identity'))
                            <span class="help-block">
                                <strong>{{ $errors->first('identity') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">Password</label>

                        <div class="col-md-12">
                            <input id="password" type="password" class="form-control" name="password">

                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="checkbox">                                
                                    <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label for="remember">{{ __('Remember Me') }}</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <button type="submit" class="btn-block btn btn-primary">
                                Login
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection