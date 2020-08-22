<!--templatenya-->
@extends('layouts/dashboard')
<!--/templatenya-->

<!--titlenya-->
@section('title','CITEUP 2019 | Peserta')
<!--/titlenya-->

<!--nama page-->
@section('PageName','Informasi Cite UP ')
<!--/nama page-->

<!--breadcrumb-->
@section('breadcrumb')
<ol class="breadcrumb nav_breadcrumb_top_align">
  <li class="breadcrumb-item">
    <a href="home/">
      <i class="fa fa-user" data-pack="default" data-tags=""></i>
      Dashboard
    </a>
  </li>
  <li class="breadcrumb-item active">Info Lomba</li>
</ol>
@endsection
<!--/breadcrumb-->

<!--Isi page-->
@section('content')

<div class="row">
  <div class="col-lg-12">
    <div class="cardx"> <!-- class = card
      <div class="card-header bg-white">Main Menu</div>-->
      <div class="card-block cards_section_margin text-white text-center">
        <div class="row">
        <div class="col-lg-5 offset-3 m-t-20">
            @if(Session::get('msg')==1)
                    <p class="lable p-d-15 bg-danger">Maaf jatah percobaan lomba anda sudah habis.</p>
            @endif
            @if($status == 0)
            <p class="lable p-d-15 bg-danger">Maaf Lomba Sudah Tutup</p>
            @endif
            <div class="card p-t-25" style="background-color: #5e9219;">
              <img src="{{asset('dist/img/citeup/logic.png')}}" class="icon">
              <h2 class="my-4 heading">Logika</h2>
              <div class="card-block">
                <p class="p-d-15 l-h-1">
                  Apakah Kamu Yakin Sudah siap? Jika sudah Klik Tombol Dibawah Ini Dan Mulai Kompetisinya!
                </p>
                <p class="p-d-15 l-h-1">
                    kesempatan Refresh anda : {{10-$chance}}
                </p>
                @foreach ($val as $vals)
                    @if ($vals['jenis_peserta'] === 'Ketua' && $vals['jenis_lomba'] === 'Logika')
                        @if ($status == 1)
                            <a name="" id="" class="btn btn-primary btn-block" href="/beta/public/info-lomba/startlogika/{{ $vals['kode_invite']}}" role="button">I'm Ready</a>
                        @endif
                    @endif
                @endforeach
                <!--<a data-toggle="modal" data-href="#responsive-logic" href="#responsive-logic"  class="btn btn-daftar btn-4 py-2 px-4 text-white" id="feat1">Daftar</a>-->
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
