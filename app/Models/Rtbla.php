<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rt extends Model
{

    protected $primaryKey = 'rt_id';
    protected $fillable = [
        'nik_ketua',
        'no_rt',
        'mulai_masa_jabatan',
        'berakhir_masa_jabatan',
    ];
}
