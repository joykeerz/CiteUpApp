<!DOCTYPE html>
<html>
<head>
  <title>Register | CITEUP</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="shortcut icon" href="{{asset('/dist/img/logo1.ico')}}"/>
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

  <!--HEADER-->
  <div class="site-wrap">

    <header class="site-navbar py-3" role="banner">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-2 col-xl-1">
            <!--<h1 class="mb-0"><a href="index.html" class="text-white h2 mb-0">CITE UP 3</a></h1>-->
            <img src="images/index/logo-hmik.png" alt="Image" class="img-fluid">
          </div>
          <div class="col-12 col-md-10 d-none d-xl-block">
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
    </header>

    <div class="preloader" style=" position: fixed;width: 100%;height: 100%;top: 0;left: 0;z-index: 100000;backface-visibility: hidden;background: #ffffff;">
      <div class="preloader_img" style="width: 200px; height: 200px;position: absolute;left: 48%;top: 48%;background-position: center;z-index: 999999">
        <img src="{{asset('/dist/img/loader.gif')}}" style=" width: 40px;" alt="loading...">
      </div>
    </div>

    <div class="container wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">

      <div class="row login_top_bottom">
        <div class="col-lg-10 push-lg-1 col-sm-10 push-sm-1">
          <div class="row">
            <div class="col-lg-8 push-lg-2 col-sm-10 push-sm-1">
              <div class="login_logo login_border_radius1">
                <h3 class="text-center">
                  <!--<img src="{{asset('/dist/img/logow.png')}}" alt="" class="admire_logo">-->
                  <span class="text-white">CITEUP<br/>2019</span>
                </h3>
              </div>
              <div class="bg-white login_content login_border_radius">
                @yield('content')
                <!--
                //Form Wizard Pendaftaran tapi gajadi dipake
                <div class="card">

                  <div class="card-header bg-white">
                    <i class="fa fa-file-text-o"></i>
                    Form Registrasi Peserta
                  </div>
                  <form class="" id="register_valid" action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="card-block m-t-20">
                      <div id="rootwizard_no_val">
                        <ul class="nav nav-pills">
                          <li class="nav-item user1 m-t-15">
                            <a class="nav-link" href="#tab11" data-toggle="tab"><span
                              class="userprofile_tab">1</span>Data User
                            </a>
                          </li>
                          <li class="nav-item user2 m-t-15">
                            <a class="nav-link profile_details" href="#tab21"
                            data-toggle="tab"><span class="profile_tab">2</span>Data Peserta & kelompok</a>
                          </li>
                          <li class="nav-item finish_tab m-t-15">
                            <a class="nav-link " href="#tab31" data-toggle="tab"><span>3</span>Finish</a>
                          </li>
                        </ul>

                        <div class="tab-content m-t-20">
                          <div class="tab-pane" id="tab11">
                            <div class="form-group">
                              <label for="name" class="control-label">{{ __('Nama ') }}</label>
                              <input type="text" class="form-control @error('name') is-invalid @enderror"
                              name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Masukan Nama..">
                              @error('name')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="email1" class="control-label">{{ __('Email ') }}</label>
                              <input id="email1" type="email" class="form-control email @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Masukan Email..">
                              @error('email')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="password1" class="control-label">Password</label>
                              <input id="password1" type="password" class="form-control @error('password') is-invalid @enderror"
                              name="password" required autocomplete="new-password" placeholder="Masukan Password..">
                              @error('password')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="confirm1" class="control-label">Confirm Password</label>
                              <input id="confirm1" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Masukan Ulang Password..">
                            </div>
                            <ul class="pager wizard pager_a_cursor_pointer">
                              <li class="previous previous_btn1"><a>Previous</a></li>
                              <li class="next next_btn1"><a>Next</a></li>
                            </ul>
                          </div>
                          <div class="tab-pane" id="tab21">
                            <div class="form-group">
                              <label for="sekolah" class="control-label">Asal Sekolah</label>
                              <input id="sekolah" type="text" class="form-control required @error('sekolah') is-invalid @enderror" name="sekolah" value="{{ old('sekolah') }}" required autocomplete="sekolah" autofocus placeholder="masukan nama sekolah..">

                              @error('sekolah')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label>Lomba</label>
                              <select class="custom-select form-control" title="Select an account type..." id="jenis" name="jenis" alue="{{ old('jenis') }}" required autocomplete="jenis" autofocus>
                                <option>Logika</option>
                                <option>Desain</option>
                                <option>Pengetahuan Umum</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="address1">Alamat</label>
                              <input id="address1" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat" autofocus placeholder="masukan alamat sekolah...">

                              @error('alamat')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="kelompok" class="control-label">Nama Kelompok</label>
                              <input id="kelompok" type="text" class="form-control @error('kelompok') is-invalid @enderror" name="kelompok" value="{{ old('kelompok') }}" required autocomplete="kelompok" autofocus placeholder="masukan nama kelompok...">

                              @error('kelompok')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                            <ul class="pager wizard pager_a_cursor_pointer">
                              <li class="previous previous_btn2"><a>Previous</a></li>
                              <li class="next next_btn2"><a>Next</a></li>
                            </ul>
                          </div>
                          <div class="tab-pane" id="tab31">
                            <div class="form-group">
                              <label>No. Telp</label>
                              <input id="NoHp" type="text" class="form-control @error('NoHp') is-invalid @enderror" name="NoHp" value="{{ old('NoHp') }}" required autocomplete="NoHp" autofocus placeholder="(+62)999-9999">

                              @error('NoHp')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>

                            <div class="form-group">
                              <span>Terms and Conditions </span>
                              <br>
                              <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input">
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description"> I agree with the Terms and Conditions.</span>
                              </label>
                            </div>

                            <ul class="pager wizard pager_a_cursor_pointer">
                              <li class="previous previous_btn3"><a>Previous</a></li>
                              <li class="next"><input type="submit" value="{{ __('Register') }}" class="btn btn-primary" style="float: right"/></li>
                              <li class="next"><a>Finish</a></li>
                            </ul>
                          </div>
                        </div>

                      </div>
                    </div>
                  </form>
                </div>

              -->
              </div>
            </div>
          </div>
        </div>
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

  </div>

</body>

</html>