<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\anggota;
use App\peserta;
use App\kelompok;
use App\User;

class KelompokController extends Controller
{
    //auth peserta
    public function __construct()
    {
        $this->middleware('auth');
    }

    //get data peserta
    public function show($id){
        /*
        $result_peserta = peserta::find($id);
        if(!$result_peserta){
            dd('not found');
            //abort(404);
        }

        $result_anggota = anggota::find($result_peserta->id_peserta);
        if(!$result_anggota){
            dd('not found');
            //abort(404);
        }
        $result_kelompok = kelompok::find($result_anggota->id_peserta);
        if(!$result_kelompok){
            dd('not found');
            //abort(404);
        }
        //dd($result);
        */
        //return view('peserta/PembayaranPeserta',['value'=>$result_kelompok]);
    }

    public function index($kd_invite){

        $rs = peserta::where('kode_invite','=',$kd_invite)->get();
        //dd($rs);
        
        ///cari peserta berdasarkan user
        $result_peserta = User::find($rs[0]->id_peserta)->peserta;
        dd($result_peserta);


        if(!$result_peserta){
            //dd('not found');
            // abort(404);
        }else{

            ///cari anggota dari hasil cari peserta sebelumnya
            $result_anggota = $result_peserta->anggota;

            //dd($result_anggota);

            if(!$result_anggota){
                //dd('not found 1');
                //abort(404);

                return view('peserta/PanelKelompok',[
                    'value'=>$result_peserta,
                    'value_anggota'=>"no",
                    'val' =>$rs,
                ]);
            }
            else{
                ///cari nama kelompok dari hasil cari anggota sebelumnya
                // $result_kelompok = kelompok::select('nama_kelompok')->where('id_kelompok','=',$result_anggota)->get();
                $result_kelompok = $result_anggota->kelompok;
                //dd($result_kelompok);
                if(!$result_kelompok){
                    //dd('not found 2');
                    abort(404);
                }
                //dd($result_kelompok);

                ///cari anggota kelompok yang diambil dari hasil cari anggota ke table kelompok(pusing kan bacanya?)
                // $result_anggota_kelompok = anggota::select('nama_anggota')->where('id_kelompok','=',$result_anggota)->get();
                $result_anggota_kelompok = anggota::where('id_kelompok',$result_anggota->kelompok->id_kelompok)->get();
                //dd($result_anggota_kelompok);
                if(!$result_kelompok){
                    //dd('not found 3');
                    abort(404);
                }
                //dd($result_anggota_kelompok);



                ///return hasil2 diatas
                return view('peserta/PanelKelompok',[
                    'value'=>$result_peserta,
                    'value_anggota'=>$result_anggota,
                    'value_kelompok'=>$result_kelompok,
                    'value_anggota_kelompok'=>$result_anggota_kelompok,
                    'val'=>$rs,

                ]);
            }
            //dd($result_anggota);
        }
    }

    public function store(Request $request){

        $rs = peserta::where('kode_invite','=',$request['kd_invite'])->get();

        $this->validate($request,[
            'nama_kelompok' => 'required|min:5|unique:kelompoks',
        ]);

        //get id pesert from kode invite

        $id_kelompok = DB::table('kelompoks')->insertGetId([
            'nama_kelompok' => $request['nama_kelompok'],
        ]);

        $id_anggota = DB::table('anggotas')->insert([
            'nama_anggota' => Auth::user()->username,
            'id_peserta' => $rs[0]->id_peserta,
            'id_kelompok' => $id_kelompok,
        ]);

        DB::table('pesertas')
        ->where('kode_invite', $request['kd_invite'])
        ->update(['IsKelompok' => 'yes']);

        return redirect('/kelompok/'.$request['kd_invite']);
    }

    public function invitesearch(Request $request){
        //dd($request);

        //validasi input kode
        $this->validate($request,[
            'kd_invite' => 'required|min:20',
        ]);

        //nyari peserta berdasarkan kode invite(buat input id peserta)
        $result_peserta = DB::table('pesertas')->where('kode_invite','=',$request['kd_invite'])->first();
        //dd($result_peserta);

        if(!$result_peserta ){
            //dd('not found');
            $message = 7;
            return redirect('/kelompok/'.$request['kd_invite_ketu'])->with(['msg'=>$message]);
        } else {
            $result_peserta = DB::table('pesertas')->where('kode_invite','=',$request['kd_invite'])->get();
            //nyari id peserta yang udah pernah kedaftar jadi ketua
            $result_ketua = DB::table('pesertas')->select()->where('kode_invite','=',$request['kd_invite_ketu'])->get();
        //dd($result_ketua);

            if(!$result_ketua){
            //dd('not found');
                $message = 7;
            }
        //dd($result_ketua);


        //nyari kelompok yang mau dibuat anggotanya berdasarkan id yang dicari sebelumnya
            $result_kelompok = anggota::select('id_kelompok')->where('id_peserta','=',$result_ketua[0]->id_peserta)->get();
        //dd($result_kelompok);
            if(!$result_kelompok){
            //dd('not found');
                $message = 7;
            //abort(404);
            }
        //dd($result_kelompok);

            $result_kelompok2 = kelompok::select('nama_kelompok','id_kelompok')->where('id_kelompok','=',$result_kelompok[0]->id_kelompok)->get();
        //dd($result_kelompok2);
            if(!$result_kelompok2){
            //dd('not found');
            //abort(404);
                $message = 7;
            }
        //dd($result_kelompok2);

        //nyari user berdasarkan apa yang udah ditemuin pake kode invite (buat input nama anggota)
            $result_pengguna = User::select('id','username')->where('id','=',$result_peserta[0]->id)->get();
        //dd($result_pengguna);
            if(!$result_pengguna ){
            //dd('not found');
                $message = 7;
            }

        //validasi udah pernah di invite apa belom
            $result_anggota = anggota::select('id_peserta')->where('id_peserta','=',$result_peserta[0]->id_peserta)->exists();
        //dd($result_anggota);

            if(!$result_anggota){
                if ($result_peserta[0]->asal_sekolah != $result_ketua[0]->asal_sekolah) {
                    $message = 1;
                } else if ($result_peserta[0]->jenis_lomba != "Logika") {
                    $message = 4;
                } else if ($result_peserta[0]->jenis_peserta != "Anggota") {
                    $message = 5;
                }
                else {
                //input ke anggota
                    $input = DB::table('anggotas')->insert([
                        'nama_anggota' => $result_pengguna[0]->username,
                        'id_peserta' => $result_peserta[0]->id_peserta,
                        'id_kelompok' => $result_kelompok2[0]->id_kelompok,
                    ]);
                    $update_peserta = DB::table('pesertas')
                    ->where('id_peserta', $result_peserta[0]->id_peserta)
                    ->update(['IsKelompok' => 'yes']);
            //dd($input);
                    $message = 0;
                }

            }else{
                if ($result_peserta[0]->kode_invite == $result_ketua[0]->kode_invite) {
                    $message = 2;
                } else {
                    $message = 3;
                }

            }


        //return redirect('/kelompok/'.Auth::user()->id);
            return redirect('/kelompok/'.$request['kd_invite_ketu'])->with(['msg'=>$message]);


        }


    }

    public function invite($kode){
        dd('anjay');
    }
}
