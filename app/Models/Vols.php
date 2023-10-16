<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vols extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero',
        'date_depart',
        'date_arivee',
        'heure_depart',
        'heure_arivee',
        'nombre_place' 
    ];
}
