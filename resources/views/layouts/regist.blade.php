<!DOCTYPE html>
<html>
<head>
  <title>CITE UP 3</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="shortcut icon" href="{{asset('/dist/img/citeup/ico.png')}}"/>
  <!-- Global styles -->
  <link type="text/css" rel="stylesheet" href="{{asset('/dist/css/components.css')}}"/>
  <link type="text/css" rel="stylesheet" href="{{asset('/dist/css/custom.css')}}"/>

  <!--End of Global styles -->
  <!--Plugin styles-->
  <link type="text/css" rel="stylesheet" href="{{asset('/dist/vendors/datepicker/css/bootstrap-datepicker.min.css')}}">
  <link type="text/css" rel="stylesheet" href="{{asset('/dist/vendors/select2/css/select2.min.css')}}"/>
  <link type="text/css" rel="stylesheet" href="{{asset('/dist/vendors/bootstrapvalidator/css/bootstrapValidator.min.css')}}"/>
  <link type="text/css" rel="stylesheet" href="{{asset('/dist/vendors/wow/css/animate.css')}}"/>
  <!--End of Plugin styles-->
  <!--Page level styles-->
  <link type="text/css" rel="stylesheet" href="{{asset('/dist/css/pages/wizards.css')}}"/>
  <link type="text/css" rel="stylesheet" href="{{asset('/dist/css/pages/login.css')}}"/>
  <!-- NEW RESOURCES-->
  <link type="text/css" rel="stylesheet" href="{{asset('/css/style.css')}}"/>
  <link type="text/css" rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}"/>
  <!--End of Page level styles-->
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

  <div class="site-wrap">
    <!--<div class="preloader" style=" position: fixed;width: 100%;height: 100%;top: 0;left: 0;z-index: 100000;backface-visibility: hidden;background: #ffffff;">
      <div class="preloader_img" style="width: 200px; height: 200px;position: absolute;left: 48%;top: 48%;background-position: center;z-index: 999999">
        <img src="{{asset('/dist/img/logow.png')}}" style=" width: 40px;" alt="loading...">
      </div>
    </div>

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    <header class="site-navbar py-3" role="banner" style="background-color: #fff;box-shadow: 0 0 10px 1px #ccc;/* color: darkred;background-image: url(../../dist/img/citeup/header.jpg);background-repeat: no-repeat;background-size: cover;background-position: center center;background-color: #8a0404;*/">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-4 col-xl-3">
            <img src="{{asset('/dist/img/citeup/Cite-UP.png')}}" alt="Image" class="img-fluid">
          </div>
          <div class="col-12 col-md-9 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
                <li class="active"><a href="index.html">Home</a></li>
                <li class="has-children">
                  <a href="services.html">Kategori</a>
                  <ul class="dropdown">
                    <li><a href="#">Logika</a></li>
                    <li><a href="#">Desain</a></li>
                    <li><a href="#">Pengetahuan TIK</a></li>
                  </ul>
                </li>
                <li><a href="industries.html">Login</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="contact.html">Contact</a></li>
              </ul>
            </nav>
          </div>
          <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a>
          </div>
        </div>
      </div>
    </header>-->

    <div class="site-blocks-cover">
      @yield('content')
    </div>


  </div>




  <!-- global js -->
  <script type="text/javascript" src="{{asset('/dist/js/jquery.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('/dist/js/tether.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('/dist/js/bootstrap.min.js')}}"></script>
  <!-- end of global js-->
  <!--Plugin js-->
  <script type="text/javascript" src="{{asset('/dist/vendors/datepicker/js/bootstrap-datepicker.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('/dist/vendors/select2/js/select2.js')}}"></script>
  <script type="text/javascript" src="{{asset('/dist/vendors/bootstrapvalidator/js/bootstrapValidator.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('/dist/vendors/wow/js/wow.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('/dist/vendors/twitter-bootstrap-wizard/js/jquery.bootstrap.wizard.min.js')}}"></script>
  <!--End of plugin js-->
  <!--Page level js-->
  <script type="text/javascript" src="{{asset('/dist/js/pages/register.js')}}"></script>
  <script type="text/javascript" src="{{asset('/dist/js/pages/wizard.js')}}"></script>
  <!-- end of page level js -->

</body>

</html>