<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenditure extends Model
{
    use HasFactory;
    protected $primaryKey = 'expenditure_id';
    protected $fillable = [
        'expenditure_name', 
        'amount', 
        'description', 
        'date',
    ];
}
