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
            <div class="card p-t-25" style="background-color: #00578b;">
              <img src="{{asset('dist/img/citeup/design.png')}}" class="icon">
              <h2 class="my-4 heading">Desain</h2>
              <div class="card-block">
                <p class="p-d-15 l-h-1">
                  Berikut adalah hasil dari penyisihan
                </p>
                @foreach ($val as $vals)
                    @foreach ($hsl as $hsls)
                        @if ($vals['jenis_peserta'] === 'Ketua' && $vals['jenis_lomba'] === 'Desain')
                            @if($msg == 1)
                                @if ($hsls->ishasil == 1)
                                    <p class="lable p-d-15 bg-info">
                                        SELAMAT !!! anda lolos ke babak final lomba Desain CITE UP 2019<br>
                                    </p>
                                @else
                                    <p class="lable p-d-15 bg-danger">
                                        MOHON MAAF<br>
                                         Anda Tidak Lolos ke babak final lomba Desain CITE UP 2019<br>
                                        jangan putus asa dan tetap semangat!<br>
                                    </p>
                                @endif
                            @else
                                <p class="lable p-d-15 bg-info">
                                        Anda Tidak Ikut Lomba<br>
                                </p>
                            @endif
                        @endif
                    @endforeach
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
