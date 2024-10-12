<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporan extends Model
{
    use HasFactory;
    protected $primaryKey = 'laporan_id';
    protected $fillable = [
        'pengirim', 
        'judul',  
        'deskripsi', 
        'gambar', 
        'status',
    ];

    public function warga()
    {
        return $this->belongsTo(Warga::class, 'pengirim', 'nik');
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class,'laporan_id','laporan_id');
    }

}
