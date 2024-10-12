<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SPK extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_spk';
    protected $fillable = [
        'luas_rumah', 
        'gaji', 
        'status', 
        'jumlah_usia_lanjut', 
        'jarak_domisili', 
    ];
}
