<?php

namespace App\Http\Controllers;

use App\Models\Compagnies;
use Illuminate\Http\Request;
use Silber\Bouncer\Bouncer;
use Illuminate\Support\Facades\Gate;

class CompagniesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        

        $vols = Compagnies::all();
        if (Gate::allows('access-compagnie')) {
            $compagnies = Compagnies::all();
            return view('compagnies.index', ['compagnies' => $compagnies]);

        } else {
            abort(403, 'Accès refusé car vôtre compte n a pas le rôle Compagnie');

        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('compagnies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nom_compagnie' =>'required|alpha_dash:ascii',
            'pays' =>'required|alpha_dash:ascii'
        ]);

        $newCompany = Compagnies::create($data);
        return redirect(route('compagnies.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Compagnies $compagnies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Compagnies $compagnies)
    {
        return view('compagnies.edit', ['compagnies' => $compagnies]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Compagnies $compagnies)
    {
        $data = $request->validate([
            'nom_compagnie' =>'required|alpha_dash:ascii',
            'pays' =>'required|alpha_dash:ascii'
        ]);

        $compagnies->update($data);
        return redirect(route('compagnies.index'))->with('success', 'Compagnie édité avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Compagnies $compagnies)
    {
        $compagnies->delete();
        return redirect(route('compagnies.index'))->with('success', 'Compagnie supprimé avec succès');
    }
}
