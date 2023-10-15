<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aeroports extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_aeroport',
        'ville_aeroport',
        'code',
        'nombre_piste'
    ];
}
