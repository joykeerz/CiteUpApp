<!--templatenya-->
@extends('layouts/dashboard')
<!--/templatenya-->

<!--titlenya-->
@section('title','CITEUP 2019 | Peserta')
<!--/titlenya-->

<!--nama page-->
@section('PageName','Formulir Registrasi')
<!--/nama page-->

<!--breadcrumb-->
@section('breadcrumb')
<ol class="breadcrumb nav_breadcrumb_top_align">
  <li class="breadcrumb-item">
    <a href="/home">
      <i class="fa fa-user" data-pack="default" data-tags=""></i>
      Dashboard
    </a>
  </li>
  <li class="breadcrumb-item active">Main Page</li>
</ol>
@endsection
<!--/breadcrumb-->

<!--Isi page-->
@section('content')

<div class="col-lg-8">
  <div class="row">
    <div class="col-lg-12">
      <div class=""> <!-- class="card"
        <div class="card-header bg-white">
          <i class="fa fa-file-text-o"></i>
          General Wizard
        </div>-->
        <div class="card-block m-t-20">
          <form class="form-horizontal m-b-20" id="register_valid" action="/peserta/profilestore" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id_usr" value="{{ Auth::user()->id }}">
            <input type="hidden" name="nama_usr" value="{{ Auth::user()->username }}">
            <input type="hidden" name="kode_random" value="{{Str::random(20)}}">
            <div id="rootwizard_no_val">
              <ul class="nav nav-pills">
                <li class="nav-item user1 m-t-15">
                  <a id="" class="htab1 nav-link active" href="#tab11" data-toggle="tab"><span class="userprofile_tab">1</span>Profil Peserta</a>
                </li>
                <li class="nav-item user2 m-t-15">
                  <a id="htab2" class="htab2 nav-link profile_details" href="#tab21" data-toggle="tab"><span class="profile_tab">2</span>Profil Sekolah</a>
                </li>
                <li class="nav-item finish_tab m-t-15">
                  <a id="htab3" class="htab3 nav-link " href="#tab41" data-toggle="tab"><span>3</span>Lomba</a>
                </li>
                <li class="nav-item finish_tab m-t-15">
                  <a id="htab4" class="htab4 nav-link " href="#tab31" data-toggle="tab"><span>4</span>Berkas</a>
                </li>
              </ul>
              @error('fname')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
              
              @error('lname')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror

              @error('gender')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror

              @error('tgl_lahir')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror

              @error('telp')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror

              @error('alamat')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror

              @error('nsekolah')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror

              @error('ksekolah')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror

              @error('asekolah')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror

              @error('jenis_lomba')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror

              @error('jenis_peserta')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror

              @error('pas_foto')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror

              @error('kartu_pelajar')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
              {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $error }}</strong>
                            <br>
                        </span>
                        @endforeach
                    </ul>
                </div>
              @endif --}}

              <div class="tab-content m-t-20">
                <div class="tab-pane active" id="tab11">
                  <div class="form-group">
                    <label for="name" class="col-form-label">Nama Depan</label>
                    <input id="name" name="fname" placeholder="Masukkan nama depan" type="text" class="form-control required @error('fname') is-invalid @enderror" value="{{ old('fname') }}">
                  </div>
                  <div class="form-group">
                    <label for="surname" class="col-form-label">Nama Belakang</label>
                    <input id="surname" name="lname" type="text" placeholder="Masukkan nama belakang" class="form-control required @error('lname') is-invalid @enderror" value="{{ old('lname') }}">
                  </div>
                  <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select class="custom-select form-control @error('gender') is-invalid @enderror" value="{{ old('gender') }}" title="Select an account type..." name="gender">
                      <option value="L" @if ($value['jen_kel']=='L') selected @endif>Laki-laki</option>
                      <option value="P" @if ($value['jen_kel']=='P') selected @endif>Perempuan</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="email1" class="col-form-label">Tanggal Lahir</label>
                    <div class="input-group">
                      <input type="text" class="form-control @error('tgl_lahir') is-invalid @enderror" value="{{ old('tgl_lahir') }}" name="tgl_lahir" placeholder="dd-mm-yyyy" id="dp1" value="{{ old('tgl_lahir') }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>No. HP</label>
                    <div class="input-group">
                    <span class="input-group-addon"> +62
                      </span>
                      <input type="text" class="form-control general_number @error('telp') is-invalid @enderror" value="{{ old('telp') }}" placeholder="" name="telp" value="{{ old('telp') }}" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="address1">Alamat</label>
                    <textarea id="address1" type="text" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}" name="alamat" value="{{ old('alamat') }}"></textarea>
                  </div>
                  <ul class="pager wizard pager_a_cursor_pointer">
                    <!--<li class="previous previous_btn1"><a>Previous</a></li>-->
                    <li class="next next_btn1"><a id="ntab2" href="#tab21" data-toggle="tab">Next</a></li>
                  </ul>
                </div>
                <div class="tab-pane" id="tab21">
                  <div class="form-group">
                    <label for="address1">Nama Sekolah</label>
                    <input id="email1" placeholder="Masukkan nama sekolah" type="text" class="form-control email @error('nsekolah') is-invalid @enderror" value="{{ old('nsekolah') }}" name="nsekolah" value="{{ old('nsekolah') }}">
                  </div>
                  <div class="form-group">
                    <label for="address1">Kota Asal</label>
                    <input id="email1" placeholder="Masukkan kota asal sekolah" type="text" class="form-control email @error('ksekolah') is-invalid @enderror" value="{{ old('ksekolah') }}" name="ksekolah" value="{{ old('ksekolah') }}">
                  </div>
                  <div class="form-group">
                    <label for="address1">Alamat Sekolah</label>
                    <textarea id="address1" type="text" class="form-control @error('asekolah') is-invalid @enderror" value="{{ old('asekolah') }}" name="asekolah" value="{{ old('asekolah') }}"></textarea>
                  </div>
                  <ul class="pager wizard pager_a_cursor_pointer">
                    <li class="previous previous_btn2"><a href="#tab11" data-toggle="tab">Previous</a></li>
                    <li class="next next_btn2"><a id="ntab3" href="#tab41" data-toggle="tab">Next</a></li>
                  </ul>
                </div>
                <div class="tab-pane" id="tab41">
                  <div class="form-group">
                    <label for="address1">Kategori Lomba</label>
                    <select class="form-control @error('jenis_lomba') is-invalid @enderror" value="{{ old('jenis_lomba') }}" name="jenis_lomba" id="kategori" onchange="addfield(this.value)">
                      <option value="Logika">Logika</option>
                      <option value="Desain">Desain</option>
                    </select>
                  </div>
                  <div class="form-group" id="jen_peserta">
                    <label for="address1">Status Peserta</label>
                    <select class="form-control @error('jenis_peserta') is-invalid @enderror" value="{{ old('jenis_peserta') }}" name="jenis_peserta">
                      <option value="Ketua">Ketua</option>
                      <option value="Anggota">Anggota</option>
                    </select>
                  </div>
                  <ul class="pager wizard pager_a_cursor_pointer">
                    <li class="previous previous_btn2"><a href="#tab21" data-toggle="tab">Previous</a></li>
                    <li class="next next_btn2"><a id="ntab4" href="#tab31" data-toggle="tab">Next</a></li>
                  </ul>
                </div>
                <div class="tab-pane" id="tab31">
                  <div class="form-group row m-t-35">
                    <div class="col-lg-3 text-center text-lg-right">
                      <label class="col-form-label">Pas Foto (.jpg atau .png)</label>
                    </div>
                    <div class="col-lg-6 text-center text-lg-left">
                      <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new img-thumbnail text-center">
                          <img src="{{asset('/images/profile_picts/'.$value['pas_foto'])}}" alt="Image" class="profile_img">
                        </div>
                        <div class="fileinput-preview fileinput-exists img-thumbnail">
                        </div>
                        <div class="m-t-20 text-center">
                          <span class="btn btn-primary btn-file">
                            <span class="fileinput-new">Select image</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" name="pas_foto" class="@error('pas_foto') is-invalid @enderror" value="{{ old('pas_foto') }}" value="{{ old('pas_foto') }}">
                          </span>
                          <a href="#" class="btn btn-warning fileinput-exists" data-dismiss="fileinput">Remove</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row m-t-35">
                    <div class="col-lg-3 text-center text-lg-right">
                      <label class="col-form-label">Kartu Pelajar</label>
                    </div>
                    <div class="col-lg-6 text-center text-lg-left">
                      <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new img-thumbnail text-center">
                          <img src="{{asset('/images/student_cards/'.$value['kartu_pelajar'])}}" alt="Image" class="profile_img">
                        </div>
                        <div class="fileinput-preview fileinput-exists img-thumbnail">
                        </div>
                        <div class="m-t-20 text-center">
                          <span class="btn btn-primary btn-file">
                            <span class="fileinput-new">Select image</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" name="kartu_pelajar" value="{{ old('kartu_pelajar') }}" class="@error('kartu_pelajar') is-invalid @enderror" value="{{ old('kartu_pelajar') }}">
                          </span>
                          <a href="#" class="btn btn-warning fileinput-exists" data-dismiss="fileinput">Remove</a>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!--<div class="form-group">
                    <span>Terms and Conditions </span>
                    <br>
                    <label class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input">
                      <span class="custom-control-indicator"></span>
                      <span class="custom-control-description"> I agree with the Terms and Conditions.</span>
                    </label>
                  </div>-->
                  <ul class="pager wizard pager_a_cursor_pointer">
                    <li class="previous previous_btn3"><a href="#tab31" data-toggle="tab">Previous</a></li>
                    <li class="next" id="submit_profile">
                      <input type="submit" name="submit" value="submit" class="btn btn-primary button-rounded">
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function addfield(value) {

    if (value=="Logika") {
      //alert(value);
      $("#jen_peserta").css('display','');
    } else {
      $("#jen_peserta").css('display','none');
    }
  }

  $(document).ready(function(){
    $('#ntab1').click(function() {
      $(".htab1").add(active);
      $(".htab2").remove(active);
      $(".htab3").remove(active);
      $(".htab4").remove(active);
    });
    $('#ntab2').click(function() {
      $(".htab1").remove(active);
      $(".htab2").add(active);
      $(".htab3").remove(active);
      $(".htab4").remove(active);
    });
    $('#ntab3').click(function() {
      $(".htab1").remove(active);
      $(".htab2").remove(active);
      $(".htab3").add(active);
      $(".htab4").remove(active);
    });
    $('#ntab4').click(function() {
      $(".htab1").remove(active);
      $(".htab2").remove(active);
      $(".htab3").remove(active);
      $(".htab4").add(active);
    });
  });

</script>
@endsection
<!--/Isi page-->