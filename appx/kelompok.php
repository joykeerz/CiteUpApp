<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kelompok extends Model
{
    //
    protected $fillabel = [
        'nama_kelompok',
    ];
    protected $table = 'kelompoks';
    protected $primaryKey = 'id_kelompok';

    public function kelompok(){
        return $this->hasOne(kelompok::class,'id_kelompok');
    }
}
