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
          <div class="col-lg-5  m-t-20">
            <div class="card p-t-25" style="background-color: #00578b;">
              <img src="{{asset('dist/img/citeup/design.png')}}" class="icon">
              <h2 class="my-4 heading">Desain</h2>
              <div class="card-block">
                    @if($status == 1)
                <p class="p-d-15 l-h-1">
                  Sudah Yakin Dengan Karyamu? Langsung Submit aja!
                </p>
                    @endif
                @foreach ($val as $vals)
                    @if ($vals['jenis_peserta'] === 'Ketua' && $vals['jenis_lomba'] === 'Desain')
                        @if ($status == 1)
                        {{-- <a name="" id="" class="btn btn-primary btn-block" href="#" role="button">Submit Design</a> --}}
                    <form action="/beta/public/info-lomba/startdesain/{{$vals['kode_invite']}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="kd_invite" value="{{$vals['kode_invite']}}">
                            <div class="form-group row m-t-35">
                                    <div class="col-lg-3 text-center text-lg-right">
                                      <label class="col-form-label">Desain UI<br><i>(.jpg atau .png)</i></label>
                                    </div>
                                    <div class="col-lg-6 text-center text-lg-left">
                                      <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new img-thumbnail text-center">
                                          <img src="{{old('desain_image')}}" alt="Image" class="profile_img">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists img-thumbnail">
                                        </div>
                                        <div class="m-t-20 text-center">
                                          <span class="btn btn-primary btn-file">
                                            <span class="fileinput-new">Select image</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="desain_image" class="btn btn-primary" value="{{ old('desain_image') }}" value="{{ old('desain_image') }}">
                                          </span>
                                          <a href="#" class="btn btn-warning fileinput-exists" data-dismiss="fileinput">Remove</a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <input type="submit" name="submit" value="submit" class="btn btn-primary">
                        </form>
                        @else
                        <p>Maaf waktu upload desain sudah habis. terima kasih</p>
                        @endif
                    @endif
                @endforeach
                <!--<a href="#" class="btn btn-daftar btn-4 py-2 px-4 text-white" id="feat2">Daftar</a>-->
              </div>
            </div>
          </div>
          <div class="col-lg-7  m-t-20">
                <div class="card p-t-25" style="background-color: #00578b;">
                  <img src="{{asset('dist/img/citeup/design.png')}}" class="icon">
                  <h2 class="my-4 heading">Ketentuan Desain</h2>
                  <div class="card-block">
                    <p class="p-d-15 l-h-1" align="justify">
                      1. Tema Desain : Desain UI Aplikasi Smarthome<br>
                      2. Format Submission : .PNG<br>
                      3. Komponen Wajib : <br>
                       - SplashScreen<br>
                       - Home Interface (Tampilan Utama)<br>
                       - Control Interface (Tampilan kontrol aplikasi)Min.3<br>
                      4.Untuk upload, bisa berkali-kali
                    </p>
                    <!--<a href="#" class="btn btn-daftar btn-4 py-2 px-4 text-white" id="feat2">Daftar</a>-->
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                    <div class="card m-t-35">
                        <div class="card-header" style="background-color: #00578b";>
                            Palete Warna
                        </div>
                        <div class="card-block">
                            <!--<h4 class="card-title">Image Card</h4>-->
                            <img src="{{asset('dist/img/citeup/PALETWARNA.png')}}" class="img-fluid"
                                 alt="Colour Pallete">
                        </div>
                        <div class="card-footer" style="background-color: #00578b";>
                            <p class="card-text">Peserta WAJIB menggunakan warna-warna yang tersedia pada palet warna yang diberikan oleh panitia CITE UP 2019, dengan warna sebagai berikut:</p>
                            <p class="card-text">
                                    (Keterangan: warna - kode warna dalam RGB)<br>
                                    - Merah (255,0,0)<br>
                                    - Putih (255,255,255)<br>
                                    - Biru (32,56,100)<br>
                                    - Hijau (19,207,113)<br>
                                    - Hitam (0,0,0)<br>
                            </p>
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
