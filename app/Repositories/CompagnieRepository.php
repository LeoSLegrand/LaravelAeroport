<?php

namespace App\Repositories;

use App\Models\Compagnies;

interface CompagnieRepositoryInterface
{
    public function all();
    public function find($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}

class CompagnieRepository implements CompagnieRepositoryInterface
{
    public function all()
    {
        return Compagnie::all();
    }

    public function find($id)
    {
        return Compagnies::find($id);
    }

    public function create(array $data)
    {
        return Compagnies::create($data);
    }

    public function update(Compagnies $compagnies, array $data)
    {
        $compagnies->update($data);
    }

    public function delete(Compagnies $compagnies)
    {
        $compagnies->delete();
    }

}