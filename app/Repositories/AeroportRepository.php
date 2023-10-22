<?php

namespace App\Repositories;

use App\Models\Aeroports;

interface AeroportRepositoryInterface
{
    public function all();
    public function find($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}

class AeroportRepository implements AeroportRepositoryInterface
{
    public function all()
    {
        return Aeroports::all();
    }

    public function find($id)
    {
        return Aeroports::find($id);
    }

    public function create(array $data)
    {
        return Aeroports::create($data);
    }

    public function update(Aeroports $aeroport, array $data)
    {
        $aeroport->update($data);
    }

    public function delete(Aeroports $aeroport)
    {
        $aeroport->delete();
    }

}