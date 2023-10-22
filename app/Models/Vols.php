<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Compagnies;
use App\Models\Aeroports;


class Vols extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero',
        'date_depart',
        'date_arivee',
        'heure_depart',
        'heure_arivee',
        'nombre_place',
        'compagnies_id',
        'aeroport_id_depart',
        'aeroport_id_arivee'

    ];
     public static function nbVolMois($mois) {
        // return Vols::whereRaw('year(date_depart)='.date('Y').' and month(date_depart) = '.$mois)->count();    --> sert pour les vols de 2023
        return Vols::whereRaw('month(date_depart) = '.$mois)->count();
     }

    public function compagnie(){
        
        return $this->belongsTo(Compagnies::class, 'compagnie_id');
    }

    public function aeroport(){
        
        return $this->belongsTo(Compagnies::class, 'aeroport_id_depart');
        return $this->belongsTo(Compagnies::class, 'aeroport_id_arivee');
    }
}
