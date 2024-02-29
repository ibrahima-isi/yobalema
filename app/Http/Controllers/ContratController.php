<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContratFormRequest;
use App\Models\Contrat;
use Illuminate\Http\Request;

class ContratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contrats = Contrat::with('chauffeur')->get();
        return view('admin.contrats.index', [
            'contrats' => $contrats,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.contrats.form', [
            'contrat' => new Contrat(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContratFormRequest $request)
    {
        Contrat::create($request->validated());
        return to_route('admin.contrat.index')
            ->with('succes', 'Contrat Créé avec succés');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contrat $contrat)
    {
        return view('admin.contrats.show', [
            'contrat' => $contrat,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contrat $contrat)
    {
        return view('admin.contrats.form',
        compact('contrat')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContratFormRequest $request, Contrat $contrat)
    {
        $contrat->update($request->validated());
        return to_route('admin.contrat.index')
            ->with('success', "Contrat mis a jour");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contrat $contrat)
    {
        $contrat->delete();
        return redirect()->back()->with('success', "Contrat supprimé");
    }
}
