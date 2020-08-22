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
        <dir class="container" style="height: 100%;">
          <div class="row">
            <div class="col-lg-12">
              <div class="card m-t-35"> <!-- class = card -->
                <div class="card-block m-t-35">
                  <div>
                    <h4 class="">Pendaftaran seminar telah berhasil!</h4>
                    <br>
                    <table>
                      <tr>
                        <td><h5>Pendaftaran seminar atas nama&emsp;</h5></td>
                        <td><h5>: {{$data->fullname}}</h5></td>
                      </tr>
                      <!--<tr>-->
                      <!--  <td><h5>Profesi</h5></td>-->
                      <!--  <td><h5>: {{$data->profesi}}</h5></td>-->
                      <!--</tr>-->
                      <!--<tr>-->
                      <!--  <td><h5>Instansi</h5></td>-->
                      <!--  <td><h5>: {{$data->instansi}}</h5></td>-->
                      <!--</tr>-->
                    </table>
                    <br>
                    <h5>Pembayaran sedang dalam tahap <b>verifikasi</b>. Cek email secara berkala untuk informasi.</h5>
                  </div>

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
  <!-- end of plugin scripts-->
  <script type="text/javascript" src="{{asset('/dist/js/pages/modals.js')}}"></script>
</body>
</html>