<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\peserta;
use App\anggota;
use App\kelompok;

class PembayaranController extends Controller
{
    //auth peserta
  public function __construct()
  {
    $this->middleware('auth');
  }

    //get data peserta
  public function show($kd_invite){
    $msg=0;
    $result = peserta::where('kode_invite','=',$kd_invite)->firstOrFail();
    $rs = peserta::where('kode_invite','=',$kd_invite)->get();
    if(!$result){
            // dd('not found');
            //abort(404);
    }
        //dd($result);
    return view('peserta/PembayaranPeserta',['value'=>$result, 'val'=>$rs])->with(['msg'=>$msg]);
  }

  public function index()
  {
    $msg=0;
    if(Auth::user()->role == 'peserta'){
      $id = Auth::user()->id;
      $rs = peserta::where('id','=',$id)->get();
      return view('peserta/PanelPeserta',['val'=>$rs]);
    }elseif(Auth::user()->role == 'admin'){
      return view('pengurus/PanelPembayaran')->with(['msg'=>$msg]);
    }
  }

    ///upload image

    public function store(Request $request){
    $msg = 0;
        //dd($request);
        //validasi
    $this->validate($request,[
      'payment_img' => 'mimes:jpeg,jpg,png|max:1000|required',
    ]);

        //nyari data peserta
    $result = peserta::where('kode_invite','=',$request['kd_invite'])->first();
        //dd($result);
    if(!$result){
      dd('not found');
            //abort(404);
    } else {

      if ($result['jenis_lomba']=="Logika") {
        $team = anggota::where('id_peserta','=',$result['id_peserta'])->first();
        //dd($team);
        $members_count = anggota::where('id_kelompok','=',$team['id_kelompok'])->count();
        //dd($members_count);
        if ($members_count==3) {
          $team_members = anggota::where('id_kelompok','=',$team['id_kelompok'])->get();

          //Saving file
          if($request->hasFile('payment_img'))
          {
            $dir = "images/participant_payments/";
            $extension = strtolower($request->file('payment_img')->getClientOriginalExtension());
            //Generate name file
            $filename = "payment_logika_team_".$team['id_kelompok'].'.'.$extension;
            $request->file('payment_img')->move($dir, $filename);
          }

          //Update payment status in kelompoks table
          $kel = kelompok::find($team['id_kelompok']);
          $kel->payment = 0;
          $kel->save();

          //update peserta
          for ($i=0; $i < $members_count; $i++){
            $peserta = peserta::find($team_members[$i]->id_peserta);
            $peserta->status = 'pending';
            $peserta->bukti_img = $filename;
            $peserta->save();
          }
          $msg=1;
        } else {
          $msg=9;
        }


      } else {
        if($request->hasFile('payment_img'))
        {
          $dir = "images/participant_payments/";
          $extension = strtolower($request->file('payment_img')->getClientOriginalExtension());
          //Generate name file
          $filename = "payment_desain_peserta_".$result['id_peserta'].'.'.$extension;
          $request->file('payment_img')->move($dir, $filename);
        }
                //update peserta
        $peserta = peserta::find($result['id_peserta']);
        $peserta->status = 'pending';
        $peserta->bukti_img = $filename;
        $peserta->save();
        $msg=1;
      }

    }

    return redirect('pembayaran/'.$request['kd_invite'])->with(['msg'=>$msg]);
  }

    /*
  public function store(Request $request){
    $msg = 0;
        //dd($request);
        //validasi
    $this->validate($request,[
      'payment_img' => 'mimes:jpeg,jpg,png|max:1000|required',
    ]);

        //nyari data peserta
    $result = peserta::where('kode_invite','=',$request['kd_invite'])->get();
        //dd($result);
    if(!$result){
      dd('not found');
            //abort(404);
    } else {

      if ($result[0]->jenis_lomba=="Logika") {
        $team = anggota::where('id_peserta','=',$result[0]->id_peserta)->get();
        //dd($team);
        $members_count = anggota::where('id_kelompok','=',$team[0]->id_kelompok)->count();
        //dd($members_count);
        if ($members_count==3) {
          $team_members = anggota::where('id_kelompok','=',$team[0]->id_kelompok)->get();

          //Saving file
          if($request->hasFile('payment_img'))
          {
            $dir = "images/participant_payments/";
            $extension = strtolower($request->file('payment_img')->getClientOriginalExtension());
            //Generate name file
            $filename = "payment_logika_team_".$team[0]->id_kelompok.'.'.$extension;
            $request->file('payment_img')->move($dir, $filename);
          }

          //Update payment status in kelompoks table
          $kel = kelompok::find($team[0]->id_kelompok);
          $kel->payment = 0;
          $kel->save();

          //update peserta
          for ($i=0; $i < $members_count; $i++){
            $peserta = peserta::find($team_members[$i]->id_peserta);
            $peserta->status = 'pending';
            $peserta->bukti_img = $filename;
            $peserta->save();
          }
          $msg=1;
        } else {
          $msg=9;
        }


      } else {
        if($request->hasFile('payment_img'))
        {
          $dir = "images/participant_payments/";
          $extension = strtolower($request->file('payment_img')->getClientOriginalExtension());
          //Generate name file
          $filename = "payment_desain_peserta_".$result[0]->id_peserta.'.'.$extension;
          $request->file('payment_img')->move($dir, $filename);
        }
                //update peserta
        $peserta = peserta::find($result[0]->id_peserta);
        $peserta->status = 'pending';
        $peserta->bukti_img = $filename;
        $peserta->save();
        $msg=1;
      }

    }

    return redirect('pembayaran/'.$request['kd_invite'])->with(['msg'=>$msg]);
  }
    */

}

