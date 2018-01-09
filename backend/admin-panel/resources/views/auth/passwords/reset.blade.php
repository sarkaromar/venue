@extends('layouts.auth')

@section('auth-content')
<div class="row">
    <div class="col-sm-12 col-xs-12">
        <div class="sp-logo-wrap text-center pa-0 mb-30">
            <a href="{{ url('/') }}">
                <img class="brand-img mr-10" src="dist/img/logo.png" alt="brand"/>
                <span class="brand-text">{{ config('app.name', 'Laravel') }}</span>
            </a>
        </div>
        <div class="mb-30">
            <h3 class="text-center txt-dark mb-10">Reset Password</h3>
        </div>	
        <div class="form-wrap">
            {!! Form::open(['url' => 'password.request']) !!}
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label class="pull-left control-label mb-10">Email address</label>
                    <input type="email" class="form-control" name="email" value="{{ $email or old('email') }}" placeholder="example@gmail.com" required autofocus>
                    
                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label class="pull-left control-label mb-10">New Password</label>
                    <input type="password" class="form-control" name="password" placeholder="password" required>
                    
                    @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label class="pull-left control-label mb-10">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" placeholder="confirm password" required>
                    
                    @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-info btn-success btn-rounded">Reset Password</button>
            {!! Form::close() !!}
        </div>
    </div>	
</div>
@endsection
