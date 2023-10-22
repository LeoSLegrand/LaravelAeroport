<?php

namespace App\Http\Controllers;

use App\Models\Vols;
use Illuminate\Http\Request;
use Silber\Bouncer\Bouncer;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\VolsRequest;
use App\Models\Compagnies;
use App\Models\Aeroports;
//use app\Repositories\VolsRepository;


class VolsController extends Controller
{

    // protected $volsRepository;

    // public function __construct(VolsRepository $volsRepository)
    // {
    //     $this->volsRepository = $volsRepository;
    // }

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
   
         // Obtenir une compagnie aléatoire
        $compagnieAleatoire = Compagnies::inRandomOrder()->first();
        $AeroportDepartAleatoire = Aeroports::inRandomOrder()->first();
        $AeroportAriveAleatoire = Aeroports::inRandomOrder()->first();

        $data = $request->all();

        // Attribuer l'ID de la compagnie aléatoire
        $data['compagnies_id'] = $compagnieAleatoire->id;
        $data['aeroport_id_depart'] = $AeroportDepartAleatoire->id;
        $data['aeroport_id_arivee'] = $AeroportAriveAleatoire->id;

        $newVol = Vols::create($data);
        //$newVol = $this->volsRepository->create($data);

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

        return view('vols.edit', ['vols' => $vols]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vols $vols)
    {

        $data = $request->all();

        $vols->update($data);
        //$this->volsRepository->update($vols, $data);

        return redirect(route('vols.index'))->with('success', 'Vol édité avec succès');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vols $vols)
    {
        $vols->delete();
        //$this->volsRepository->delete($vols);

        return redirect(route('vols.index'))->with('success', 'Vol supprimé avec succès');

    }

}
