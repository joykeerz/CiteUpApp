<!--templatenya-->
@extends('layouts/dashboard')
<!--/templatenya-->

<!--titlenya-->
@section('title','CITEUP 2019 | Peserta')
<!--/titlenya-->

<!--nama page-->
@section('PageName','Main Page')
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
  <li class="breadcrumb-item active">Main Page</li>
</ol>
@endsection
<!--/breadcrumb-->

<!--Isi page-->
@section('content')
<div class="row">
  <div class="col-lg-12">
            <div class="cardx"> <!-- class = card
              <div class="card-header bg-white">Main Menu</div>-->
              <div class="card-block cards_section_margin">
                <div class="row">
                  <div class="col-lg-4 m-t-35">
                    <div class="card">
                      <div class="card-header bg-white"><i class="fa fa-money mr-3"></i>Pembayaran</div>
                      <div class="card-block">
                        <p>
                          Info Pembayaran dan Validasi Pembayaran
                        </p>
                      </div>
                      <div class="card-footer bg-white">
                        <a class="btn btn-primary" href="pembayaran/{{ $val[0]->kode_invite }}"><i class="fa fa-check-circle-o" style="font-size:2em;color:white"></i></a>
                      </div>
                    </div>
                  </div>
                  @if ($data->jenis_lomba=="Logika")
                  <div class="col-lg-4 m-t-35">
                    <div class="card">
                      <div class="card-header bg-white"><i class="fa fa-users mr-3"></i>Kelompok</div>
                      <div class="card-block">
                        <p>
                          Informasi Kelompok dan Anggota
                        </p>
                      </div>
                      <div class="card-footer bg-white"> <!--Auth::user()->id-->
                        <a class="btn btn-primary" href="kelompok/{{ $val[0]->kode_invite }}"><i class="fa fa-check-circle-o" style="font-size:2em;color:white"></i></a>
                      </div>
                    </div>
                  </div>
                  @endif


                  <div class="col-lg-4 m-t-35">
                    <div class="card">
                      <div class="card-header bg-white"><i class="fa fa-flag-checkered mr-3"></i>Lomba</div>
                      <div class="card-block">
                        <p>
                          Informasi Lomba
                        </p>
                      </div>
                      <div class="card-footer bg-white">
                        <a class="btn btn-primary" href="info-lomba"><i class="fa fa-check-circle-o" style="font-size:2em;color:white"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endsection
<!--/Isi page-->