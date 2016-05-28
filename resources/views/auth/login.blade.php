@extends('layouts.backend.single')

@section('content')
<div class="container">
    <form class="form-auth" role="form" method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}
        <h2 class="form-auth-heading">Login</h2>
        <div class="form-auth-wrap">
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="email" class="form-control" name="email" placeholder="Email Address" value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" class="form-control" placeholder="Password" name="password">
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <label><input type="checkbox" name="remember"> Remember Me</label>
            <a class="pull-right" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
            <button type="submit" class="btn btn-primary form-control">
                <i class="fa fa-btn fa-sign-in"></i>Login
            </button>
        </div>
    </form>
</div>
@endsection
