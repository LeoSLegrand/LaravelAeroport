<?php

namespace App\Http\Controllers;

use App\Models\Compagnies;
use Illuminate\Http\Request;
use Silber\Bouncer\Bouncer;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\CompagniesRequest;
use App\Repositories\CompagnieRepository;

use App\Mail\CompagnieEditMail;
use App\Mail\CompagnieCreatedMail;

use Illuminate\Support\Facades\Mail;

class CompagniesController extends Controller
{

    private $repository;

    public function __construct(CompagnieRepository $repository){
        $this->repository = $repository;
    }

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

        $data = $request->all();

        //$newCompany = Compagnies::create($data);
        $compagnies = $this->repository->store($request->all());

        //Envoir Un mail quand on créé une Compagnie
        Mail::to("hello@example.com")->send(new CompagnieCreatedMail($compagnies));

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

        $data = $request->all();

        //$compagnies->update($data);
        $this->repository->update($compagnies, $request->all());

        //Envoir un mail lorsque l'on modifie une donnée dans un aéroport
        Mail::to("hello@example.com")->send(new CompagnieEditMail($compagnies));

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
