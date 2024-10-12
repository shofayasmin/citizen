<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rt extends Model
{
    use HasFactory;
    protected $primaryKey = 'rt_id';
    public function warga()
    {
        return $this->belongsTo(Warga::class, 'nik_ketua', 'nik');
    }
    protected $fillable = [
        'nik_ketua',
        'no_rt',
        'mulai_masa_jabatan',
        'berakhir_masa_jabatan',
    ];
}
