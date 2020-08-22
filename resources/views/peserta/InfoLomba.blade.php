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
          <div class="col-lg-4 m-t-20">
            <div class="card p-t-25" style="background-color: #5e9219;">
              <img src="{{asset('dist/img/citeup/logic.png')}}" class="icon">
              <h2 class="my-4 heading">Logika</h2>
              <div class="card-block">
                <p class="p-d-15 l-h-1">
                  Kompetisi beregu yang terdiri dari tiga orang untuk menyelesaikan permasalahan dan soal-soal logika dalam waktu yang telah ditentukan.
                </p>
                @foreach ($val as $vals)
                    @if ($vals['jenis_peserta'] === 'Ketua' && $vals['jenis_lomba'] === 'Logika')
                    <a name="" id="" class="btn btn-primary btn-block" href="info-lomba/logika/{{ $vals['kode_invite']}}" role="button">Start Competition</a>
                    <a name="" id="" class="btn btn-primary btn-block" href="info-lomba/hasillogika/{{ $vals['kode_invite']}}" role="button">Hasil Lomba</a>
                    @endif
                @endforeach
                <!--<a data-toggle="modal" data-href="#responsive-logic" href="#responsive-logic"  class="btn btn-daftar btn-4 py-2 px-4 text-white" id="feat1">Daftar</a>-->
              </div>
            </div>
          </div>
          <div class="col-lg-4 m-t-20">
            <div class="card p-t-25" style="background-color: #00578b;">
              <img src="{{asset('dist/img/citeup/design.png')}}" class="icon">
              <h2 class="my-4 heading">Desain</h2>
              <div class="card-block">
                <p class="p-d-15 l-h-1">
                  Kompetisi individu untuk membuat sebuah karya dalam bentuk poster atau infografik dengan visualisasi yang menarik, kreatif, dan inovatif.
                </p>
                @foreach ($val as $vals)
                    @if ($vals['jenis_peserta'] === 'Ketua' && $vals['jenis_lomba'] === 'Desain')
                    <a name="" id="" class="btn btn-primary btn-block" href="info-lomba/desain/{{ $vals['kode_invite']}}" role="button">Start Competition</a>
                    <a name="" id="" class="btn btn-primary btn-block" href="info-lomba/hasildesain/{{ $vals['kode_invite']}}" role="button">Hasil Lomba</a>
                    @endif
                @endforeach
                <!--<a href="#" class="btn btn-daftar btn-4 py-2 px-4 text-white" id="feat2">Daftar</a>-->
              </div>
            </div>
          </div>
          <div class="col-lg-4 m-t-20">
            <div class="card p-t-25" style="background-color: #8a0404;">
              <img src="{{asset('dist/img/citeup/seminar.png')}}" class="icon">
              <h2 class="my-4 heading">Seminar</h2>
              <div class="card-block">
                <p class="p-d-15 l-h-1">
                  Seminar umum yang berfokus dalam membahas perkembangan dunia teknologi informasi untuk menambah wawasan masyarakat.
                </p>
                <!--<a href="/seminar" class="btn btn-daftar btn-4 py-2 px-4 text-white" id="feat3">Daftar</a>-->
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
