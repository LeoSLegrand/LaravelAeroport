<?php

namespace App\Repositories;

use App\Models\Aeroports;

class AeroportRepository {

    protected $aeroports;

    public function __construct(Aeroports $aeroports){
        $this->aeroports = $aeroports;
    }

    private function save(Aeroports $aeroports, array $inputs) {
        $aeroports->nom_aeroport = $inputs['nom_aeroport'];
        $aeroports->ville_aeroport = $inputs['ville_aeroport'];
        $aeroports->code = $inputs['code'];
        $aeroports->nombre_piste = $inputs['nombre_piste'];
        
        $aeroports->save();
    }

    public function store(array $inputs) {
        //$aeroports = new $aeroports->aeroports;
        $aeroports = $this->aeroports->newInstance(); // Crée une nouvelle instance de la classe Aeroports.
        $this->save($aeroports, $inputs);
        return $aeroports;
    }

    public function update(Aeroports $aeroports, array $inputs){
        $this->save($aeroports, $inputs);
        return $aeroports;
    }
}