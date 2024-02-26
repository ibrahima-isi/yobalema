<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehiculeFormRequest;
use App\Models\Vehicule;

class VehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicule = Vehicule::with('chauffeur')
            ->paginate(20);
        return view('admin.vehicule.index', compact('vehicule'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.vehicule.form', ['vehicule' => new Vehicule()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VehiculeFormRequest $request)
    {
        Vehicule::create($request->validated());

        return to_route('admin.vehicule.index')
            -> with('success', 'Role modifié avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicule $vehicule)
    {
        return view('admin.vehicule.show', compact('vehicule'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicule $vehicule)
    {
        return view('admin.vehicule.form', compact('vehicule'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VehiculeFormRequest $request, Vehicule $vehicule)
    {
        $vehicule->update($request->validated());

        return to_route('admin.vehicule.index')
            -> with('success', 'Role modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicule $vehicule)
    {
        $vehicule->delete();

        return redirect()
            -> back()
            -> with('success', 'Véhicule supprimer');
    }
}
