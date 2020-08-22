<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{asset('/dist/img/logo1.ico')}}"/>
    <!-- global styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('/dist/css/components.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('/dist/css/custom.css')}}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="#" id="skin_change"/>
    <!-- end of global styles-->

    <!-- plugin styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('/dist/vendors/jasny-bootstrap/css/jasny-bootstrap.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('/dist/vendors/bootstrapvalidator/css/bootstrapValidator.min.css')}}"/>
    @yield('globalplugin')
    <!-- end plugin styles-->
</head>

<body>
<!--</div>-->
<div class="preloader" style=" position: fixed;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  z-index: 100000;
  backface-visibility: hidden;
  background: #ffffff;">
    <div class="preloader_img" style="width: 200px;
  height: 200px;
  position: absolute;
  left: 48%;
  top: 48%;
  background-position: center;
z-index: 999999">
        <img src="{{asset('/dist/img/loader.gif')}}" style=" width: 40px;" alt="loading...">
    </div>
</div>
    <div class="bg-dark" id="wrap">
        <div id="top">
            <!-- .navbar -->
            <nav class="navbar navbar-static-top">
                <div class="container-fluid m-0">
                    <a class="navbar-brand float-left text-center" href="http://citeup.id">
                        <h4 class="text-dark"><img src="{{asset('/dist/img/citeup/logo-header.png')}}" class="admin_img" alt="logo"></h4>
                    </a>
                    <div class="menu">
                    <span class="toggle-left" id="menu-toggle">
                        <i class="fa fa-bars text-dark"></i>
                    </span>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </nav>
            <!-- /.navbar -->
        <!-- /.head -->
        </div>
    <!-- /#top -->

        <div id="left">
            <div class="media user-media bg-dark dker">
                <div class="user-media-toggleHover">
                    <span class="fa fa-user"></span>
                </div>
                <div class="user-wrapper">
                        <a class="user-link" href="#">
                            <img class="media-object img-thumbnail user-img rounded-circle admin_img3" alt="User Picture"
                                 src="{{asset('/dist/img/admin.jpg')}}">
                            <p class="user-info menu_hide" style="color: darkslategrey">
                                {{ Auth::user()->username }}
                                <br>
                            </p>
                        </a>
                    </div>
            </div>
            <!-- #menu -->
            <ul id="menu" class="bg-blue dker">
                <li>
                    <a href="/beta/public/home">
                        <i class="fa fa-home"></i>
                        <span class="link-title menu_hide">&nbsp;Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript:;">
                        <i class="fa fa-th-large"></i>
                        <span class="link-title menu_hide">&nbsp; Option</span>
                        <span class="fa arrow menu_hide"></span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <i class="fa fa-angle-right"></i>
                                &nbsp; {{ __('Logout') }}

                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
            <!-- /#menu -->
        </div>
        <!-- /#left -->
        <div id="content" class="bg-container">
            <header class="head">

            <div class="main-bar">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="nav_top_align">
                            <i class="fa fa-file-o"></i>
                            @yield('PageName')
                        </h4>
                    </div>

                    <div class="col-lg-6">
                        <div class="float-right">
                            @yield('breadcrumb')
                        </div>
                     </div>
                </div>
            </div>
            </header>

        <div class="outer">
            <div class="inner bg-container">

                    @yield('content')

            </div>
            <!-- /.inner -->
        </div>
        <!-- /.outer -->
        </div>
    <!-- /#content -->

        <!-- # right side -->
</div>
<!-- /#wrap -->

<!-- global scripts-->
<script type="text/javascript" src="{{asset('/dist/js/components.js')}}"></script>
<script type="text/javascript" src="{{asset('/dist/js/custom.js')}}"></script>
<!-- end of global scripts-->
<!-- plugin scripts-->
<script type="text/javascript" src="{{asset('/dist/js/pluginjs/jasny-bootstrap.js')}}"></script>
<script type="text/javascript" src="{{asset('/dist/vendors/holderjs/js/holder.js')}}"></script>
<script type="text/javascript" src="{{asset('/dist/vendors/bootstrapvalidator/js/bootstrapValidator.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/dist/js/pages/validation.js')}}"></script>
@yield('globaljs')
<!-- end of plugin scripts-->
</body>
</html>