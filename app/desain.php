<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class desain extends Model
{
    protected $fillable = [
        'id_peserta', 'kode_invite', 'desain_img',
    ];
    protected $table = 'desains';
    protected $primaryKey = 'id_desain';
}
