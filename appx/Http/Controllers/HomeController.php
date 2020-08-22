<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\peserta;
use App\anggota;
use App\user;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
      $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    //pergi ke form regis peserta
    public function reg()
    {
      return view('peserta/reg');
    }

    //info lomba
    public function infolomba()
    {
      $id = Auth::user()->id;
      $rs = peserta::where('id','=',$id)->get();
      return view('peserta/InfoLomba',['val'=>$rs]);
    }

    //pergi ke form profil peserta  add by sun 19-08-01
    public function profile($kd_invite)
    {
      //$result = DB::table('pesertas')->where('kode_invite','=',$kd_invite)->get();
      //dd($result);
      $ispeserta = DB::table('pesertas')->select('id')->where('kode_invite','=',$kd_invite)->count();
      $rs = peserta::where('kode_invite','=',$kd_invite)->get();
      //dd($ispeserta);

      if ($ispeserta === 0) {
            //echo "Belum melengkapi profil";
        return view('peserta/ProfilePeserta',['val'=>$rs ]);
      } else {
            //echo "Sudah melengkapi profil";
        return view('peserta/ProfilePesertaUpdate',['val'=>$rs]);
      }


    }

    ///insert form regis peserta, redirect ke dashboard
    public function regcreate(Request $request){
      //validasi
      $this->validate($request,[
        'nsekolah' => 'required|min:5',
        'ksekolah' => 'required|min:5|max:50',
        'asekolah' => 'required|min:5|max:100',
        'alamat' => 'required|min:10|max:100',
        'telp' => 'required|min:12|numeric',
        'fname' => 'required',
        'lname' => 'required',
        'pas_foto' => 'mimes:jpeg,jpg,png|max:1000|required',
        'kartu_pelajar' => 'mimes:jpeg,jpg,png|max:1000|required',
        'jenis_lomba' => 'required',
        'jenis_peserta' => 'required',
        'gender' => 'required',
        'tgl_lahir' => 'required|date|before:"2004-01-01 00:00:00"',
      ]);


      $peserta = peserta::find($request['id_usr']);
      // print_r($request);
      // die();
      //update profile pict
      if($request->hasFile('pas_foto'))
      {
        $dir = "images/profile_picts/";
      // if ($peserta->pas_foto != '' && File::exists($dir.$peserta->pas_foto)) {
      //   File::delete($dir.$peserta->pas_foto);
      // }
        $extension = strtolower($request->file('pas_foto')->getClientOriginalExtension());
        $filename_pp = "pp_".$request['id_usr'].'.'.$extension;
        $request->file('pas_foto')->move($dir, $filename_pp);
      }

      //update student card
      if($request->hasFile('kartu_pelajar'))
      {
        $dir = "images/student_cards/";
      // if ($peserta->kartu_pelajar != '' && File::exists($dir.$peserta->kartu_pelajar)) {
      //   File::delete($dir.$peserta->kartu_pelajar);
      // }
        $extension = strtolower($request->file('kartu_pelajar')->getClientOriginalExtension());
        $filename_sc = "sc_".$request['id_usr'].'.'.$extension;
        $request->file('kartu_pelajar')->move($dir, $filename_sc);
      }

      DB::table('pesertas')->Insert([

        'id' => $request['id_usr'],
        'nama_depan' => $request['fname'],
        'nama_belakang' => $request['lname'],
        'jen_kel' => $request['gender'],
        'tanggal_lahir' => $request['tgl_lahir'],
        'no_hp' => $request['telp'],
        'alamat' => $request['alamat'],
        'kode_invite' => $request['kode_random'],
        'asal_sekolah' => $request['nsekolah'],
        'kota_sekolah' => $request['ksekolah'],
        'alamat_sekolah' => $request['asekolah'],
        'jenis_lomba' => $request['jenis_lomba'],
        'jenis_peserta' => $request['jenis_peserta'],
        'pas_foto' => $filename_pp,
        'kartu_pelajar' => $filename_sc,
      ]);

      DB::table('users')->where('id','=',Auth::user()->id)->update([
        'isregistered' => 't',
      ]);

      return redirect('profile/'.$request['kode_random']);
      //return redirect('/home');
    }

    public function profilecreate(Request $request){ //add by sun 19-08-01
      //ini_set('memory_limit', '-1');
      print_r($request);
      //die();

      //validasi form
      // $this->validate($request,[
      //   'nsekolah' => 'required|min:5',
      //   'alamat' => 'required|min:10|max:50',
      //   'telp' => 'required|min:12',
      //   'fname' => 'required',
      //   'pas_foto' => 'mimes:jpeg,jpg,png|max:700|required',
      //   'kartu_pelajar' => 'mimes:jpeg,jpg,png|max:700|required',
      //   'jenis_lomba' => 'required',
      //   'jenis_peserta' => 'required',
      //   ]);

      $peserta = Peserta::find($request['id_usr']);

        //query insert peserta
      $psrt = new peserta;

      $psrt->id = $request->id_usr;

      $psrt->save();

      // $id_peserta = DB::table('pesertas')->insertGetId([
      //   'id' => $request['id_usr'],
      //   'asal_sekolah' => $request['nsekolah'],
      //   'alamat' => $request['alamat'],
      //   'no_hp' => $request['telp'],
      //   // 'jenis_lomba' => $request['jenis_lomba'],
      //   // 'jenis_peserta' => $request['jenis_peserta'],
      //   'kode_invite' => $request['kode_random'],
      //   'nama_depan' => $request['fname'],
      //   'nama_belakang' => $request['lname'],
      //   'jen_kel' => $request['gender'],
      //   'tanggal_lahir' => $request['tgl_lahir'],
      //   'kota_sekolah' => $request['ksekolah'],
      //   'alamat_Sekolah' => $request['asekolah'],
      //   ]);

        // //save profile picture
      // if($request->hasFile('pas_foto'))
      // {
      //   $dir = "images/profile_picts/";
      //   $extension = strtolower($request->file('pas_foto')->getClientOriginalExtension());
      //   $filename = "pp_".$request['id_usr'].'.'.$extension;
      //   // $request->file('pas_foto')->move($dir, $filename);
      //   $peserta->pas_foto=$filename;
      //   $peserta->save();
      // }

      //   //save profile picture
      // if($request->hasFile('kartu_pelajar'))
      // {
      //   $dir = "images/student_cards/";
      //   $extension = strtolower($request->file('kartu_pelajar')->getClientOriginalExtension());
      //   $filename = "sc_".$request['id_usr'].'.'.$extension;
      //   // $request->file('kartu_pelajar')->move($dir, $filename);
      //   $peserta->kartu_pelajar=$filename;
      //   $peserta->save();
      // }



      return redirect('profile/'.$request['id_usr']);
    }

    public function profileupdate(Request $request){ //add by sun 19-08-02

      $peserta = Peserta::find($request['id_usr']);
      //dd($peserta);
        //update profile pict
      if($request->hasFile('pas_foto'))
      {
        $dir = "images/profile_picts/";
        if ($peserta->pas_foto != '' && File::exists($dir.$peserta->pas_foto)) {
          File::delete($dir.$peserta->pas_foto);
        }
        $extension = strtolower($request->file('pas_foto')->getClientOriginalExtension());
        $filename_pp = "pp_".$request['id_usr'].'.'.$extension;
        $request->file('pas_foto')->move($dir, $filename_pp);
        $peserta->pas_foto=$filename_pp;
        $peserta->save();
      }

        //update student card
      if($request->hasFile('kartu_pelajar'))
      {
        $dir = "images/student_cards/";
        if ($peserta->kartu_pelajar != '' && File::exists($dir.$peserta->kartu_pelajar)) {
          File::delete($dir.$peserta->kartu_pelajar);
        }
        $extension = strtolower($request->file('kartu_pelajar')->getClientOriginalExtension());
        $filename_sc = "sc_".$request['id_usr'].'.'.$extension;
        $request->file('kartu_pelajar')->move($dir, $filename_sc);
        $peserta->kartu_pelajar=$filename_sc;
        $peserta->save();
      }

      DB::table('pesertas')
      ->where('id',$request['id_usr'])
      ->update([
        'nama_depan' => $request['fname'],
        'nama_belakang' => $request['lname'],
        'jen_kel' => $request['gender'],
        'tanggal_lahir' => $request['tgl_lahir'],
        'no_hp' => $request['telp'],
        'alamat' => $request['alamat'],
        'asal_sekolah' => $request['nsekolah'],
        'kota_sekolah' => $request['ksekolah'],
        'alamat_sekolah' => $request['asekolah'],
      ]);

      return redirect('profile/'.$request['kode_random']);

    }

    //dashboard peserta
    public function index() //Updated by sun 19-08-05
    {

      $id = Auth::user()->id;
      //$result = peserta::where('id','=',Auth::user()->id)->firstOrFail(); updated by sun 19-08-01
      // $rs = user::where('id','=',$id)->firstOrFail();
      // $result = peserta::where('id','=',$rs['id'])->firstOrFail();
      $result = user::where('id','=',$id)->firstOrFail();
      //dd($rs);
      if(!$result){
        //dd('not found');
      }
      if(Auth::user()->role == 'peserta'){
        $ispeserta = DB::table('pesertas')->select()->where('id','=',$id)->count();
        if ($ispeserta === 0) {
          //return view('peserta/PanelUser',['value'=>$result]);
          return view('peserta/ProfilePeserta',['value'=>$result,'val'=>0]);
        } else {
          $rs = peserta::where('id','=',$id)->get();
          $jen_lomba = DB::table('pesertas')->select('jenis_lomba')->where('id','=',$id)->first();
          return view('peserta/PanelPeserta',['value'=>$result,  'val'=>$rs, 'data'=>$jen_lomba]);
        }

      }elseif(Auth::user()->role == 'admin'){
        return view('pengurus/PanelPengurus',['value'=>$result,]);
      }
    }
  }

