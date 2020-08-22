<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="UTF-8">
  <title>@yield('title')</title>

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="{{asset('/dist/img/citeup/ico.png')}}"/>
  <!-- global styles-->
  <link type="text/css" rel="stylesheet" href="{{asset('/dist/css/components.css')}}"/>
  <link type="text/css" rel="stylesheet" href="{{asset('/dist/css/custom.css')}}"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- end of global styles-->

  <!-- plugin styles-->
  <link type="text/css" rel="stylesheet" href="{{asset('/dist/vendors/inputlimiter/css/jquery.inputlimiter.css')}}"/>
  <link type="text/css" rel="stylesheet" href="{{asset('/dist/vendors/chosen/css/chosen.css')}}"/>
  <link type="text/css" rel="stylesheet" href="{{asset('/dist/vendors/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}"/>
  <link type="text/css" rel="stylesheet" href="{{asset('/dist/vendors/jquery-tagsinput/css/jquery.tagsinput.css')}}"/>
  <link type="text/css" rel="stylesheet" href="{{asset('/dist/vendors/daterangepicker/css/daterangepicker.css')}}"/>
  <link type="text/css" rel="stylesheet" href="{{asset('/dist/vendors/datepicker/css/bootstrap-datepicker.min.css')}}"/>
  <link type="text/css" rel="stylesheet" href="{{asset('/dist/vendors/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}"/>
  <link type="text/css" rel="stylesheet" href="{{asset('/dist/vendors/bootstrap-switch/css/bootstrap-switch.min.css')}}"/>
  <link type="text/css" rel="stylesheet" href="{{asset('/dist/vendors/jasny-bootstrap/css/jasny-bootstrap.min.css')}}"/>
  <link type="text/css" rel="stylesheet" href="{{asset('/dist/vendors/fileinput/css/fileinput.min.css')}}"/>
  <link type="text/css" rel="stylesheet" href="{{asset('/dist/vendors/multiselect/css/multi-select.css')}}"/>
  <link type="text/css" rel="stylesheet" href="{{asset('/dist/vendors/bootstrapvalidator/css/bootstrapValidator.min.css')}}"/>
  <!--datetime picker-->
  <link type="text/css" rel="stylesheet" href="{{asset('/dist/vendors/datetimepicker/css/DateTimePicker.min.css')}}" />
  <link type="text/css" rel="stylesheet" href="{{asset('/dist/vendors/j_timepicker/css/jquery.timepicker.css')}}" />
  <!--Modal-->
  <link type="text/css" rel="stylesheet" href="{{asset('/dist/vendors/modal/css/component.css')}}"/>
  <link type="text/css" rel="stylesheet" href="{{asset('/dist/vendors/bootstrap-tagsinput/css/bootstrap-tagsinput.css')}}"/>
  <link rel="stylesheet" type="text/css" href="{{asset('/dist/vendors/animate/css/animate.min.css')}}" />
  <!-- end plugin styles-->

  <!--Page level styles-->
  <link type="text/css" rel="stylesheet" href="{{asset('/dist/css/pages/form_elements.css')}}"/>
  <link type="text/css" rel="stylesheet" href="{{asset('/dist/css/pages/wizards.css')}}"/>
  <link type="text/css" rel="stylesheet" href="{{asset('/dist/css/pages/icon.css')}}"/>
  <link type="text/css" rel="stylesheet" href="{{asset('/dist/css/pages/colorpicker_hack.css')}}" />
  <!--Modal-->
  <link type="text/css" rel="stylesheet" href="{{asset('/dist/css/pages/portlet.css')}}"/>
  <link type="text/css" rel="stylesheet" href="{{asset('/dist/css/pages/advanced_components.css')}}"/>
  <link type="text/css" rel="stylesheet" href="#" id="skin_change"/>
  <!-- end of page level styles -->

  @yield('globalplugin')

</head>

