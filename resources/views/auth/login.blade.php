@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default form-container flip">
                
                    <form class="login-form" role="form" method="POST" action="{{ route('login') }}">
                    <h3 class="title">Hola ;D</h3>
                        {{ csrf_field() }}
                      <div class="col-md-6">
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" id="username">
                                <input id="email" class="form-input" tooltip-class="username-tooltip" name="email" value="{{ old('email') }}" required autofocus placeholder="e-mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" style="height: 30px;">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}" id="password">
                                <input id="password" type="password" class="form-input" tooltip-class="password-tooltip" name="password" placeholder="password" required style="height: 30px;">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                              
                                <button onclick="clickListener();" class="login-button">Login</button>
                                
                                 <div class="checkbox">
                                    <label>
                                        <input class="remember-checkbox" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> <font color="white">Remember Me</font> 
                                    </label>
                                </div>
                                
                        </div>
                        </div>
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                    </form>
        </div>
    </div>
</div>
</div>
@endsection
