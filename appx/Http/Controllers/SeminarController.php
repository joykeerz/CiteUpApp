<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use DB;

class SeminarController extends Controller
{

    public function seminar_regist(Request $request) {
        //dd($request);
        if($request->hasFile('payment'))
        {
            $dir = "images/seminar_payments/";
            $extension = strtolower($request->file('payment')->getClientOriginalExtension());
            $filename = "sp_".time()."_".$request['fullname'].'.'.$extension;
            $request->file('payment')->move($dir, $filename);
        }

        $id_peserta = DB::table('seminars')->insertGetId([
            'nama_lengkap' => $request['fullname'],
            'profesi' => $request['profesi'],
            'instansi' => $request['instansi'],
            'alamat' => $request['address'],
            'no_hp' => $request['no_hp'],
            'email' => $request['email'],
            'media_sosial' => $request['media_sosial'],
            'bukti_bayar' => $filename,
        ]);

        return view('/peserta/SeminarPaymentInfo',['data'=>$request]);
    }

}