<?php

namespace App\Repositories;

use App\Models\Vols;
use App\Models\Aeroports;
use App\Models\Compagnies;

class VolsRepository {

    protected $vols;

    public function __construct(Vols $vols){
        $this->vols = $vols;
    }

    private function save(Vols $vols, array $inputs) {
        $vols->numero = $inputs['numero'];
        $vols->date_depart = $inputs['date_depart'];
        $vols->date_arivee = $inputs['date_arivee'];
        $vols->heure_arivee = $inputs['heure_arivee'];
        $vols->heure_depart = $inputs['heure_depart'];
        $vols->nombre_place = $inputs['nombre_place'];
        $vols->save();
    }

    public function store(array $inputs) {
        //$vols = new $vols->vols;
        $vols = $this->vols->newInstance(); // Crée une nouvelle instance de la classe Vols.
        $this->save($vols, $inputs);
        return $vols;
    }

    public function update(Vols $vols, array $inputs){
        $this->save($vols, $inputs);
        return $vols;
    }
}