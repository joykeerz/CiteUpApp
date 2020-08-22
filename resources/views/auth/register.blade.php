@extends('layouts/regist')

@section('content')
<div class="">
  <div class="row" style="margin: 0!important;">

    <div class="col-12 col-md-6 d-none d-xl-block " id="lr-image">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <img src="{{asset('/dist/img/citeup/Cite-UP.png')}}" alt="Image" class="img-fluid">
        </div>
      </div>
    </div>
    <div class="col-12 col-xl-6" id="lr-content">

      <div class="col-12 d-none x-xl-block">
        <div class="col-md-4 p-t-25">
          <img src="{{asset('/dist/img/citeup/Cite-UP.png')}}" alt="Image" class="img-fluid" style="width: 180px; height: auto;">
        </div>
      </div>
      <div class="container">

        <div class="row align-items-center justify-content-center text-center" >
          <div id="form-tab" class="col-xl-10 col-md-10 col-12">
            <div class="tab">
              <ul class="nav nav-pills">
                <li class="nav-item "><a class="nav-link active" data-toggle="tab" href="#tab-login" style="transition: none;">Login</a></li>
                <li class="nav-item "><a class="nav-link" data-toggle="tab" href="#tab-register" style="transition: none;">Register</a></li>
              </ul>
            </div>

            <div class="tab-content m-t-40">
              <div id="tab-login" class="tab-pane active">
                <form class="form-horizontal m-b-20" id="register_valid" action="{{ route('login') }}" method="post">
                  @csrf
                  <div class="form-group p-t-15">
                    <!--<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama ') }}</label>-->
                    
                    <div class="container col-xl-10 col-sm-12">
                      <div class="input-group">

                        <span class="input-group-addon form-icon"> <i class="fa fa-envelope text-primary"></i>
                        </span>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email...">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div class="form-group p-t-5">

                    <div class="container col-xl-10 col-lg-8">
                      <div class="input-group">
                        <span class="input-group-addon form-icon"> <i class="fa fa-lock text-primary"></i>
                        </span>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-col-xl-10 col-lg-8" placeholder="Password...">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="form-group p-t-25">
                    <div class="col-sm-6 offset-lg-5">
                      <button type="reset" class="btn-new btn-danger button-rectangle text-uppercase">Reset</button>
                      <input type="submit" value="{{ __('submit') }}" class="btn-new btn-warning button-rectangle text-uppercase"/>
                    </div>
                  </div>
                </form>

              </div>
              <div id="tab-register" class="tab-pane fade">
                    
                      <div class="form-group p-t-15">

                    <div class="container col-xl-10 col-lg-8">
                      <div class="input-group">
                        <strong>Sorry But We're Already Closed  =(</strong>
                      </div>
                    </div>
                  </div>
                <!--<form class="form-horizontal m-b-20" id="register_valid" action="{{ route('register') }}" method="post">-->
                <!--  @csrf-->
                <!--  <div class="form-group p-t-15">-->

                <!--    <div class="container col-xl-10 col-lg-8">-->
                <!--      <div class="input-group">-->
                <!--        <span class="input-group-addon form-icon"> <i class="fa fa-user text-primary"></i>-->
                <!--        </span>-->
                <!--        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Username...">-->

                <!--        @error('name')-->
                <!--        <span class="invalid-feedback" role="alert">-->
                <!--          <strong>{{ $message }}</strong>-->
                <!--        </span>-->
                <!--        @enderror-->
                <!--      </div>-->
                <!--    </div>-->
                <!--  </div>-->

                <!--  <div class="form-group p-t-5">-->

                <!--    <div class="container col-xl-10 col-lg-8">-->
                <!--      <div class="input-group">-->
                <!--        <span class="input-group-addon form-icon"> <i class="fa fa-envelope text-primary"></i>-->
                <!--        </span>-->
                <!--        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email...">-->

                <!--        @error('email')-->
                <!--        <span class="invalid-feedback" role="alert">-->
                <!--          <strong>{{ $message }}</strong>-->
                <!--        </span>-->
                <!--        @enderror-->
                <!--      </div>-->
                <!--    </div>-->
                <!--  </div>-->

                  <!--div class="form-group p-t-5">
                <!--    <div class="container col-xl-10 col-sm-12">-->
                <!--      <div class="input-group">-->
                <!--        <span class="input-group-addon form-icon"> <i class="fa fa-envelope text-primary"></i>-->
                <!--        </span>-->
                <!--        <select class="form-control" name="jenis_lomba" id="kategori" onchange="addfield(this.value)">-->
                <!--          <option value="Logika">Logika</option>-->
                <!--          <option value="Desain">Desain</option>-->
                <!--          <option value="Seminar">Seminar</option>-->
                <!--        </select>-->
                <!--      </div>-->
                <!--      <div class="input-group m-t-10" id="jen_peserta" style="display: flex;">-->
                <!--        <span class="input-group-addon form-icon"> <i class="fa fa-envelope text-primary"></i>-->
                <!--        </span>-->
                <!--        <select class="form-control" name="jenis_peserta">-->
                <!--          <option value="Ketua">Ketua</option>-->
                <!--          <option value="Anggota">Anggota</option>-->
                <!--        </select>-->
                <!--      </div>-->
                <!--    </div>-->
                <!--  </div>-->

                <!--  <div class="form-group p-t-5">-->
                <!--    <div class="container col-xl-10 col-lg-8">-->
                <!--      <div class="input-group">-->
                <!--        <span class="input-group-addon form-icon"> <i class="fa fa-lock text-primary"></i>-->
                <!--        </span>-->
                <!--        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password...">-->

                <!--        @error('password')-->
                <!--        <span class="invalid-feedback" role="alert">-->
                <!--          <strong>{{ $message }}</strong>-->
                <!--        </span>-->
                <!--        @enderror-->
                <!--      </div>-->
                <!--    </div>-->
                <!--  </div>-->

                <!--  <div class="form-group p-t-5">-->

                <!--    <div class="container col-xl-10 col-lg-8">-->
                <!--      <div class="input-group">-->
                <!--        <span class="input-group-addon form-icon"> <i class="fa fa-lock text-primary"></i>-->
                <!--        </span>-->
                <!--        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Konfirmasi Password...">-->
                <!--      </div>-->
                <!--    </div>-->
                <!--  </div>-->
                <!--  <div class="form-group p-t-25">-->
                <!--    <div class="col-sm-6 offset-lg-5">-->
                <!--      <button type="reset" class="btn-new btn-danger button-rectangle text-uppercase">Reset</button>-->
                <!--      <input type="submit" value="{{ __('submit') }}" class="btn-new btn-warning button-rectangle text-uppercase"/>-->
                <!--    </div>-->
                <!--  </div>-->
                <!--</form>-->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  function addfield(value) {

    if (value=="Logika") {
      //alert(value);
      $("#jen_peserta").css('display','flex');
    } else {
      $("#jen_peserta").css('display','none');
    }
  }
</script>
@endsection

