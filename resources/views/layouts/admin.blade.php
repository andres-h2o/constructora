<!DOCTYPE html>
<html lang="es" data-textdirection="ltr" class="loading">

<!-- Mirrored from pixinvent.com/stack-responsive-bootstrap-4-admin-template/html/ltr/vertical-modern-menu-template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Sep 2017 15:19:59 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
          content="Stack admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
          content="admin template, stack admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>{{ config('app.name', 'Construcctora') }}</title>
    <link rel="apple-touch-icon" href="{{asset('admin/app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon"
          href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
          rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/fonts/feather/style.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin/app-assets/fonts/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin/app-assets/fonts/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/extensions/pace.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/extensions/unslider.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin/app-assets/vendors/css/weather-icons/climacons.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/fonts/meteocons/style.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/charts/morris.css')}}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN STACK CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/bootstrap-extended.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/app.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/colors.min.css')}}">
    <!-- END STACK CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin/app-assets/css/core/menu/menu-types/vertical-menu-modern.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin/app-assets/css/core/menu/menu-types/vertical-overlay-menu.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin/app-assets/css/core/colors/palette-gradient.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/fonts/simple-line-icons/style.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin/app-assets/css/core/colors/palette-gradient.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/pages/timeline.min.css')}}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/style.css')}}">
    <!-- END Custom CSS-->

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<style type="text/css">
    .button {
        background-color: #13AFDF;
        border-radius: 6px;
        border: none;
        color: #fff;
        cursor: pointer;
        font-size: 16px;
        padding: 16px 24px;
        text-align: center;
        text-transform: uppercase;
        width: auto;
    }
    .button:hover {
        background-color: #FB7E29;
        color: #fff;
    }
    .circular--portrait {
        position: relative;
        width: 40px;
        height: 40px;
        overflow: hidden;
        border-radius: 50%;
        box-shadow: 1px 2px 3px black;

    }

    .circular--portrait img {
        width: 100%;
        height: auto;
        box-shadow: 2px 2px 5px black;
    }
    .centrar {
        display:table-cell;
        vertical-align:middle;
    }
    .center {
        position: absolute;
        top:0;
        left:0;
        right:0;
        bottom:0;
        margin: auto;
        background: #83C24A;
        height: 85%;
        box-shadow: 0 0 4px rgba(0,0,0,.3);
    }
    .padre {
        position: relative;
    }
    .hijo {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        width: 50%;
        height: 30%;
        margin: auto;
    }
</style>
<body data-open="click" data-menu="vertical-menu-modern" data-col="2-columns"
      class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar">

<!-- navbar-fixed-top-->
<nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-dark navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav">
                <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a href="#"
                                                                               class="nav-link nav-menu-main menu-toggle hidden-xs"><i
                                class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item"><a href="#" class="navbar-brand">
                        <h2 class="brand-text">{{ config('app.name', 'Construcctora') }}</h2></a></li>
                <li class="nav-item hidden-sm-down float-xs-right"><a data-toggle="collapse"
                                                                      class="nav-link modern-nav-toggle"></a></li>
                <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile"
                                                                    class="nav-link open-navbar-container"><i
                                class="fa fa-ellipsis-v"></i></a></li>
            </ul>
        </div>
        <div class="navbar-container content container-fluid">
            <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
                <ul class="nav navbar-nav">
                    <li class="nav-item hidden-sm-down"><a href="#" class="nav-link nav-link-expand"><i
                                    class="ficon ft-maximize"></i></a></li>
                </ul>
                <ul class="nav navbar-nav float-xs-right">

                    <li class="dropdown dropdown-user nav-item"><a href="#" data-toggle="dropdown"
                                                                   class="dropdown-toggle nav-link dropdown-user-link"><span
                                    class="avatar avatar-online"><img
                                        src="{{asset('admin/app-assets/images/portrait/small/avatar-s-1.png')}}"
                                        alt="avatar"><i></i></span><span class="user-name">{{Auth::user()->name}}</span></a>
                        <div class="dropdown-menu dropdown-menu-right"><a href="#" class="dropdown-item"><i
                                        class="ft-user"></i> Edit Profile</a><a href="#" class="dropdown-item"><i
                                        class="ft-mail"></i> My Inbox</a><a href="#" class="dropdown-item"><i
                                        class="ft-check-square"></i> Task</a><a href="#" class="dropdown-item"><i
                                        class="ft-message-square"></i> Chats</a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ url('/login') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out fa-fw"></i> Logout
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- ////////////////////////////////////////////////////////////////////////////-->


