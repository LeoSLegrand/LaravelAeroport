<?php

namespace App\Repositories;

use App\Models\Compagnies;


class CompagnieRepository {

    protected $compagnies;

    public function __construct(Compagnies $compagnies){
        $this->compagnies = $compagnies;
    }

    private function save(Compagnies $compagnies, array $inputs) {
        $compagnies->nom_compagnie = $inputs['nom_compagnie'];
        $compagnies->pays = $inputs['pays'];
        $compagnies->save();
    }

    public function store(array $inputs) {
        //$compagnies = new $compagnies->compagnies;
        $compagnies = $this->compagnies->newInstance(); // Crée une nouvelle instance de la classe Compagnies.
        $this->save($compagnies, $inputs);
        return $compagnies;
    }

    public function update(Compagnies $compagnies, array $inputs){
        $this->save($compagnies, $inputs);
        return $compagnies;
    }
}