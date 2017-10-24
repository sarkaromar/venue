@extends('layouts.auth')

@section('auth-content')
<div class="row">
    <div class="col-sm-12 col-xs-12">
        <div class="mb-30">
            <a href="{{ url('/register') }}"><h3 class="text-center txt-dark mb-10">Sign up to Project Name</h3></a>
            <h6 class="text-center nonecase-font txt-grey">Enter your details below</h6>
            @if(Session::has('error'))
            <!-- error notice -->
            <br />
            <div class="alert alert-danger alert-dismissable alert-style-1">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="zmdi zmdi-block"></i>{{Session('error')}} 
            </div>
            @endif
        </div>	
        <div class="form-wrap">
            {!! Form::open(['url' => 'register/store']) !!}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label class="control-label mb-10">Username</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="username" required autofocus>
                    @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label class="control-label mb-10">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="example@gmail.com" required>
                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label class="pull-left control-label mb-10">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="password" required>
                    @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label class="pull-left control-label mb-10">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" placeholder="confirm password" required>
                </div>
                <a href="{{ url('/login') }}" class="btn btn-default"><i class="fa fa-fw fa-arrow-left"></i> Login</a>
                <button type="submit" class="btn btn-success mr-10">Register</button>
            {!! Form::close() !!}
        </div>
    </div>	
</div>
@endsection