<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
    <div class="main-menu-content">

        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
            <li class=" navigation-header"><span>General</span><i  data-placement="right"
                                                                  data-original-title="General" class=" ft-minus"></i>
            </li>
            <li><a href={{url('/cliente')}}><i class="fa fa-database"></i>Clientes</a></li>

            <li><a href={{url('/puesto/buscar')}}><i class="fa fa-calendar"></i>Buscar Puesto</a></li>
            <li class=" nav-item"><a href="#">
                    <i class="ft-home"></i>
                    <span data-i18n="" class="menu-title">Personal Ejecutivo</span></a>
                <ul class="menu-content">
                    <li><a href={{url('/vendedor')}}><i class="fa fa-ravelry"></i>Ejecutivos de Ventas</a>
                    </li>
                    <li><a href={{url('/coordinador')}}><i class="fa fa-ravelry"></i>Coordinadores</a>
                    </li>
                    <li><a href={{url('/grupo')}}><i class="fa fa-ravelry"></i>Grupos de Trabajo</a>
                    </li>
                </ul>
            </li>

            <li class=" nav-item"><a href="#"><i class="ft-layout"></i>
                    <span data-i18n="" class="menu-title">Parametros Administrativos</span></a>
                <ul class="menu-content">
                    <li><a href={{url('/proyecto')}}><i class="fa fa-ravelry"></i>Proyectos</a>
                    </li>
                    {{--<li><a href={{url('/modulo')}}><i class="fa fa-ravelry"></i>Modulos</a>
                    </li>
                    <li><a href={{url('/bloque')}}><i class="fa fa-ravelry"></i>Bloques</a>
                    </li>--}}
                    <li><a href={{url('/categoria')}}><i class="fa fa-ravelry"></i>Categoria</a>
                    </li>
                   {{-- <li><a href={{url('/puesto')}}><i class="fa fa-ravelry"></i>Puesto</a>
                    </li>--}}
                </ul>
            </li>


            <li class=" nav-item"><a href="#"><i class="fa fa-user"></i>
                    <span data-i18n=""class="menu-title">Ventas y Reservas</span></a>
                <ul class="menu-content">
                    {{--<li><a href={{url('/venta')}}><i class="fa fa-ravelry"></i>Ventas</a>
                    </li>
                    <li><a href={{url('/reserva')}}><i class="fa fa-ravelry"></i>Reserva</a>
                    </li>
                    <li><a href={{url('/bloqueo')}}><i class="fa fa-ravelry"></i>Bloqueo</a>
                    </li>--}}
                    <li><a href={{url('/tipo-venta')}}><i class="fa fa-ravelry"></i>Tipos de Venta</a>
                    </li>
                    <li><a href={{url('/tipo-reserva')}}><i class="fa fa-ravelry"></i>Tipos de Reserva</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="fa fa-user"></i>
                    <span data-i18n=""class="menu-title">Gerencia</span></a>
                <ul class="menu-content">
                    <li><a href={{url('/mes')}}><i class="fa fa-ravelry"></i>Resumen General</a>
                    </li>
                    <li><a href={{url('/mes/top-proyectos')}}><i class="fa fa-ravelry"></i>Top Five</a>
                    </li>
                    <li><a href={{url('#')}}><i class="fa fa-ravelry"></i>Venta Segura</a>
                    </li>
                </ul>
            </li>
            <li><a href={{url('/mensaje')}}><i class="fa fa-database"></i>Mensajes</a></li>
        </ul>
    </div>
