<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\peserta;
use App\anggota;
use App\kelompok;
use App\User;
use App\seminar;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\seminarValid;

class AdminPembayaranController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result_join = DB::table('users')
        ->join('pesertas','users.id','=','pesertas.id')
        // ->join('anggotas','pesertas.id_peserta','=','anggotas.id_peserta')
        // ->join('kelompoks','anggotas.id_kelompok','=','kelompoks.id_kelompok')
        ->select('users.*','pesertas.*')
        ->get();

        if(Auth::user()->role == 'peserta'){
            abort(404);
        }elseif(Auth::user()->role == 'admin'){
            return view('pengurus/PanelPembayaran',[
                //'value'=>$result,
                'value_join'=>$result_join
            ]);
        }
    }

    public function seminarIndex()
    {
        $result_join = DB::table('seminars')->get();

        if(Auth::user()->role == 'peserta'){
            abort(404);
        }elseif(Auth::user()->role == 'admin'){
            return view('pengurus/PanelSeminar',[
                //'value'=>$result,
                'value_join'=>$result_join
            ]);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $result = peserta::where('id_peserta','=',$id)->firstOrFail();

        if(!$result){
            dd('not found');
            //abort(404);
        }
        // $result_join = DB::table('pesertas')->where('pesertas.id_peserta','=',$id)
        // ->join('anggotas','pesertas.id_peserta','=','anggotas.id_peserta')
        // ->join('kelompoks','anggotas.id_kelompok','=','kelompoks.id_kelompok')
        // ->join('users','pesertas.id','=','users.id')
        // ->get();

        $result_join = DB::table('users')->where('pesertas.id_peserta','=',$id)
        ->join('pesertas','users.id','=','pesertas.id')
        ->select('users.*','pesertas.*')
        ->get();

        if(Auth::user()->role == 'peserta'){
            abort(404);
        }else{
            return view('/pengurus/PanelPembayaranDetail',[
                'value'=>$result,
                'value_join'=>$result_join,
            ]);
        }
    }

    public function seminarShow($id)
    {

        $result = seminar::where('id','=',$id)->firstOrFail();

        if(!$result){
            dd('not found');
            //abort(404);
        }
        // $result_join = DB::table('pesertas')->where('pesertas.id_peserta','=',$id)
        // ->join('anggotas','pesertas.id_peserta','=','anggotas.id_peserta')
        // ->join('kelompoks','anggotas.id_kelompok','=','kelompoks.id_kelompok')
        // ->join('users','pesertas.id','=','users.id')
        // ->get();

        $result_join = DB::table('seminars')->where('id','=',$id)->get();

        if(Auth::user()->role == 'peserta'){
            abort(404);
        }else{
            return view('/pengurus/PanelSeminarDetail',[
                'value'=>$result,
                'value_join'=>$result_join,
            ]);
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $members = peserta::where('id_peserta','=',$id)->get();
        if ($members[0]->jenis_lomba=="Logika") {
            $team = anggota::where('id_peserta','=',$id)->get();
            $members_count = anggota::where('id_kelompok','=',$team[0]->id_kelompok)->count();
            $team_members = anggota::where('id_kelompok','=',$team[0]->id_kelompok)->get();
            DB::table('kelompoks')
            ->where('id_kelompok','=',$team[0]->id_kelompok)
            ->update(['payment' => 1]);

            for ($i=0; $i < $members_count; $i++) {
                $peserta = peserta::find($team_members[$i]->id_peserta);
                $peserta->status = 'yes';
                $peserta->save();
            }

        } else {
            DB::table('pesertas')
            ->where('id_peserta','=',$id)
            ->update([
                'status' => 'yes',
            ]);
        }



        return redirect('/admin/pembayaran');
    }

    public function rejected(Request $request, $id)
    {
        //
        $members = peserta::where('id_peserta','=',$id)->first();
        if ($members->jenis_lomba=="Logika") {
            $team = anggota::where('id_peserta','=',$id)->get();
            $members_count = anggota::where('id_kelompok','=',$team[0]->id_kelompok)->count();
            $team_members = anggota::where('id_kelompok','=',$team[0]->id_kelompok)->get();
            DB::table('kelompoks')
            ->where('id_kelompok','=',$team[0]->id_kelompok)
            ->update(['payment' => 1]);

            for ($i=0; $i < $members_count; $i++) {
                $peserta = peserta::find($team_members[$i]->id_peserta);
                $peserta->status = 'rejected';
                $peserta->save();
            }

        } else {
            DB::table('pesertas')
            ->where('id_peserta','=',$id)
            ->update([
                'status' => 'rejected',
            ]);
        }

        return redirect('/admin/pembayaran');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ShowInfoPeserta()
    {
        $result_join = DB::table('users')
        ->join('pesertas','users.id','=','pesertas.id')
        // ->join('anggotas','pesertas.id_peserta','=','anggotas.id_peserta')
        // ->join('kelompoks','anggotas.id_kelompok','=','kelompoks.id_kelompok')
        // ->select('users.*','pesertas.*','anggotas.*','kelompoks.*')
        ->select('users.*','pesertas.*')
        ->get();

        if(Auth::user()->role == 'peserta'){
            abort(404);
        }elseif(Auth::user()->role == 'admin'){
            return view('pengurus/PanelInfoPeserta',[
                //'value'=>$result,
                'value_join'=>$result_join
            ]);
        }
    }

    public function seminarAccept($id){
        $result = DB::table('seminars')->where('id','=',$id)->get();
        // return new seminarValid($result);
        // Mail::to()->send(new seminarValid());
    }
}
