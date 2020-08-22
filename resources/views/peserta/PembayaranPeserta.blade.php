<!--templatenya-->
@extends('layouts/dashboard')
<!--/templatenya-->

<!--titlenya-->
@section('title','CITEUP 2019 | Peserta')
<!--/titlenya-->

<!--nama page-->
@section('PageName','Payment Page')
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
  <li class="breadcrumb-item active">Payment Page</li>
</ol>
@endsection
<!--/breadcrumb-->

<!--Isi page-->
@section('content')
<div class="row">
  <div class="col-lg-12">
    @if(Session::get('msg')==9)
    <p class="lable p-d-15 bg-warning">Anggota tim masih kurang dari 3 orang. Silahkan udang anggota terlebih dahulu!</p>
    @elseif(Session::get('msg')==1)
    <p class="lable p-d-15 bg-success">Bukti pembayaran berhasil diupload!</p>
    @endif
    <div class="card">
      <div class="card-header bg-white">Payment Menu</div>
      <div class="card-block cards_section_margin">
        <div class="row">
          <div class="col-lg-6 m-t-35">
            <div class="card">
              <div class="card-header bg-white"><i class="fa fa-money mr-3"></i>Status Pembayaran</div>
              <div class="card-block">
                @if ($value->status == 'pending')
                <div class="icon_align bg-white section_border">
                  <div class="float-left progress_icon">
                    <i class="fa fa-meh-o text-success" aria-hidden="true" style="font-size:5em;"></i>
                  </div>
                  <div class="text-right">
                    <h3 id="widget_count5">Pending</h3>
                    <p>Menunggu Verifikasi Admin</p>
                  </div>
                </div>
                @endif
                @if ($value->status == 'no')
                <div class="icon_align bg-white section_border">
                  <div class="float-left progress_icon">
                    <i class="fa fa-ban text-danger" aria-hidden="true" style="font-size:5em;"></i>
                  </div>
                  <div class="text-right">
                    <h3 id="widget_count5">Belum Bayar</h3>
                    <p>Silahkan Upload Bukti Bayar</p>
                  </div>
                  <form action="/beta/public/pembayaran/store" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="kd_invite" value="{{$val[0]->kode_invite}}">
                    <span class="btn btn-primary btn-file float-left mt-3">
                      <span class="fileinput-new">Select image</span>
                      <input type="hidden"><input type="file" name="payment_img">
                    </span>

                    <button class="btn btn-labeled btn-primary float-right mt-3" type="submit">
                      <span class="btn-label">
                        <i class="fa fa-check"></i>
                      </span>
                      Upload
                    </button>
                  </form>
                  <!--<a class="btn btn-primary float-right"><i class="fa fa-upload" style="font-size:2em;color:white"></i></a>-->
                </div>
                @endif

                @if ($value->status == 'rejected')
                <div class="icon_align bg-white section_border">
                  <div class="float-left progress_icon">
                    <i class="fa fa-ban text-danger" aria-hidden="true" style="font-size:5em;"></i>
                  </div>
                  <div class="text-right">
                    <h3 id="widget_count5">Pembayaran anda ditolak</h3>
                    <p>Silahkan Upload Bukti Bayar Ulang</p>
                  </div>
                  <form action="/beta/public/pembayaran/store" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="kd_peserta" value="{{$value->id_peserta}}">
                    <span class="btn btn-primary btn-file float-left mt-3">
                      <span class="fileinput-new">Select image</span>
                      <input type="hidden"><input type="file" name="payment_img">
                    </span>

                    <button class="btn btn-labeled btn-primary float-right mt-3" type="submit">
                      <span class="btn-label">
                        <i class="fa fa-check"></i>
                      </span>
                      Upload
                    </button>
                  </form>
                  <!--<a class="btn btn-primary float-right"><i class="fa fa-upload" style="font-size:2em;color:white"></i></a>-->
                </div>
                @endif

                @if($value->status == 'yes')
                <div class="icon_align bg-white section_border">
                  <div class="float-left progress_icon">
                    <i class="fa fa-check text-primary" aria-hidden="true" style="font-size:5em;"></i>
                  </div>
                  <div class="text-right">
                    <h3 id="widget_count5">Sudah Bayar</h3>
                    <p>Pembayaran Sudah Diverifikasi Admin</p>
                  </div>
                </div>
                @endif

              </div>
              <div class="card-footer bg-white">
                @if($errors->has('payment_img'))
                <div class="alert alert-danger alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                  </button>
                  <strong>Oh snap!</strong>
                  <p>{{$errors->first('payment_img')}}</p>
                </div>
                @endif
              </div>
            </div>
          </div>
          <div class="col-lg-6 m-t-35">

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
<!--/Isi page-->