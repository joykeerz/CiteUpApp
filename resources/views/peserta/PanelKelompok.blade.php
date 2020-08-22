<!--templatenya-->
@extends('layouts/dashboard')
<!--/templatenya-->

<!--titlenya-->
@section('title','CITEUP 2019 | Peserta')
<!--/titlenya-->

<!--nama page-->
@section('PageName','Team Page')
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
  <li class="breadcrumb-item active">Team Page</li>
</ol>
@endsection
<!--/breadcrumb-->

<!--Isi page-->
@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card-block cards_section_margin">
    <div class="col-md-6">

        @if(Session::get('msg')==1)
        <p class="lable p-d-15 bg-warning">Tidak dapat menginvite. Asal sekolah tidak sesuai</p>
        @elseif(Session::get('msg')==2)
        <p class="lable p-d-15 bg-warning">Anda sudah menjadi ketua tim.</p>
        @elseif(Session::get('msg')==3)
        <p class="lable p-d-15 bg-warning">Sudah menjadi anggota tim.</p>
        @elseif(Session::get('msg')==4)
        <p class="lable p-d-15 bg-warning">Peserta yang diundang bukan peserta lomba kategri logika.</p>
        @elseif(Session::get('msg')==5)
        <p class="lable p-d-15 bg-warning">Tidak dapat mengundang ketua. Ketua setiap tim hanya 1 orang.</p>
        @elseif(Session::get('msg')==6)
        <p class="lable p-d-15 bg-warning">Tidak dapat mengundang ketua. Ketua setiap tim hanya 1 orang.</p>
        @elseif(Session::get('msg')==7)
        <p class="lable p-d-15 bg-warning">Peserta tidak ditemukan. Cek kembali kode invite!</p>
        @else
        @endif
      </div>
      <div class="row">
        <div class="col-lg-8 mt-5">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header card-primary text-white "><i class="fa fa-users mr-3"></i>Info Kelompok</div>
              <div class="card-block">
                
                <!-- =======MEMBER IS NOT EXIST/EMPTY========== -->
                @if ($value_anggota === "no")

                <!-- *Ketua* -->
                @if( $val[0]->jenis_peserta === "Ketua")
                <p class="m-t-20">Anda Belum Punya Kelompok! Silahkan Buat Kelompok.</p>

                <!-- *ANGGOTA* -->
                @else
                <p class="m-t-20">Anda belum memiliki kelompok</p>

                @endif
                <!-- =======END OF EMPTY MEMBER ========== -->


                <!-- =======MEMBER IS EXIST========== -->
                @elseif($value_anggota)
                <span></span>

                <!-- *Ketua && ANGGOTA* -->
                @if($val[0]->IsKelompok === "yes")
                <div class="row card-block m-t-20">
                  <span class="col-md-2">Nama Tim</span>
                  <span class="col-md-6 text-uppercase"><h4>{{$value_kelompok->nama_kelompok}}</h4></span>
                </div>
                <div class="row card-block">
                  <span class="col-md-2">Anggota</span>
                  <ul class="col-md-10 list-group list_margin_bottom">
                    @foreach ($value_anggota_kelompok as $item)
                    <li class="list-group-item text-capitalize">
                      {{$item->nama_anggota}}
                      @if ($item->peserta->jenis_peserta === "Ketua")
                      <span class="label label-sm bg-info m-l-10">Leader</span>
                      @endif
                    </li>
                    @endforeach
                  </ul>
                </div>

                <!-- *END OF Ketua & ANGGOTA* -->


                @endif

                <!-- =======END OF EXISTED MEMBER ========== -->

                @endif

              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mt-5">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header card-primary text-white "><i class="fa fa-users mr-3"></i>Kelompok</div>
              <div class="card-block">

                <!-- =======MEMBER IS NOT EXIST========== -->
                @if ($value_anggota==="no")

                <!-- *Ketua* -->
                @if($val[0]->jenis_peserta === "Ketua")

                <p class="m-t-20">Anda Belum Punya Kelompok, Silahkan Buat Kelompok</p>
                <div class="card-block">
                  <form class="form-horizontal" action="/beta/public/kelompok/store" method="post">
                   @csrf
                   <fieldset>
                    <!-- Name input-->
                    <div class="form-group row m-t-35">
                     <div class="col-lg-12">
                      <div class="input-group">
                       <span class="input-group-addon">
                        <i class="fa fa-flag"></i>
                      </span>
                      <input type="hidden" name="kd_invite" value="{{ $val[0]->kode_invite }}">
                      <input type="text" id="name" class="form-control @error('nama_kelompok') is-invalid @enderror" placeholder="Nama Kelompok"
                      name="nama_kelompok" value="{{ old('nama_kelompok') }}" required autocomplete="nama_kelompok" autofocus>
                      @error('nama_kelompok')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                 <div class="col-lg-12">
                  <button type="submit" class="btn btn-primary btn-block layout_btn_prevent">Submit</button>
                </div>
              </div>
            </fieldset>
          </form>
        </div>

        <!-- *END OF Ketua* -->


        <!-- *ANGGOTA* -->

        @elseif($val[0]->jenis_peserta === "Anggota")
        <i class="fa fa-info-circle m-t-20"></i>
        <span class="font-italic m-l-10">Undangan hanya bisa dikirimkan oleh Ketua tim.</span>
        <p class="m-t-15"><h5>Kode Invite</h5>
          <input type="text" class="form-control" readonly value="{{$val[0]->kode_invite}}"/>
        </p>

        <!-- *END OF ANGGOTA* -->

        @endif

        <!-- =======END OF NON EXISTED MEMBER========== -->


        <!-- =======MEMBER IS EXIST========== -->
        @elseif ($value_anggota)
        <span></span>

        <!-- *Ketua* -->
        @if(($val[0]->jenis_peserta === "Ketua") && ($val[0]->IsKelompok === "yes"))
        <h5 class="m-t-20">Invite Anggota</h5>

        <!-- Member is less than 3 -->
        @if (count($value_anggota_kelompok)!=3)
        <form action="/beta/public/kelompok/invite" method="post">
          @csrf
          <div class="form-group row">
            <div class="col-lg-12">
              <input type="hidden" name="kd_invite_ketu" value="{{$val[0]->kode_invite}}">
              <input type="text" id="name" class="form-control @error('kode') is-invalid @enderror" placeholder="Masukan Kode Invite.."
              name="kd_invite" value="{{ old('kode') }}" required autocomplete="kode" autofocus>
              @error('kode')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-12">
              <button type="submit" class="btn btn-primary btn-block layout_btn_prevent">Submit</button>
            </div>
          </div>
        </form>

        <!-- Member is 3 -->
        @else
        <i class="fa fa-info-circle"></i>
        <span class="font-italic m-l-10">Tidak bisa mengundang! Tim sudah 3 orang.</span>

        @endif
        <!-- End of member count -->

        <!-- *END OF Ketua* -->

        <!-- *ANGGOTA* -->
        @elseif(($val[0]->jenis_peserta === "Anggota") && ($val[0]->IsKelompok === "yes"))
        <i class="fa fa-info-circle m-t-20"></i>
        <span class="font-italic m-l-10">Anda sudah masuk tim.</span>
        <p class="m-t-15"><h5>Kode Invite</h5>
          <input type="text" class="form-control" readonly value="{{$val[0]->kode_invite}}"/>
        </p>

        <!-- *END OF ANGGOTA* -->
        @endif


        <!-- =======END OF EXISTED MEMBER ========== -->


        @endif


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