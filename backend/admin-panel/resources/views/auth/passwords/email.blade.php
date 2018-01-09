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
            <h3 class="text-center txt-dark mb-10">Need help with your password?</h3>
            <h6 class="text-center txt-grey nonecase-font">Enter the email you use for Philbert, and we’ll help you create a new password.</h6>
        </div>	
        <div class="form-wrap">
            {!! Form::open(['url' => 'password.email']) !!}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label class="control-label mb-10">Email address</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="example@gmail.com" required>
                    
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <a href="{{ route('login') }}" class="btn btn-default"><i class="fa fa-fw fa-arrow-left"></i> Login</a>
                <button type="submit" class="btn btn-success mr-10">Send Password Reset Link</button>
            {!! Form::close() !!}
        </div>
    </div>	
</div>
@endsection
