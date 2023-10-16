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
     public static function nbVolMois($mois) {
        // return Vols::whereRaw('year(date_depart)='.date('Y').' and month(date_depart) = '.$mois)->count();    --> sert pour les vols de 2023
        return Vols::whereRaw('month(date_depart) = '.$mois)->count();
     }
}
