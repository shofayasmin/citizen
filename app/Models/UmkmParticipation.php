<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UmkmParticipation extends Model
{
    use HasFactory;
    protected $table = 'umkm_participations';

    protected $fillable = [
        'user_id', 'umkm_id'
    ];
}
