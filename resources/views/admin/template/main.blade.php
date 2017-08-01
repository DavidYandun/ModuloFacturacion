<!DOCTYPE html>
<html>
<head>
	<title>@yield('title','Default')</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

           <!-- Bootstrap -->
        <link href="{{asset('vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">
        <!-- Font Awesome -->
        <link href="{{asset('vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <!-- NProgress -->
        <link href="{{asset('vendors/nprogress/nprogress.css')}}" rel="stylesheet">
        <!-- iCheck -->
        <link href="{{asset('vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">

        <!-- bootstrap-progressbar -->
        <link href="{{asset('vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
        <!-- JQVMap -->
        <link href="{{asset('vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet"/>
        <!-- bootstrap-daterangepicker -->
        <link href="{{asset('vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="{{asset('build/css/custom.min.css')}}" rel="stylesheet">



</head>
<body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col footer_fixed" >
                    <div class="left_col scroll-view" >
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="{{url('home')}}" class="site_title"> Módulo Facturación</a>
                        </div>

                        <div class="clearfix"></div>

                        <br />

                        <!-- sidebar menu -->
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu" >
                            <div class="menu_section">
                            <!--INICIO-->
                                <li><a href="{{url('home')}}"><i class="fa fa-home"></i> Inicio </a>
                                </li>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-calculator"></i> VENTAS<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav-child_menu">
                                    <!--Nueva Factura-->
                                        <li><a href="{{url('nuevafactura')}}"><i class="fa fa-gg"></i>Nueva Factura <span class="fa fa-chevron-right"></span></a></li>
                                </ul>
                                </li>
                                <li><a><i class="glyphicon glyphicon-tasks"></i> CRUDS <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" >
                                
                                    <!--CABECERA-->
                                        <li><a href="{{url('cabecera')}}"><i class="fa fa-gg"></i>Cabecera <span class="fa fa-chevron-right"></span></a></li>
                                    <!--DETALLE-->   
                                        <li><a href="{{url('detalle')}}"><i class="fa fa-tasks"></i>Detalle <span class="fa fa-chevron-right"></span></a></li>
                                    <!--PRODUCTOS-->   
                                        <li><a href="{{url('producto')}}"><i class="fa fa-bitbucket"></i>Productos <span class="fa fa-chevron-right"></span></a></li>    
                                    <!--CAJA-->   
                                        <li><a href="{{url('caja')}}"><i class="fa fa-delicious"></i> Caja <span class="fa fa-chevron-right"></span></a>
                                        </li>
                                    <!--CLIENTES-->  
                                        <li><a href="{{url('cliente')}}"><i class="fa fa-bars"></i>Clientes <span class="fa fa-chevron-right"></span></a>
                                        </li>
                                    <!--TIPOCLIENTE-->  
                                        <li><a href="{{url('tipocliente')}}"><i class="fa fa-users"></i> Tipo Clientes <span class="fa fa-chevron-right"></span></a>
                                        </li>
                                    <!--EMPLEADOS-->  
                                        @role('admin')
                                        <li><a href="{{url('empleado')}}"><i class="fa fa-users"></i> Empleados <span class="fa fa-chevron-right"></span></a>
                                        </li>
                                        @endrole
                                    <!--FACTURAS PENDIENTES-->  
                                         <li><a href="{{url('facturaspendiente')}}"><i class="fa fa-columns"></i> Facturas Pendientes <span class="fa fa-chevron-right"></span></a>
                                        </li>
                                    <!--<li><a><i class="fa fa-file-pdf-o"></i>Otros Reportes <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{url('reporte')}}" target="_blank">Clientes con sus movimientos</a></li>
                                            <li><a href="chartjs2.html" target="_blank">Listado de clientes con su saldo</a></li>
                                        </ul>
                                    </li>-->
                                    </ul>
                                </li>
                            </ul>
                            </div>

                        </div>
                        <!-- /sidebar menu -->

                        <!-- /menu footer buttons -->
                      <!-- <div class="sidebar-footer hidden-small">
                            <a data-toggle="tooltip" data-placement="top" title="Settings">
                                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Lock">
                                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                            </a>
                        </div>-->
                        <!-- /menu footer buttons -->
                    </div>
                </div>

                <!-- top navigation -->
                <div class="top_nav">
                    <div class="nav_menu">
                        <nav>
                            <div class="nav toggle"  >
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>

                           <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
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
                        </nav>
                    </div>
                </div>
                <!-- /top navigation -->

                <!-- page content -->
                <div class="right_col" role="main">
                    @yield('contenido')
                </div>
                <!-- /page content -->
            </div>
        </div>


 <!-- jQuery -->
        <script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
        @stack('scripts')
        <!-- Bootstrap -->
        <script src="{{asset('vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
        <!-- FastClick -->
        <script src="{{asset('vendors/fastclick/lib/fastclick.js')}}"></script>
        <!-- NProgress -->
        <script src="{{asset('vendors/nprogress/nprogress.js')}}"></script>
        <!-- Chart.js -->
        <script src="{{asset('vendors/Chart.js/dist/Chart.min.js')}}"></script>
        <!-- gauge.js -->
        <script src="{{asset('vendors/gauge.js/dist/gauge.min.js')}}"></script>
        <!-- bootstrap-progressbar -->
        <script src="{{asset('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
        <!-- iCheck -->
        <script src="{{asset('vendors/iCheck/icheck.min.js')}}"></script>
        <!-- Skycons -->
        <script src="{{asset('vendors/skycons/skycons.js')}}"></script>
        <!-- Flot -->
        <script src="{{asset('vendors/Flot/jquery.flot.js')}}"></script>
        <script src="{{asset('vendors/Flot/jquery.flot.pie.js')}}"></script>
        <script src="{{asset('vendors/Flot/jquery.flot.time.js')}}"></script>
        <script src="{{asset('vendors/Flot/jquery.flot.stack.js')}}"></script>
        <script src="{{asset('vendors/Flot/jquery.flot.resize.js')}}"></script>
        <!-- Flot plugins -->
        <script src="{{asset('vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
        <script src="{{asset('vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
        <script src="{{asset('vendors/flot.curvedlines/curvedLines.js')}}"></script>
        <!-- DateJS -->
        <script src="{{asset('vendors/DateJS/build/date.js')}}"></script>
        <!-- JQVMap -->
        <script src="{{asset('vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
        <script src="{{asset('vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
        <script src="{{asset('vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="{{asset('vendors/moment/min/moment.min.js')}}"></script>
        <script src="{{asset('vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

        <!-- Custom Theme Scripts -->
        <script src="{{asset('build/js/custom.min.js')}}"></script>

     
</body>
</html>