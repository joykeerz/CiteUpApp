<!--templatenya-->
@extends('layouts/dashboard')
<!--/templatenya-->

<!--titlenya-->
@section('title','CITEUP 2019 | Peserta')
<!--/titlenya-->

<!--nama page-->
@section('PageName','Profile Page')
<!--/nama page-->

<!--breadcrumb-->
@section('breadcrumb')
<ol class="breadcrumb nav_breadcrumb_top_align">
  <li class="breadcrumb-item">
    <a href="home/">
      <i class="fa fa-home" data-pack="default" data-tags=""></i>
      Dashboard
    </a>
  </li>
  <li class="breadcrumb-item active">Profile Page</li>
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
          <form class="form-horizontal m-b-20" id="register_valid" action="/beta/public/peserta/profileupdate" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id_usr" value="{{ $val[0]->id_peserta }}">
            <input type="hidden" name="nama_usr" value="{{ Auth::user()->username }}">
            <input type="hidden" name="kode_random" value="{{$val[0]->kode_invite}}">
            <div id="rootwizard_no_val">
              <ul class="nav nav-pills">
                <li class="nav-item user1 m-t-15">
                  <a class="nav-link active" href="#tab11" data-toggle="tab"><span
                    class="userprofile_tab">1</span>Profil Peserta</a>
                  </li>
                  <li class="nav-item user2 m-t-15">
                    <a class="nav-link profile_details" href="#tab21"
                    data-toggle="tab"><span class="profile_tab">2</span>Profil Sekolah</a>
                  </li>
                  <li class="nav-item finish_tab m-t-15">
                    <a class="nav-link " href="#tab31" data-toggle="tab"><span>3</span>Berkas</a>
                  </li>
                </ul>
                <div class="tab-content m-t-20">

                  <div class="tab-pane active" id="tab11">
                    <div class="form-group">
                      <label for="name" class="col-form-label">Nama Depan</label>
                      <input id="name" name="fname" placeholder="Masukkan nama depan" type="text" class="form-control required" value="{{$val[0]->nama_depan}}">
                    </div>
                    <div class="form-group">
                      <label for="surname" class="col-form-label">Nama Belakang</label>
                      <input id="surname" name="lname" type="text" placeholder="Masukkan nama belakang" class="form-control required" value="{{$val[0]->nama_belakang}}">
                    </div>
                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <select class="custom-select form-control" title="Select an account type..." name="gender">
                        <option value="L" @if ($val[0]->jen_kel=='L') selected @endif>Laki-laki</option>
                        <option value="P" @if ($val[0]->jen_kel=='P') selected @endif>Perempuan</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="email1" class="col-form-label">Tanggal Lahir</label>
                      <div class="input-group">
                        <input type="text" class="form-control" name="tgl_lahir" placeholder="dd-mm-yyyy" id="dp1" value="{{$val[0]->tanggal_lahir}}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>No. HP</label>
                      <div class="input-group">
                      <span class="input-group-addon"> +62</span>
                      <input type="text" class="form-control general_number" placeholder="" name="telp" value="{{$val[0]->no_hp}}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="email1" class="col-form-label">Email</label>
                      <input id="email1" placeholder="Masukkan email" type="text" class="form-control email" name="email" value="{{ Auth::user()['email'] }}" disabled="disabled">
                    </div>
                    <div class="form-group">
                      <label for="address1">Alamat</label>
                      <textarea id="address1" type="text" class="form-control" name="alamat">{{$val[0]->alamat}}</textarea>
                    </div>
                  <ul class="pager wizard pager_a_cursor_pointer">
                    <li class="previous previous_btn1"><a>Previous</a></li>
                    <li class="next next_btn1"><a>Next</a></li>
                  </ul>
                </div>
                <div class="tab-pane" id="tab21">
                  <div class="form-group">
                    <label for="address1">Nama Sekolah</label>
                    <input id="email1" placeholder="Masukkan nama sekolah" type="text"
                    class="form-control email" name="nsekolah" value="{{$val[0]->asal_sekolah}}">
                  </div>
                  <div class="form-group">
                    <label for="address1">Kota Asal</label>
                    <input id="email1" placeholder="Masukkan kota asal sekolah" type="text"
                    class="form-control email" name="ksekolah" value="{{$val[0]->kota_sekolah}}">
                  </div>
                  <div class="form-group">
                    <label for="address1">Alamat Sekolah</label>
                    <textarea id="address1" type="text" class="form-control" name="asekolah">{{$val[0]->alamat_sekolah}}</textarea>
                  </div>
                  <ul class="pager wizard pager_a_cursor_pointer">
                    <li class="previous previous_btn2"><a>Previous</a></li>
                    <li class="next next_btn2"><a>Next</a></li>
                  </ul>
                </div>
                <div class="tab-pane" id="tab41">
                  <div class="form-group">
                    <label for="address1">Kategori</label>
                    <input id="email1" placeholder="Masukkan nama sekolah" type="text"
                    class="form-control email" name="nsekolah" value="{{$val[0]->asal_sekolah}}">
                  </div>
                  <div class="form-group">
                    <label for="address1">Kota Asal</label>
                    <input id="email1" placeholder="Masukkan kota asal sekolah" type="text"
                    class="form-control email" name="ksekolah" value="{{$val[0]->kota_sekolah}}">
                  </div>
                  <div class="form-group">
                    <label for="address1">Alamat Sekolah</label>
                    <textarea id="address1" type="text" class="form-control" name="asekolah">{{$val[0]->alamat_sekolah}}</textarea>
                  </div>
                  <ul class="pager wizard pager_a_cursor_pointer">
                    <li class="previous previous_btn2"><a>Previous</a></li>
                    <li class="next next_btn2"><a>Next</a></li>
                  </ul>
                </div>
                <div class="tab-pane" id="tab31">
                  <div class="form-group row m-t-35">
                    <div class="col-lg-3 text-center text-lg-right">
                      <label class="col-form-label">Pas Foto</label>
                    </div>
                    <div class="col-lg-6 text-center text-lg-left">
                      <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new img-thumbnail text-center">
                          <img src="{{asset('/images/profile_picts/'.$val[0]->pas_foto)}}" alt="not found" class="profile_img"></div>
                          <div class="fileinput-preview fileinput-exists img-thumbnail"></div>
                          <div class="m-t-20 text-center">
                            <span class="btn btn-primary btn-file">
                              <span class="fileinput-new">Select image</span>
                              <span class="fileinput-exists">Change</span>
                              <input type="file" name="pas_foto"></span>
                              <a href="#" class="btn btn-warning fileinput-exists"
                              data-dismiss="fileinput">Remove</a>
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
                              <img src="{{asset('/images/student_cards/'.$val[0]->kartu_pelajar)}}" alt="not found" class="profile_img"></div>
                              <div class="fileinput-preview fileinput-exists img-thumbnail"></div>
                              <div class="m-t-20 text-center">
                                <span class="btn btn-primary btn-file">
                                  <span class="fileinput-new">Select image</span>
                                  <span class="fileinput-exists">Change</span>
                                  <input type="file" name="kartu_pelajar"></span>
                                  <a href="#" class="btn btn-warning fileinput-exists"
                                  data-dismiss="fileinput">Remove</a>
                                </div>
                              </div>
                            </div>
                          </div>
                  <!--<div class="form-group">
                    <label>Alternate number</label>
                    <input type="text" class="form-control general_number" placeholder="(999)999-9999">
                  </div>-->
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
                    <li class="previous previous_btn3"><a>Previous</a></li>

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

@endsection
<!--/Isi page-->