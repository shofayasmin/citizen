<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class umkm extends Model
{
    use HasFactory;

    protected $primaryKey = 'umkm_id';
    protected $fillable = [
        'Nama', 
        'umkm',  
        'gambar',
        'tipe_umkm',
        'deskripsi'
    ];
}
