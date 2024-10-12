<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlternativesResult extends Model
{
    use HasFactory;
    protected $fillable = ['alternative_id', 'net_flow'];

    // Define the relationship with the Alternatives model
    public function alternative()
    {
        return $this->belongsTo(Alternatives::class, 'alternative_id');
    }
}
