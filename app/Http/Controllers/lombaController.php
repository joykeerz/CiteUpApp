<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\peserta;
use App\anggota;
use App\lomba;
use App\desain;
use App\user;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class lombaController extends Controller
{
    public function lombaLogika($kd_invite)
    {
        date_default_timezone_set('Asia/Jakarta');
        $resttimefrom = 130000;
        $resttimeto = 153000;
        $currentTime = (int) date('Gis');
        if ($currentTime > $resttimefrom && $currentTime < $resttimeto){
            $stat=1;
        }else{
            $stat=0;
        }
      $countchance = DB::table('lombas')->select('id','id_peserta')->where('kode_invite','=',$kd_invite)->count();
      $id = Auth::user()->id;
      $rs = peserta::where('kode_invite','=',$kd_invite)->get();
      if ($countchance < 10) {
            $message = 0;
            return view('peserta/infoLombaLogika',['val'=>$rs, 'chance'=>$countchance, 'status'=>$stat])->with(['msg'=>$message]);
      } else {
            $message = 1;
            return view('peserta/infoLombaLogika',['val'=>$rs, 'chance'=>$countchance, 'status'=>$stat])->with(['msg'=>$message]);
      }
    }
    
    public function hasilLogika($kd_invite){
        $id = Auth::user()->id;
        $rs = peserta::where('kode_invite','=',$kd_invite)->get();
        $hasil = DB::table('lombas')->distinct()->where('kode_invite','=',$kd_invite)->get();
        $counts = DB::table('lombas')->select('id_lomba')->where('kode_invite','=',$kd_invite)->count();
        if($counts == 1){
            $message = 1;
        }else{
            $message = 0;
        }
        return view('peserta/infoHasilLogika',['val'=>$rs,'hsl'=>$hasil])->with(['msg'=>$message]);
    }

    public function lombaDesain($kd_invite)
    {
        date_default_timezone_set('Asia/Jakarta');
        $resttimefrom = 100000;
        $resttimeto = 151500;
        $currentTime = (int) date('Gis');
        if ($currentTime > $resttimefrom && $currentTime < $resttimeto){
            $stat=1;
        }else{
            $stat=0;
        }
      $countchance = DB::table('desains')->select('id_peserta')->where('kode_invite','=',$kd_invite)->count();
      $id = Auth::user()->id;
      $rs = peserta::where('kode_invite','=',$kd_invite)->get();
      if ($countchance < 2) {
            $message = 0;
            return view('peserta/infoLombaDesain',['val'=>$rs, 'chance'=>$countchance, 'status'=>$stat])->with(['msg'=>$message]);
      } else {
            $message = 1;
            return view('peserta/infoLombaDesain',['val'=>$rs, 'chance'=>$countchance, 'status'=>$stat])->with(['msg'=>$message]);
      }
    }
    
    public function hasilDesain($kd_invite){
        $id = Auth::user()->id;
        $rs = peserta::where('kode_invite','=',$kd_invite)->get();
        $hasil = DB::table('desains')->distinct()->where('kode_invite','=',$kd_invite)->get();
        $counts = DB::table('desains')->select('id_lomba')->where('kode_invite','=',$kd_invite)->count();
        if($counts == 1){
            $message = 1;
        }else{
            $message = 0;
        }
        return view('peserta/infoHasilDesain',['val'=>$rs,'hsl'=>$hasil])->with(['msg'=>$message]);
    }

    public function startLogika($kd_invite)
    {
        
        date_default_timezone_set('Asia/Jakarta');
        $resttimefrom = 130000;
        $resttimeto = 153000;
        $currentTime = (int) date('Gis');
        if ($currentTime > $resttimefrom && $currentTime < $resttimeto){
            $stat=1;
        }else{
            $stat=0;
        }
      $ispeserta = DB::table('lombas')->select('id','id_peserta')->where('kode_invite','=',$kd_invite)->count();
      $id = DB::table('pesertas')->select('id_peserta')->where('kode_invite','=',$kd_invite)->get();
      $rs = peserta::where('kode_invite','=',$kd_invite)->get();
      //dd($ispeserta);
      if ($ispeserta < 10) {
            //echo "masih bisa melakukan simulasi";
            DB::table('lombas')->Insert([
                'id_peserta' => $id[0]->id_peserta,
                'kode_invite' => $kd_invite,
                'ismulai' => 0,
                'ishasil' => 0,
              ]);
              $message = 0;
        return view('peserta/soalLogika',['val'=>$rs,'chance'=>$ispeserta]);
      } else {
            $message = 1;
            //echo "anda sudah melewati jatah simulasi";
            return view('peserta/infoLombaLogika',['val'=>$rs, 'chance'=>$countchance, 'status'=>$stat])->with(['msg'=>$message]);
      }
    }

    public function startDesain(Request $request)
    {
    date_default_timezone_set('Asia/Jakarta');
    $resttimefrom = 100000;
    $resttimeto = 151500;
    $currentTime = (int) date('Gis');
    if ($currentTime > $resttimefrom && $currentTime < $resttimeto){
        $stat=1;
    }else{
        $stat=0;
    }
      $ispeserta = DB::table('desains')->select('id_peserta')->where('kode_invite','=',$request['kd_invite'])->count();
      $id = DB::table('pesertas')->select('id_peserta')->where('kode_invite','=',$request['kd_invite'])->get();
      $rs = peserta::where('kode_invite','=',$request['kd_invite'])->get();

      if($request->hasFile('desain_image'))
      {
        $dir = "images/lomba_desain/";
        $extension = strtolower($request->file('desain_image')->getClientOriginalExtension());
        $filename_desain = "desain_".$id[0]->id_peserta.'_'.$ispeserta.'.'.$extension;
        $request->file('desain_image')->move($dir, $filename_desain);
      }
            DB::table('desains')->Insert([
                'id_peserta' => $id[0]->id_peserta,
                'kode_invite' => $request['kd_invite'],
                'desain_img' => $filename_desain,
              ]);
        return view('peserta/infoLombaDesain',['val'=>$rs,'chance'=>$ispeserta,'status'=>$stat]);
    }
}
