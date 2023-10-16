<?php

namespace App\Http\Controllers;

use App\Models\Aeroports;
use Illuminate\Http\Request;

class AeroportsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aeroports = Aeroports::all();
        return view('aeroports.index', ['aeroports' => $aeroports]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('aeroports.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nom_aeroport' =>'required',
            'ville_aeroport' =>'required',
            'code' =>'required|integer',
            'nombre_piste' =>'required|integer'
        ]);

        $newAeroport = Aeroports::create($data);
        return redirect(route('aeroports.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Aeroports $aeroports)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aeroports $aeroports)
    {
        return view('aeroports.edit', ['aeroports' => $aeroports]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aeroports $aeroports)
    {
        $data = $request->validate([
            'nom_aeroport' =>'required',
            'ville_aeroport' =>'required',
            'code' =>'required|integer',
            'nombre_piste' =>'required|integer'
        ]);

        $aeroports->update($data);
        return redirect(route('aeroports.index'))->with('success', 'Aeroport édité avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aeroports $aeroports)
    {
        $aeroports->delete();
        return redirect(route('aeroports.index'))->with('success', 'Aeroport supprimé avec succès');
    }
}
