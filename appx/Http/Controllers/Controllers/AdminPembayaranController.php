<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\peserta;
use App\anggota;
use App\kelompok;
use App\User;
use DB;
use Illuminate\Support\Facades\Auth;

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
        //
        
        // $result_join = DB::table('users')
        // ->join('pesertas','users.id','=','pesertas.id')
        // ->join('anggotas','pesertas.id_peserta','=','anggotas.id_peserta')
        // ->join('kelompoks','anggotas.id_kelompok','=','kelompoks.id_kelompok')
        // ->select('users.username','pesertas.*','kelompoks.nama_kelompok')
        // ->get();

        $result_join = DB::table('users')
        ->join('pesertas','users.id','=','pesertas.id')
        ->select('users.*','pesertas.*')
        ->get();

        $result = peserta::where('id','=',Auth::user()->id)->firstOrFail();
        if(!$result){
            dd('not found');
            //abort(404);
        }

        if(Auth::user()->role == 'peserta'){
            abort(404);
        }elseif(Auth::user()->role == 'admin'){
            return view('pengurus/PanelPembayaran',[
                'value'=>$result,
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
        //
        $result = peserta::where('id','=',Auth::user()->id)->firstOrFail();
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
        DB::table('pesertas')
      ->where('id','=',$id)
      ->update([
        'status' => 'yes',
        ]);

        return redirect('/admin/pembayaran');
    }

    public function rejected(Request $request, $id)
    {
        //
        DB::table('pesertas')
      ->where('id','=',$id)
      ->update([
        'status' => 'rejected',
        ]);

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
}
