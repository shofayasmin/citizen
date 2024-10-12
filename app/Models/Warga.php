<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $primaryKey = 'nik';
    protected $fillable = [
        'nik', 
        'no_kk',
        'nama_lengkap', 
        'tempat_lahir', 
        'tanggal_lahir', 
        'jenis_kelamin', 
        'alamat', 
        'agama', 
        'nomor_telepon', 
        'status', 
        'pekerjaan', 
        'kewarganegaraan', 
        'domisili', 
        'usia'
    ];
    public function kk()
    {
        return $this->belongsTo(Kk::class, 'no_kk', 'no_kk');
    }
    public static function boot()
    {
        parent::boot();

        static::saved(function ($warga) {
            if ($warga->kk) {
                $warga->kk->updateCalculatedFields();
                $warga->kk->save();
            }
        });

        static::deleted(function ($warga) {
            if ($warga->kk) {
                $warga->kk->updateCalculatedFields();
                $warga->kk->save();
            }
        });
    }
    public function rumah()
    {
        return $this->belongsTo(Rumah::class, 'no_kk', 'no_kk');
    }
    
}