</div>
<div class="content-body">
    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body"><!-- Stats -->

                <!--/ Basic Horizontal Timeline -->
                <div class="row">
                    <div class="col-xs-13">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Sistema de Ventas {{ config('app.name', 'Constructora') }}</h4>
                                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body collapse in">
                                <div class="table-responsive">
                                    <table class="table">

                                        @yield('contenido')
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- ////////////////////////////////////////////////////////////////////////////-->

<div class="customizer border-left-blue-grey border-left-lighten-4 hidden-lg-down"><a href="#" class="customizer-close"><i
                class="ft-x font-medium-3"></i></a><a href="#" class="customizer-toggle bg-danger"><i
                class="ft-settings font-medium-3 fa-spin fa fa-spin fa-fw white"></i></a>
    <div class="customizer-content p-2">
        <h4 class="text-uppercase mb-0">Theme Customizer</h4>
        <hr>
        <p>Customize & Preview in Real Time</p>
        <h5 class="mt-1">Layout Options</h5>
        <ul class="nav nav-tabs nav-underline nav-justified layout-options">
            <li class="nav-item">
                <a class="nav-link layouts active" id="baseIcon-tab21" data-toggle="tab" aria-controls="tabIcon21"
                   href="#tabIcon21" aria-expanded="true">Layouts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link navigation" id="baseIcon-tab22" data-toggle="tab" aria-controls="tabIcon22"
                   href="#tabIcon22" aria-expanded="false">Navigation</a>
            </li>
            <li class="nav-item">
                <a class="nav-link navbar" id="baseIcon-tab23" data-toggle="tab" aria-controls="tabIcon23"
                   href="#tabIcon23" aria-expanded="false">Navbar</a>
            </li>
        </ul>
        <div class="tab-content px-1 pt-1">
            <div role="tabpanel" class="tab-pane active" id="tabIcon21" aria-expanded="true"
                 aria-labelledby="baseIcon-tab21">
                <p>
                    <label class="display-inline-block custom-control custom-checkbox">
                        <input type="checkbox" name="collapsed-sidebar" id="collapsed-sidebar"
                               class="custom-control-input">
                        <span class="c-indicator bg-primary custom-control-indicator"></span>
                        <span class="custom-control-description">Collapsed Menu</span>
                    </label>
                </p>
                <p>
                    <label class="display-inline-block custom-control custom-checkbox">
                        <input type="checkbox" name="fixed-layout" id="fixed-layout" class="custom-control-input">
                        <span class="c-indicator bg-primary custom-control-indicator"></span>
                        <span class="custom-control-description">Fixed Layout</span>
                    </label>
                </p>
                <p>
                    <label class="display-inline-block custom-control custom-checkbox">
                        <input type="checkbox" name="boxed-layout" id="boxed-layout" class="custom-control-input">
                        <span class="c-indicator bg-primary custom-control-indicator"></span>
                        <span class="custom-control-description">Boxed Layout</span>
                    </label>
                </p>
                <p>
                    <label class="display-inline-block custom-control custom-checkbox">
                        <input type="checkbox" name="static-layout" id="static-layout" class="custom-control-input">
                        <span class="c-indicator bg-primary custom-control-indicator"></span>
                        <span class="custom-control-description">Static Layout</span>
                    </label>
                </p>
            </div>
            <div class="tab-pane" id="tabIcon22" aria-labelledby="baseIcon-tab22">
                <p>
                    <label class="display-inline-block custom-control custom-checkbox">
                        <input type="checkbox" name="native-scroll" id="native-scroll" class="custom-control-input">
                        <span class="c-indicator bg-primary custom-control-indicator"></span>
                        <span class="custom-control-description">Native Scroll</span>
                    </label>
                </p>
                <p>
                    <label class="display-inline-block custom-control custom-checkbox">
                        <input type="checkbox" name="right-side-icons" id="right-side-icons"
                               class="custom-control-input">
                        <span class="c-indicator bg-primary custom-control-indicator"></span>
                        <span class="custom-control-description">Right Side Icons</span>
                    </label>
                </p>
                <p>
                    <label class="display-inline-block custom-control custom-checkbox">
                        <input type="checkbox" name="bordered-navigation" id="bordered-navigation"
                               class="custom-control-input">
                        <span class="c-indicator bg-primary custom-control-indicator"></span>
                        <span class="custom-control-description">Bordered Navigation</span>
                    </label>
                </p>
                <p>
                    <label class="display-inline-block custom-control custom-checkbox">
                        <input type="checkbox" name="flipped-navigation" id="flipped-navigation"
                               class="custom-control-input">
                        <span class="c-indicator bg-primary custom-control-indicator"></span>
                        <span class="custom-control-description">Flipped Navigation</span>
                    </label>
                </p>
                <p>
                    <label class="display-inline-block custom-control custom-checkbox">
                        <input type="checkbox" name="collapsible-navigation" id="collapsible-navigation"
                               class="custom-control-input">
                        <span class="c-indicator bg-primary custom-control-indicator"></span>
                        <span class="custom-control-description">Collapsible Navigation</span>
                    </label>
                </p>
                <p>
                    <label class="display-inline-block custom-control custom-checkbox">
                        <input type="checkbox" name="static-navigation" id="static-navigation"
                               class="custom-control-input">
                        <span class="c-indicator bg-primary custom-control-indicator"></span>
                        <span class="custom-control-description">Static Navigation</span>
                    </label>
                </p>
            </div>
            <div class="tab-pane" id="tabIcon23" aria-labelledby="baseIcon-tab23">
                <p>
                    <label class="display-inline-block custom-control custom-checkbox">
                        <input type="checkbox" name="brand-center" id="brand-center" class="custom-control-input">
                        <span class="c-indicator bg-primary custom-control-indicator"></span>
                        <span class="custom-control-description">Brand Center</span>
                    </label>
                </p>
                <p>
                    <label class="display-inline-block custom-control custom-checkbox">
                        <input type="checkbox" name="navbar-static-top" id="navbar-static-top"
                               class="custom-control-input">
                        <span class="c-indicator bg-primary custom-control-indicator"></span>
                        <span class="custom-control-description">Static Top</span>
                    </label>
                </p>
            </div>
        </div>
        <hr>
        <h5 class="mt-1">Navigation Color Options</h5>
        <ul class="nav nav-tabs nav-underline nav-justified color-options">
            <li class="nav-item">
                <a class="nav-link nav-semi-light active" id="color-opt-1" data-toggle="tab" aria-controls="clrOpt1"
                   href="#clrOpt1" aria-expanded="false">Semi Light</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-semi-dark" id="color-opt-2" data-toggle="tab" aria-controls="clrOpt2"
                   href="#clrOpt2" aria-expanded="false">Semi Dark</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-dark" id="color-opt-3" data-toggle="tab" aria-controls="clrOpt3" href="#clrOpt3"
                   aria-expanded="false">Dark</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-light" id="color-opt-4" data-toggle="tab" aria-controls="clrOpt4" href="#clrOpt4"
                   aria-expanded="true">Light</a>
            </li>
        </ul>
        <div class="tab-content px-1 pt-1">
            <div role="tabpanel" class="tab-pane active" id="clrOpt1" aria-expanded="true"
                 aria-labelledby="color-opt-1">
                <div class="row">
                    <div class="col-xs-6">
                        <h6>Solid</h6>
                        <p>
                            <label class="display-inline-block custom-control custom-radio">
                                <input type="radio" name="nav-slight-clr" class="custom-control-input"
                                       data-bg="bg-blue-grey">
                                <span class="bg-default custom-control-indicator"></span>
                                <span class="custom-control-description">Default</span>
                            </label>
                        </p>
                        <p>
                            <label class="display-inline-block custom-control custom-radio">
                                <input type="radio" name="nav-slight-clr" class="custom-control-input"
                                       data-bg="bg-primary">
                                <span class="bg-primary custom-control-indicator"></span>
                                <span class="custom-control-description">Primary</span>
                            </label>
                        </p>
                        <p>
                            <label class="display-inline-block custom-control custom-radio">
                                <input type="radio" name="nav-slight-clr" class="custom-control-input"
                                       data-bg="bg-danger">
                                <span class="bg-danger custom-control-indicator"></span>
                                <span class="custom-control-description">Danger</span>
                            </label>
                        </p>
                        <p>
                            <label class="display-inline-block custom-control custom-radio">
                                <input type="radio" name="nav-slight-clr" class="custom-control-input"
                                       data-bg="bg-success">
                                <span class="bg-success custom-control-indicator"></span>
                                <span class="custom-control-description">Success</span>
                            </label>
                        </p>
                        <p>
                            <label class="display-inline-block custom-control custom-radio">
                                <input type="radio" name="nav-slight-clr" class="custom-control-input"
                                       data-bg="bg-blue">
                                <span class="bg-blue custom-control-indicator"></span>
                                <span class="custom-control-description">Blue</span>
                            </label>
                        </p>
                        <p>
                            <label class="display-inline-block custom-control custom-radio">
                                <input type="radio" name="nav-slight-clr" class="custom-control-input"
                                       data-bg="bg-cyan">
                                <span class="bg-cyan custom-control-indicator"></span>
                                <span class="custom-control-description">Cyan</span>
                            </label>
                        </p>
                        <p>
                            <label class="display-inline-block custom-control custom-radio">
                                <input type="radio" name="nav-slight-clr" class="custom-control-input"
                                       data-bg="bg-pink">
                                <span class="bg-pink custom-control-indicator"></span>
                                <span class="custom-control-description">Pink</span>
                            </label>
                        </p>
                    </div>
                    <div class="col-xs-6">
                        <h6>Gradient</h6>
                        <p>
                            <label class="display-inline-block custom-control custom-radio">
                                <input type="radio" name="nav-slight-clr" checked class="custom-control-input default"
                                       data-bg="bg-gradient-x-grey-blue">
                                <span class="bg-default custom-control-indicator"></span>
                                <span class="custom-control-description">Default</span>
                            </label>
                        </p>
                        <p>
                            <label class="display-inline-block custom-control custom-radio">
                                <input type="radio" name="nav-slight-clr" class="custom-control-input"
                                       data-bg="bg-gradient-x-primary">
                                <span class="bg-primary custom-control-indicator"></span>
                                <span class="custom-control-description">Primary</span>
                            </label>
                        </p>
                        <p>
                            <label class="display-inline-block custom-control custom-radio">
                                <input type="radio" name="nav-slight-clr" class="custom-control-input"
                                       data-bg="bg-gradient-x-danger">
                                <span class="bg-danger custom-control-indicator"></span>
                                <span class="custom-control-description">Danger</span>
                            </label>
                        </p>
                        <p>
                            <label class="display-inline-block custom-control custom-radio">
                                <input type="radio" name="nav-slight-clr" class="custom-control-input"
                                       data-bg="bg-gradient-x-success">
                                <span class="bg-success custom-control-indicator"></span>
                                <span class="custom-control-description">Success</span>
                            </label>
                        </p>
                        <p>
                            <label class="display-inline-block custom-control custom-radio">
                                <input type="radio" name="nav-slight-clr" class="custom-control-input"
                                       data-bg="bg-gradient-x-blue">
                                <span class="bg-blue custom-control-indicator"></span>
                                <span class="custom-control-description">Blue</span>
                            </label>
                        </p>
                        <p>
                            <label class="display-inline-block custom-control custom-radio">
                                <input type="radio" name="nav-slight-clr" class="custom-control-input"
                                       data-bg="bg-gradient-x-cyan">
                                <span class="bg-cyan custom-control-indicator"></span>
                                <span class="custom-control-description">Cyan</span>
                            </label>
                        </p>
                        <p>
                            <label class="display-inline-block custom-control custom-radio">
                                <input type="radio" name="nav-slight-clr" class="custom-control-input"
                                       data-bg="bg-gradient-x-pink">
                                <span class="bg-pink custom-control-indicator"></span>
                                <span class="custom-control-description">Pink</span>
                            </label>
                        </p>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="clrOpt2" aria-labelledby="color-opt-2">
                <p>
                    <label class="display-inline-block custom-control custom-radio">
                        <input type="radio" name="nav-sdark-clr" checked class="custom-control-input default"
                               data-bg="bg-default">
                        <span class="bg-default custom-control-indicator"></span>
                        <span class="custom-control-description">Default</span>
                    </label>
                </p>
                <p>
                    <label class="display-inline-block custom-control custom-radio">
                        <input type="radio" name="nav-sdark-clr" class="custom-control-input" data-bg="bg-primary">
                        <span class="bg-primary custom-control-indicator"></span>
                        <span class="custom-control-description">Primary</span>
                    </label>
                </p>
                <p>
                    <label class="display-inline-block custom-control custom-radio">
                        <input type="radio" name="nav-sdark-clr" class="custom-control-input" data-bg="bg-danger">
                        <span class="bg-danger custom-control-indicator"></span>
                        <span class="custom-control-description">Danger</span>
                    </label>
                </p>
                <p>
                    <label class="display-inline-block custom-control custom-radio">
                        <input type="radio" name="nav-sdark-clr" class="custom-control-input" data-bg="bg-success">
                        <span class="bg-success custom-control-indicator"></span>
                        <span class="custom-control-description">Success</span>
                    </label>
                </p>
                <p>
                    <label class="display-inline-block custom-control custom-radio">
                        <input type="radio" name="nav-sdark-clr" class="custom-control-input" data-bg="bg-blue">
                        <span class="bg-blue custom-control-indicator"></span>
                        <span class="custom-control-description">Blue</span>
                    </label>
                </p>
                <p>
                    <label class="display-inline-block custom-control custom-radio">
                        <input type="radio" name="nav-sdark-clr" class="custom-control-input" data-bg="bg-cyan">
                        <span class="bg-cyan custom-control-indicator"></span>
                        <span class="custom-control-description">Cyan</span>
                    </label>
                </p>
                <p>
                    <label class="display-inline-block custom-control custom-radio">
                        <input type="radio" name="nav-sdark-clr" class="custom-control-input" data-bg="bg-pink">
                        <span class="bg-pink custom-control-indicator"></span>
                        <span class="custom-control-description">Pink</span>
                    </label>
                </p>
            </div>
            <div class="tab-pane" id="clrOpt3" aria-labelledby="color-opt-3">
                <div class="row">
                    <div class="col-xs-6">
                        <h3>Solid</h3>
                        <p>
                            <label class="display-inline-block custom-control custom-radio">
                                <input type="radio" name="nav-dark-clr" checked class="custom-control-input default"
                                       data-bg="bg-blue-grey">
                                <span class="bg-default custom-control-indicator"></span>
                                <span class="custom-control-description">Default</span>
                            </label>
                        </p>
                        <p>
                            <label class="display-inline-block custom-control custom-radio">
                                <input type="radio" name="nav-dark-clr" class="custom-control-input"
                                       data-bg="bg-primary">
                                <span class="bg-primary custom-control-indicator"></span>
                                <span class="custom-control-description">Primary</span>
                            </label>
                        </p>
                        <p>
                            <label class="display-inline-block custom-control custom-radio">
                                <input type="radio" name="nav-dark-clr" class="custom-control-input"
                                       data-bg="bg-danger">
                                <span class="bg-danger custom-control-indicator"></span>
                                <span class="custom-control-description">Danger</span>
                            </label>
                        </p>
                        <p>
                            <label class="display-inline-block custom-control custom-radio">
                                <input type="radio" name="nav-dark-clr" class="custom-control-input"
                                       data-bg="bg-success">
                                <span class="bg-success custom-control-indicator"></span>
                                <span class="custom-control-description">Success</span>
                            </label>
                        </p>
                        <p>
                            <label class="display-inline-block custom-control custom-radio">
                                <input type="radio" name="nav-dark-clr" class="custom-control-input" data-bg="bg-blue">
                                <span class="bg-blue custom-control-indicator"></span>
                                <span class="custom-control-description">Blue</span>
                            </label>
                        </p>
                        <p>
                            <label class="display-inline-block custom-control custom-radio">
                                <input type="radio" name="nav-dark-clr" class="custom-control-input" data-bg="bg-cyan">
                                <span class="bg-cyan custom-control-indicator"></span>
                                <span class="custom-control-description">Cyan</span>
                            </label>
                        </p>
                        <p>
                            <label class="display-inline-block custom-control custom-radio">
                                <input type="radio" name="nav-dark-clr" class="custom-control-input" data-bg="bg-pink">
                                <span class="bg-pink custom-control-indicator"></span>
                                <span class="custom-control-description">Pink</span>
                            </label>
                        </p>
                    </div>

                    <div class="col-xs-6">
                        <h3>Gradient</h3>
                        <p>
                            <label class="display-inline-block custom-control custom-radio">
                                <input type="radio" name="nav-dark-clr" class="custom-control-input"
                                       data-bg="bg-gradient-x-grey-blue">
                                <span class="bg-default custom-control-indicator"></span>
                                <span class="custom-control-description">Default</span>
                            </label>
                        </p>
                        <p>
                            <label class="display-inline-block custom-control custom-radio">
                                <input type="radio" name="nav-dark-clr" class="custom-control-input"
                                       data-bg="bg-gradient-x-primary">
                                <span class="bg-primary custom-control-indicator"></span>
                                <span class="custom-control-description">Primary</span>
                            </label>
                        </p>
                        <p>
                            <label class="display-inline-block custom-control custom-radio">
                                <input type="radio" name="nav-dark-clr" class="custom-control-input"
                                       data-bg="bg-gradient-x-danger">
                                <span class="bg-danger custom-control-indicator"></span>
                                <span class="custom-control-description">Danger</span>
                            </label>
                        </p>
                        <p>
                            <label class="display-inline-block custom-control custom-radio">
                                <input type="radio" name="nav-dark-clr" class="custom-control-input"
                                       data-bg="bg-gradient-x-success">
                                <span class="bg-success custom-control-indicator"></span>
                                <span class="custom-control-description">Success</span>
                            </label>
                        </p>
                        <p>
                            <label class="display-inline-block custom-control custom-radio">
                                <input type="radio" name="nav-dark-clr" class="custom-control-input"
                                       data-bg="bg-gradient-x-blue">
                                <span class="bg-blue custom-control-indicator"></span>
                                <span class="custom-control-description">Blue</span>
                            </label>
                        </p>
                        <p>
                            <label class="display-inline-block custom-control custom-radio">
                                <input type="radio" name="nav-dark-clr" class="custom-control-input"
                                       data-bg="bg-gradient-x-cyan">
                                <span class="bg-cyan custom-control-indicator"></span>
                                <span class="custom-control-description">Cyan</span>
                            </label>
                        </p>
                        <p>
                            <label class="display-inline-block custom-control custom-radio">
                                <input type="radio" name="nav-dark-clr" class="custom-control-input"
                                       data-bg="bg-gradient-x-pink">
                                <span class="bg-pink custom-control-indicator"></span>
                                <span class="custom-control-description">Pink</span>
                            </label>
                        </p>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="clrOpt4" aria-labelledby="color-opt-4">
                <p>
                    <label class="display-inline-block custom-control custom-radio">
                        <input type="radio" name="nav-light-clr" checked class="custom-control-input default"
                               data-bg="bg-blue-grey bg-lighten-4">
                        <span class="bg-default custom-control-indicator"></span>
                        <span class="custom-control-description">Default</span>
                    </label>
                </p>
                <p>
                    <label class="display-inline-block custom-control custom-radio">
                        <input type="radio" name="nav-light-clr" class="custom-control-input"
                               data-bg="bg-primary bg-lighten-4">
                        <span class="bg-primary custom-control-indicator"></span>
                        <span class="custom-control-description">Primary</span>
                    </label>
                </p>
                <p>
                    <label class="display-inline-block custom-control custom-radio">
                        <input type="radio" name="nav-light-clr" class="custom-control-input"
                               data-bg="bg-danger bg-lighten-4">
                        <span class="bg-danger custom-control-indicator"></span>
                        <span class="custom-control-description">Danger</span>
                    </label>
                </p>
                <p>
                    <label class="display-inline-block custom-control custom-radio">
                        <input type="radio" name="nav-light-clr" class="custom-control-input"
                               data-bg="bg-success bg-lighten-4">
                        <span class="bg-success custom-control-indicator"></span>
                        <span class="custom-control-description">Success</span>
                    </label>
                </p>
                <p>
                    <label class="display-inline-block custom-control custom-radio">
                        <input type="radio" name="nav-light-clr" class="custom-control-input"
                               data-bg="bg-blue bg-lighten-4">
                        <span class="bg-blue custom-control-indicator"></span>
                        <span class="custom-control-description">Blue</span>
                    </label>
                </p>
                <p>
                    <label class="display-inline-block custom-control custom-radio">
                        <input type="radio" name="nav-light-clr" class="custom-control-input"
                               data-bg="bg-cyan bg-lighten-4">
                        <span class="bg-cyan custom-control-indicator"></span>
                        <span class="custom-control-description">Cyan</span>
                    </label>
                </p>
                <p>
                    <label class="display-inline-block custom-control custom-radio">
                        <input type="radio" name="nav-light-clr" class="custom-control-input"
                               data-bg="bg-pink bg-lighten-4">
                        <span class="bg-pink custom-control-indicator"></span>
                        <span class="custom-control-description">Pink</span>
                    </label>
                </p>
            </div>
        </div>
        <hr>
        <h5 class="mt-1 mb-1">Menu Color Options</h5>
        <div class="form-group">
            <!-- Outline Button group -->
            <div class="btn-group customizer-sidebar-options" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-outline-primary" data-sidebar="menu-light">Light Menu</button>
                <button type="button" class="btn btn-outline-primary" data-sidebar="menu-dark">Dark Menu</button>
            </div>
        </div>
    </div>
</div>


<!-- BEGIN VENDOR JS-->
<script src="{{asset('admin/app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{asset('admin/app-assets/vendors/js/charts/raphael-min.js')}}" type="admin/text/javascript"></script>
<script src="{{asset('admin/app-assets/vendors/js/charts/morris.min.js')}}" type="admin/text/javascript"></script>
<script src="{{asset('admin/app-assets/vendors/js/extensions/unslider-min.js')}}" type="admin/text/javascript"></script>
<script src="{{asset('admin/app-assets/vendors/js/timeline/horizontal-timeline.js')}}" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN STACK JS-->
<script src="{{asset('admin/app-assets/js/core/app-menu.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/app-assets/js/core/app.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/app-assets/js/scripts/customizer.min.js')}}" type="text/javascript"></script>
<!-- END STACK JS-->
<!-- BEGIN PAGE LEVEL JS-->


<script src="{{asset('admin/app-assets/js/scripts/pages/dashboard-ecommerce.min.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
</body>

<!-- Mirrored from pixinvent.com/stack-responsive-bootstrap-4-admin-template/html/ltr/vertical-modern-menu-template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Sep 2017 15:22:03 GMT -->
</html>