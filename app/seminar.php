<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class seminar extends Model
{
    protected $fillable = [
        'nama_lengkap', 'alamat', 'no_hp', 'email', 'bukti_bayar',
    ];
    protected $table = 'seminars';
    protected $primaryKey = 'id';
}