<body>
  <!--</div>-->
  <div class="preloader" style=" position: fixed; width: 100%; height: 100%; top: 0; left: 0; z-index: 100000; backface-visibility: hidden; background: #ffffff;">
    <div class="preloader_img" style="width: 200px; height: 200px; position: absolute; left: 48%; top: 48%; background-position: center; z-index: 999999">
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

    <div id="left" style="min-height: 500px;">
      <div class="media user-media bg-dark dker">
        <div class="user-media-toggleHover">
          <span class="fa fa-user"></span>
        </div>
        <div class="user-wrapper">
          <a class="user-link" href="#">
            @if($val!="0")
            @foreach ($val as $vals)
            <img class="media-object img-thumbnail user-img rounded-circle admin_img3" alt="{{asset('/dist/img/admin.jpg')}}"
            src="{{asset('/images/profile_picts/'.$vals['pas_foto'])}}">
            @endforeach
            @else
              <img class="media-object img-thumbnail user-img rounded-circle admin_img3" alt="{{asset('/dist/img/admin.jpg')}}"
            src="{{asset('/images/profile_picts/admin.jpg')}}">
            @endif



            <p class="user-info menu_hide" style="color: darkslategrey">{{ Auth::user()->username }}
            </p>
          </a>
        </div>
      </div>
      <!-- #menu -->
      <ul id="menu" class="bg-blue dker">
        <li>
          <a href="/beta/public/home/">
            <i class="fa fa-home"></i>
            <span class="link-title menu_hide">&nbsp;Dashboard</span>
          </a>
        </li>
        @if (Auth::user()->isregistered == 't') <!-- updated by sun 19-08-05 -->
        <li>
          <a href="/beta/public/profile/{{$val[0]->kode_invite}}">
            <i class="fa fa-user"></i>
            <span class="link-title menu_hide">&nbsp;Profile</span>
          </a>
        </li>
        @endif

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

<script type="text/javascript" src="{{asset('/dist/vendors/jquery.uniform/js/jquery.uniform.js')}}"></script>
<script type="text/javascript" src="{{asset('/dist/vendors/inputlimiter/js/jquery.inputlimiter.js')}}"></script>
<script type="text/javascript" src="{{asset('/dist/vendors/chosen/js/chosen.jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('/dist/vendors/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/dist/vendors/jquery-tagsinput/js/jquery.tagsinput.js')}}"></script>
<script type="text/javascript" src="{{asset('/dist/vendors/validval/js/jquery.validVal.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/dist/vendors/moment/js/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/dist/vendors/daterangepicker/js/daterangepicker.js')}}"></script>
<script type="text/javascript" src="{{asset('/dist/vendors/datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/dist/vendors/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/dist/vendors/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/dist/vendors/autosize/js/jquery.autosize.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/dist/vendors/inputmask/js/inputmask.js')}}"></script>
<script type="text/javascript" src="{{asset('/dist/vendors/inputmask/js/jquery.inputmask.js')}}"></script>
<script type="text/javascript" src="{{asset('/dist/vendors/inputmask/js/inputmask.date.extensions.js')}}"></script>
<script type="text/javascript" src="{{asset('/dist/vendors/inputmask/js/inputmask.extensions.js')}}"></script>
<script type="text/javascript" src="{{asset('/dist/vendors/fileinput/js/fileinput.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/dist/vendors/fileinput/js/theme.js')}}"></script>
<script type="text/javascript" src="{{asset('/dist/vendors/multiselect/js/jquery.multi-select.js')}}"></script>
<script type="text/javascript" src="{{asset('/dist/vendors/inputmask/js/jquery.inputmask.bundle.js')}}"></script>
<script type="text/javascript" src="{{asset('/dist/vendors/jasny-bootstrap/js/jasny-bootstrap.min.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.3.1/jquery.quicksearch.min.js"></script>
<script type="text/javascript" src="{{asset('/dist/vendors/datetimepicker/js/DateTimePicker.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/dist/vendors/j_timepicker/js/jquery.timepicker.min.js')}}"></script>

<!-- end of plugin scripts-->
<script type="text/javascript" src="{{asset('/dist/js/form.js')}}"></script>
<script type="text/javascript" src="{{asset('/dist/js/pages/form_elements.js')}}"></script>
<script type="text/javascript" src="{{asset('/dist/js/pages/datetime_piker.js')}}"></script>
<script type="text/javascript" src="{{asset('/dist/js/pages/modals.js')}}"></script>

@yield('globaljs')
</body>
</html>
