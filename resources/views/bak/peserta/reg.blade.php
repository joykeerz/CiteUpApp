@extends('layouts/regist')

@section('content')
    <form class="form-horizontal m-b-20" id="register_valid" action="/peserta/regstore" method="post">
    @csrf
        
    
        <input type="hidden" name="id_usr" value="{{ Auth::user()->id }}">
        <input type="hidden" name="nama_usr" value="{{ Auth::user()->username }}">
        
        <div class="form-group row">
            <label for="kelompok" class="col-md-4 col-form-label text-md-right">{{ __('Nama Kelompok ') }}<i class="fa fa-child text-primary"></i></label>

            <div class="col-md-6">
                <input id="kelompok" type="kelompok" class="form-control @error('kelompok') is-invalid @enderror" name="kelompok" value="{{ old('kelompok') }}" required autocomplete="kelompok">

                @error('kelompok')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        
        <div class="form-group row">
        <label for="sekolah" class="col-md-4 col-form-label text-md-right">{{ __('Asal Sekolah ') }}<i class="fa fa-book text-primary"></i></label>

        <div class="col-md-6">
            <input id="sekolah" type="text" class="form-control @error('sekolah') is-invalid @enderror" name="sekolah" value="{{ old('sekolah') }}" required autocomplete="sekolah" autofocus>

            @error('sekolah')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        </div>

        <div class="form-group row">
        <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('alamat ') }}<i class="fa fa-road text-primary"></i></label>

        <div class="col-md-6">
            <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat" autofocus>

            @error('alamat')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        </div>

        <div class="form-group row">
        <label for="NoHp" class="col-md-4 col-form-label text-md-right">{{ __('Nomor HP ') }}<i class="fa fa-phone text-primary"></i></label>

        <div class="col-md-6">
            <input id="NoHp" type="text" class="form-control @error('NoHp') is-invalid @enderror" name="NoHp" value="{{ old('NoHp') }}" required autocomplete="NoHp" autofocus>

            @error('NoHp')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        </div>

        <div class="form-group row">
        <label for="jenis" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Lomba ') }}<i class="fa fa-flag text-primary"></i></label>

        <div class="col-md-6">
            <div class="form-group">
                    <select class="form-control" id="jenis" name="jenis" value="{{ old('jenis') }}" required autocomplete="jenis" autofocus>
                        <option>Logika</option>
                        <option>Desain</option>
                        <option>Pengetahuan Umum</option>
                    </select>
                </div>
        </div>
        </div>
        
        <div class="form-group row">
            <div class="col-sm-6 offset-lg-5">
                <button type="reset" class="btn btn-danger">Reset</button>
                <input type="submit" value="{{ __('Next') }}" class="btn btn-primary"/>
            </div>
        </div>
    </form>
@endsection