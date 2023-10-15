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
        return view('tableau');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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


        //$data = Vols::all();
        return view('list',['vols'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vols $vols)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vols $vols)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vols $vols)
    {
        //
    }
}
