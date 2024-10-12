<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kk extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_kk';
    protected $fillable = [
        'no_kk', 
        'alamat', 
        'nik_kepala_keluarga', 
        'jumlah_usia_produktif', 
        'jumlah_anggota_kk', 
        'jumlah_usia_lanjut', 
    ];
    public function wargas()
    {
        return $this->hasMany(Warga::class, 'no_kk', 'no_kk');
    }
    public function rumah()
    {
        return $this->belongsTo(Rumah::class, 'nik_kepala_keluarga', 'nik_pemilik');
    }
    public static function boot()
    {
        parent::boot();

        static::creating(function ($kk) {
            $kk->updateCalculatedFields();
        });

        static::updating(function ($kk) {
            $kk->updateCalculatedFields();
        });
    }
    public function updateCalculatedFields()
    {
        $wargas = $this->wargas;
        
        $this->jumlah_anggota_kk = $wargas->count();
        $this->jumlah_usia_produktif = $wargas->whereBetween('usia', [15, 64])->count();
        $this->jumlah_usia_lanjut = $wargas->where('usia', '>', 64)->count();
    }
}
