
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

  <link type="text/css" rel="stylesheet" href="{{asset('/dist/vendors/bootstrap-switch/css/bootstrap-switch.min.css')}}"/>
  <link type="text/css" rel="stylesheet" href="{{asset('/dist/vendors/jasny-bootstrap/css/jasny-bootstrap.min.css')}}"/>
  <link type="text/css" rel="stylesheet" href="{{asset('/dist/vendors/fileinput/css/fileinput.min.css')}}"/>
  <link type="text/css" rel="stylesheet" href="{{asset('/dist/vendors/multiselect/css/multi-select.css')}}"/>
  <link type="text/css" rel="stylesheet" href="{{asset('/dist/vendors/bootstrapvalidator/css/bootstrapValidator.min.css')}}"/>
  <!-- end plugin styles-->

  <!--Page level styles-->
  <link type="text/css" rel="stylesheet" href="{{asset('/dist/css/pages/form_elements.css')}}"/>
  <link type="text/css" rel="stylesheet" href="{{asset('/dist/css/pages/wizards.css')}}"/>
  <link type="text/css" rel="stylesheet" href="{{asset('/dist/css/pages/icon.css')}}"/>
  <!--Modal-->
  <link type="text/css" rel="stylesheet" href="{{asset('/dist/css/pages/portlet.css')}}"/>
  <link type="text/css" rel="stylesheet" href="{{asset('/dist/css/pages/advanced_components.css')}}"/>
  <link type="text/css" rel="stylesheet" href="#" id="skin_change"/>
  <!-- end of page level styles -->

</head>

