<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['laporan_id', 'user_id', 'content'];

    public function laporan()
    {
        return $this->belongsTo(Laporan::class,'laporan_id','laporan_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }
}
