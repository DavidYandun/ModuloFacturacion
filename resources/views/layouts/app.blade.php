<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script type="{{asset('js/jquery-2.1.4.js')}}"></script>
     
    <script type="{{asset('js/app.js')}}"></script>

    @stack('scripts')
   
    

 creacionfactura
    <style>
        body {
  background: rgba(6, 41, 61, 1);
}

.container {
  width: 100%;
  height: 100%;
}

.form-container {
  display: block;
  margin: 100px auto 0 auto;
  width: 400px;
  perspective: 1000;
}

.login-form {
  background: rgba(0, 90, 120, 0.7);
  border: 4px solid rgba(0, 90, 120, 0.9);
  border-radius: 8px;
}
.register-form {
  background: rgba(0, 90, 120, 0.7);
  border: 4px solid rgba(0, 90, 120, 0.9);
  border-radius: 8px;
}

.title {
  background: rgba(0, 90, 120, 0.9);
  color: #fff;
  font-family: 'Nunito', sans-serif;
  font-weight: normal;
  font-size: 2em;
  padding: 10px 10px 10px 20px;
  margin-top: 0;
  margin-bottom: 15px;
}

.form-input {
  padding: 5px;
  min-width: 50%;
  height: 20px;
  border-radius: 4px;
  border: none;
  font-family: 'Nunito', sans-serif;
  font-weight: normal;
}

textarea:focus, input:focus, button:focus {
    outline: 0;
}

.tooltip {
  width: 35%;
  background: rgba(6, 41, 61, 1);
  font-size: 0.8em;
  color: #fff;
  font-family: 'Nunito', sans-serif;
  font-weight: normal;
  margin-left: 10px;
  padding: 7px;
  border-radius: 5px;
}

.form-group {
  padding: 10px 10px 10px 20px;
}

.login-button {
  width: 100px;
  height: 30px;
  margin-bottom: 10px;
  
  border: none;
  border-radius: 4px;
  background-size: 500% 100%;
  background: rgba(6, 41, 61, 1);
  box-shadow: inset 0 0 0 0 rgba(20, 196, 148, 1);
    -webkit-transition: all ease 0.3s;
    -moz-transition: all ease 0.3s;
    transition: all ease 0.3s;
  
  color: #fff;
  font-family: 'Nunito', sans-serif;
  font-weight: 500;
  font-size: 0.8em;
}

.login-button:hover {
  box-shadow: inset 0 40px 0 0 rgba(20, 196, 148, 1);
}

.remember-checkbox {
  display: inline;
  position: relative;
  margin-left: 30px;
}

.remember-p {
  display: inline;
  position: relative;
  margin-left: 5px;
    color: #fff;
  font-family: 'Nunito', sans-serif;
  font-weight: 500;
  font-size: 0.8em;
}

.loading {
    background: rgba(0, 90, 120, 0.7);
  border: 4px solid rgba(0, 90, 120, 0.9);
  border-radius: 8px;
  -webkit-transform: rotateY(-180deg);
          transform: rotateY(-180deg);
}

.login-form,
.loading {
  position: absolute;
  width: 400px;
  height: 240px;
  -webkit-backface-visibility: hidden;
          backface-visibility: hidden;
  -webkit-transition: -webkit-transform 2s;
          transition: transform 2s;
}

.loading-spinner-large {
  margin-left: 130px;
  margin-top: 55px;
  font-size: 10px;
  position: fixed;
  text-align: center;
  display: none;
  border-top: 10px solid rgba(255, 255, 255, 0.2);
  border-right: 10px solid rgba(255, 255, 255, 0.2);
  border-bottom: 10px solid rgba(255, 255, 255, 0.2);
  border-left: 10px solid rgba(20, 196, 148, 1);
  -webkit-transform: translateZ(0);
  -ms-transform: translateZ(0);
  transform: translateZ(0);
  -webkit-animation: spin-clockwise 1.1s infinite linear;
  animation: spin-clockwise 1.1s infinite linear;
}
.loading-spinner-small {
  margin-left: 160px;
  margin-top: 85px;
  font-size: 10px;
  position: fixed;
  text-align: center;
  display: none;
  border-top: 10px solid rgba(255, 255, 255, 0.2);
  border-right: 10px solid rgba(255, 255, 255, 0.2);
  border-bottom: 10px solid rgba(255, 255, 255, 0.2);
  border-left: 10px solid rgba(20, 196, 148, 1);
  -webkit-transform: translateZ(0);
  -ms-transform: translateZ(0);
  transform: translateZ(0);
  -webkit-animation: spin-counter-clockwise 1.1s infinite linear;
  animation: spin-counter-clockwise 1.1s infinite linear;
}

.loading-spinner-large,
.loading-spinner-large:after {
  border-radius: 50%;
  width: 120px;
  height: 120px;
}

.loading-spinner-small,
.loading-spinner-small:after {
  border-radius: 50%;
  width: 60px;
  height: 60px;
}
@-webkit-keyframes spin-clockwise {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes spin-clockwise {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}

@-webkit-keyframes spin-counter-clockwise {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(-360deg);
    transform: rotate(-360deg);
  }
}
@keyframes spin-counter-clockwise {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(-360deg);
    transform: rotate(-360deg);
  }
}
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/login') }}">
                        Módulo Facturación
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{asset('js/index.js')}}"></script>
   
</body>
</html>
