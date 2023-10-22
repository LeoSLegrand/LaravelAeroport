<?php

namespace App\Repositories;

use App\Models\Vols;

interface VolsRepositoryInterface
{
    public function all();
    public function find($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}

class VolsRepository implements VolsRepositoryInterface
{
    public function all()
    {
        return Vols::all();
    }

    public function find($id)
    {
        return Vols::find($id);
    }

    public function create(array $data)
    {
        return Vols::create($data);
    }

    public function update(Vols $vols, array $data)
    {
        $vols->update($data);
    }

    public function delete(Vols $vols)
    {
        $vols->delete();
    }

}