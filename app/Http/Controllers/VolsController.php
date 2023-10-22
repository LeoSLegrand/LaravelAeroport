<?php

namespace App\Http\Controllers;

use App\Models\Vols;
use Illuminate\Http\Request;
use Silber\Bouncer\Bouncer;
use Illuminate\Support\Facades\Gate;


class VolsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $vols = Vols::all();
        if (Gate::allows('access-vols')) {
            return view('vols.index', ['vols' => $vols]);

        } else {
            abort(403, 'Accès refusé car vôtre compte n a pas le rôle Compagnie');
            
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $vols = Vols::all();
            return view('vols.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
   
        $vols = Vols::all();

            $data = $request->validate([
                'numero' =>'required|integer',
                'date_depart' =>'required|date|',
                'date_arivee' =>'required|date|after:date_depart',
                'heure_depart' =>'required|date_format:H:i:s',
                'heure_arivee' =>'required|date_format:H:i:s|after:heure_depart',
                'nombre_place' =>'required|integer'
            ]);
    
            $newVol = Vols::create($data);
            return redirect(route('vols.index'));
    
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Vols $vols)
    {

        $data = Vols::
        orderBy('date_depart', 'desc')
        ->orderBy('heure_depart', 'desc')
        ->get();

        return view('list',['vols'=>$data]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vols $vols)
    {

        $vols = Vols::all();
            return view('vols.edit', ['vols' => $vols]);
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vols $vols)
    {
        $data = $request->validate([
            'numero' =>'required|integer',
            'date_depart' =>'required|date|',
            'date_arivee' =>'required|date|after:date_depart',
            'heure_depart' =>'required|date_format:H:i:s',
            'heure_arivee' =>'required|date_format:H:i:s|after:heure_depart',
            'nombre_place' =>'required|integer'
        ]);

        $vols->update($data);
        return redirect(route('vols.index'))->with('success', 'Vol édité avec succès');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vols $vols)
    {
      
        $vols = Vols::all();
            $vols->delete();
            return redirect(route('vols.index'))->with('success', 'Vol supprimé avec succès');

    }

}
