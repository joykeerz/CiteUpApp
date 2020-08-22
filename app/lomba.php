<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lomba extends Model
{
    protected $fillable = [
        'id_peserta', 'is_mulai', 'is_hasil',
    ];
    protected $table = 'lombas';
    protected $primaryKey = 'id_lomba';
}