<body>
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
  </div>

  <div id="content" class="bg-container">
    <div class="row">
      <div class="col-lg-12">
        <dir class="container">
          <div class="row">
          <div class="col-lg-12">
              <div class="card m-t-35"> <!-- class = card -->
                <div class="card-block m-t-35">
                  <div>
                    <h4>Pendaftaran Seminar</h4>
                  </div>
                  
                    <!--<h1>Coming Soon</h1>-->
                  <form class="form-horizontal login_validator" id="tryitForm" action="/beta/public/seminarRegist" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="kode_random" value="{{Str::random(20)}}">
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group row m-t-25">
                          <div class="col-lg-3 text-lg-right">
                            <label for="u-name" class="col-form-label">Nama Lengkap *</label>
                          </div>
                          <div class="col-xl-6 col-lg-8">
                            <div class="input-group">
                              <span class="input-group-addon"> <i class="fa fa-user text-primary"></i>
                              </span>
                              <input type="text" name="fullname" id="u-name" class="form-control">
                            </div>

                          </div>
                        </div>
                        <!--<div class="form-group row m-t-25">-->
                        <!--  <div class="col-lg-3 text-lg-right">-->
                        <!--    <label for="u-name" class="col-form-label">Profesi *</label>-->
                        <!--  </div>-->
                        <!--  <div class="col-xl-6 col-lg-8">-->
                        <!--    <div class="input-group">-->
                        <!--      <span class="input-group-addon"> <i class="fa fa-suitcase text-primary"></i>-->
                        <!--      </span>-->
                        <!--      <input type="text" name="profesi" id="u-name" class="form-control">-->
                        <!--    </div>-->
                        <!--  </div>-->
                        <!--</div>-->
                        <!--<div class="form-group row m-t-25">-->
                        <!--  <div class="col-lg-3 text-lg-right">-->
                        <!--    <label for="u-name" class="col-form-label">Instansi/Universitas *</label>-->
                        <!--  </div>-->
                        <!--  <div class="col-xl-6 col-lg-8">-->
                        <!--    <div class="input-group">-->
                        <!--      <span class="input-group-addon"> <i class="fa fa-university text-primary"></i>-->
                        <!--      </span>-->
                        <!--      <input type="text" name="instansi" id="u-name" class="form-control">-->
                        <!--    </div>-->
                        <!--  </div>-->
                        <!--</div>-->
                        <div class="form-group row">
                          <div class="col-lg-3 text-lg-right">
                            <label for="address" class="col-form-label">Alamat *</label>
                          </div>
                          <div class="col-xl-6 col-lg-8">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-plus text-primary"></i></span>
                              <input type="text" placeholder=" "  id="address" name="address"  class="form-control">
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-lg-3 text-lg-right">
                            <label for="phone" class="col-form-label">Phone *</label>
                          </div>
                          <div class="col-xl-6 col-lg-8">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-phone text-primary"></i></span>
                              <input type="text" placeholder=" " id="cell" name="no_hp" class="form-control">
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-lg-3 text-lg-right">
                            <label for="email" class="col-form-label">Email *</label>
                          </div>
                          <div class="col-xl-6 col-lg-8">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-envelope text-primary"></i></span>
                              <input type="text" placeholder=" " id="email" name="email" class="form-control">
                            </div>
                          </div>
                        </div>
                        <!--<div class="form-group row m-t-25">-->
                        <!--  <div class="col-lg-3 text-lg-right">-->
                        <!--    <label for="u-name" class="col-form-label">Media Sosial *</label>-->
                        <!--  </div>-->
                        <!--  <div class="col-xl-6 col-lg-8">-->
                        <!--    <div class="input-group">-->
                        <!--      <span class="input-group-addon"> <i class="fa fa-instagram text-primary"></i>-->
                        <!--      </span>-->
                        <!--      <input type="text" name="medsos" id="u-name" class="form-control">-->
                        <!--    </div>-->
                        <!--  </div>-->
                        <!--</div>-->
                        <div class="form-group row m-t-25">
                          <div class="col-lg-3 text-lg-right">
                            <label for="u-name" class="col-form-label">Bukti Bayar *</label>
                          </div>
                          <div class="col-xl-6 col-lg-8">
                            <div class="input-group">
                              <input type="file" name="payment" class="form-control" required="required">
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-lg-9 push-lg-3">
                            <button class="btn btn-primary" type="submit">
                              <i class="fa fa-user"></i>
                              Submit
                            </button>
                            <button class="btn btn-warning" type="reset" id="clear">
                              <i class="fa fa-refresh"></i>
                              Reset
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>

              </div>
            </div>
          </div>
        </dir>
      </div>
    </div>
  </div>

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
  <script type="text/javascript" src="{{asset('/dist/vendors/jquery-tagsinput/js/jquery.tagsinput.js')}}"></script>
  <script type="text/javascript" src="{{asset('/dist/vendors/validval/js/jquery.validVal.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('/dist/vendors/moment/js/moment.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('/dist/vendors/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('/dist/vendors/autosize/js/jquery.autosize.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('/dist/vendors/inputmask/js/inputmask.js')}}"></script>
  <script type="text/javascript" src="{{asset('/dist/vendors/inputmask/js/jquery.inputmask.js')}}"></script>
  <script type="text/javascript" src="{{asset('/dist/vendors/inputmask/js/inputmask.extensions.js')}}"></script>
  <script type="text/javascript" src="{{asset('/dist/vendors/fileinput/js/fileinput.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('/dist/vendors/fileinput/js/theme.js')}}"></script>
  <script type="text/javascript" src="{{asset('/dist/vendors/multiselect/js/jquery.multi-select.js')}}"></script>
  <script type="text/javascript" src="{{asset('/dist/vendors/inputmask/js/jquery.inputmask.bundle.js')}}"></script>
  <script type="text/javascript" src="{{asset('/dist/vendors/jasny-bootstrap/js/jasny-bootstrap.min.js')}}"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.3.1/jquery.quicksearch.min.js"></script>

  <!-- end of plugin scripts-->
  <script type="text/javascript" src="{{asset('/dist/js/form.js')}}"></script>
  <script type="text/javascript" src="{{asset('/dist/js/pages/form_elements.js')}}"></script>
  <script type="text/javascript" src="{{asset('/dist/js/pages/datetime_piker.js')}}"></script>
  <script type="text/javascript" src="{{asset('/dist/js/pages/modals.js')}}"></script>
</body>
</html>