<!DOCTYPE html>
<html>
<head>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BANCO</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">

</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

<header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini" style="color: #FFD34F"><b><strong>M</strong></b>B</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b style="color: #FFD34F"><strong>M</strong></b>ULTI<b style="color: #FFD34F">B</b>ANCO</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <small class="bg-red">Online</small>
                        <span class="hidden-xs">{{Auth::user()->name}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">

                            <p>
                                SISTEMA BANCARIO
                                <small>Sistema de Informacion II</small>
                            </p>
                        </li>

                        <!-- Menu Footer-->
                        <li>
                            <a href="{{ url('/login') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out fa-fw"></i> Logout
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>

    </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header"></li>




            <li class="treeview">
                <a href="#">
                    <i class="fa fa-th"></i>
                    <span>Basico </span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('/banco')}}"><i class="fa fa-circle-o"></i>BANCO</a></li>
                    <li><a href="{{url('#')}}"><i class="fa fa-circle-o"></i>Crear Modulo</a></li>
                    <li><a href="{{url('#')}}"><i class="fa fa-circle-o"></i> Cuenta Administrativa</a></li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Parametros Administrativos </span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('/sucursal')}}"><i class="fa fa-circle-o"></i> SUCURSAL</a></li>
                    <li><a href="{{url('/caja')}}"><i class="fa fa-circle-o"></i>CAJA </a></li>
                    <li><a href="{{url('/detalle')}}"><i class="fa fa-circle-o"></i> HISTORIAL CAJA</a></li>
                 </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>Persona</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('cliente1')}}"><i class="fa fa-circle-o"></i> CLIENTE</a></li>
                    <li><a href="{{url('#')}}"><i class="fa fa-circle-o"></i>  Socio</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Administar Cuenta</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('/cuenta')}}"><i class="fa fa-circle-o"></i> CUENTA</a></li>
                    <li><a href="{{url('/tipo-cuenta')}}"><i class="fa fa-circle-o"></i> TIPO DE CUENTA</a></li>
                    <li><a href="{{url('/movimiento')}}"><i class="fa fa-circle-o"></i> MOVIMIENTO</a></li>
                    <li><a href="{{url('/transaccion')}}"><i class="fa fa-circle-o"></i> Transaciones</a></li>


                </ul>
            </li>


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>





<!--Contenido-->
<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <!--Contenido-->

                                @yield('contenido')
                                <!--Fin Contenido-->
                            </div>
                        </div>

                    </div>
                </div><!-- /.row -->
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </section>
</div><!-- /.col -->

<!--Fin-Contenido-->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.3.0
    </div>
    <strong>Copyright &copy; 2015-2020 <a href="www.incanatoit.com">IncanatoIT</a>.</strong> All rights reserved.
</footer>


<script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
@stack('scripts')
<!-- Bootstrap 3.3.5 -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/bootstrap-select.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('js/app.min.js')}}"></script>

</body>
</html>
