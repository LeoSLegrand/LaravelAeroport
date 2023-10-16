<?php

namespace App\Http\Controllers;

use App\Models\Vols;
use Illuminate\Http\Request;

class VolsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $nb_vols = Vols::select('id', 'date_depart')->get() ->groupBy(function($date) {

        //     return Vols::parse($date->date_depart)->format('m');
        // });
        //return view('tableau');
        $vols = Vols::all();
        return view('vols.index', ['vols' => $vols]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vols.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
        //return view('list');
        //$data = Vols::orderBy('date_depart', 'desc')->get();

        $data = Vols::
        orderBy('date_depart', 'desc')
        ->orderBy('heure_depart', 'desc')
        ->get();

        return view('list',['vols'=>$data]);

        // $count = Vols::selectRaw('MONTH(date_depart) as month, COUNT(*) as flight_count')
        // ->groupBy('month')
        // ->orderBy('month')
        // ->get();

        // return view('list', compact('count'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vols $vols)
    {
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
        $vols->delete();
        return redirect(route('vols.index'))->with('success', 'Vol supprimé avec succès');
    }

}
