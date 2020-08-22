<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class peserta extends Model
{

    protected $fillable = [
        'asal_sekolah', 'alamat', 'no_hp', 'jenis_lomba','status','jenis_peserta','kode_invite','IsKelompok',
    ];
    protected $table = 'pesertas';
    protected $primaryKey = 'id_peserta';

    public function User(){
        return $this->belongsTo(User::class,'id_peserta');
    }

    public function anggota(){
        return $this->hasOne(anggota::class,'id_peserta');
    }
}
