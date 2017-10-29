@extends('layouts.auth')

@section('auth-content')
<div class="row">
    <div class="col-sm-12 col-xs-12">
        <div class="mb-30">
            <a href="{{ url('/') }}"><h3 class="text-center txt-dark mb-10">Log in to Project Name</h3></a>
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
            {!! Form::open(['url' => 'login/check']) !!}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label class="control-label mb-10">Email address</label>
                <input type="email" class="form-control" name="email" placeholder="example@gmail.com" required autofocus>
                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label class="pull-left control-label mb-10">Password</label>
                <a class="capitalize-font txt-primary block mb-10 pull-right font-12" href="">forgot password ?</a>
                <div class="clearfix"></div>
                <input type="password" class="form-control" name="password" placeholder="password" required>
                @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group">
                <div class="checkbox checkbox-primary pr-10 pull-left">
                    <input name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                           <label for="checkbox_2"> Keep me logged in</label>
                </div>
                <div class="clearfix"></div>
            </div>
            <!--<a href="{{ url('/register') }}" class="btn btn-default"><i class="fa fa-fw fa-arrow-left"></i> Register</a>-->
            <button type="submit" class="btn btn-success mr-10">Login</button>
            {!! Form::close() !!}
        </div>
    </div>	
</div>
@stop