<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporan extends Model
{
    use HasFactory;
    protected $primaryKey = 'laporan_id';
    protected $fillable = [
        'judul', 
        'deskripsi',  
        'gambar',  
        'pengirim',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
