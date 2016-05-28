@extends('layouts.backend.single')

<!-- Main Content -->
@section('content')
<div class="container">
    <form class="form-auth" role="form" method="POST" action="{{ url('/password/email') }}">
        {{ csrf_field() }}
        <h2 class="panel-heading">Reset Password</h2>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="form-auth-wrap">
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary form-control">
                <i class="fa fa-btn fa-envelope"></i>Send Password Reset Link
            </button>
        </div>
    </form>
</div>
@endsection
