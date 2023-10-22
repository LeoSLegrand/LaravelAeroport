<?php

namespace App\Http\Controllers;

use App\Models\Aeroports;
use Illuminate\Http\Request;
use Silber\Bouncer\Bouncer;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\AeroportsRequest;
use App\Repositories\AeroportRepository;

class AeroportsController extends Controller
{

    private $repository;

    public function __construct(AeroportRepository $repository){
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $aeroports = Aeroports::all();
        if (Gate::allows('access-aeroport')) {
            $aeroports = Aeroports::all();
            return view('aeroports.index', ['aeroports' => $aeroports]);

        } else {
            abort(403, 'Accès refusé car vôtre compte n a pas le rôle Admin');
            
        }
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

        $data = $request->all();

        //$newAeroport = Aeroports::create($data);
        $aeroports = $this->repository->store($request->all());
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

        $data = $request->all();

        //$aeroports->update($data);
        $this->repository->update($aeroports, $request->all());

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
