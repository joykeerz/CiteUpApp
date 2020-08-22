<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class anggota extends Model
{
    //
    protected $fillable = [
        'nama_anggota','id_peserta','id_kelompok',
    ];
    protected $table = 'anggotas';

    public function peserta(){
        return $this->belongsTo(peserta::class,'id_peserta');
    }

    public function kelompok(){
        return $this->belongsTo(kelompok::class,'id_kelompok');
    }
}
