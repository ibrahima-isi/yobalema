<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChauffeurFormRequest;
use App\Models\Chauffeur;
use App\Models\User;


class ChauffeurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chauffeur = Chauffeur::with('vehicule')
            ->paginate(20);
        return view('admin.chauffeur.index', [
            'chauffeurs'=> $chauffeur,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.chauffeur.form', [
            'chauffeur' => new Chauffeur(),
            'utilisateurs' => User::with('role_user')->get(),
            ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ChauffeurFormRequest $request)
    {
        Chauffeur::create($request->validated());

        return to_route('admin.chauffeur.index')
            -> with('success', 'Role modifié avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Chauffeur $chauffeur)
    {
        return view('admin.chauffeur.show', ['chauffeur' => new Chauffeur()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chauffeur $chauffeur)
    {
        return view('admin.chauffeur.form',
            compact('chauffeur'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ChauffeurFormRequest $request, Chauffeur $chauffeur)
    {
        $chauffeur->update($request->validated());

        return to_route('admin.chauffeur.index')
            -> with('success', 'Role modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chauffeur $chauffeur)
    {
        $chauffeur->delete();

        return redirect()
            -> back()
            -> with('success', 'Véhicule supprimer');
    }
}
