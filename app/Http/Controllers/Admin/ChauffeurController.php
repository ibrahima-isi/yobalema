<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChauffeurFormRequest;
use App\Models\Chauffeur;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;


class ChauffeurController extends Controller
{

    private array $categories_permis =   [
        'categorie A1' => 'A1',
        'categorie A' => 'A',
        'categorie B' => 'B',
        'categorie C' => 'C',
        'categorie D' => 'D',
        'categorie E' => 'E',
        'categorie F' => 'F'
    ];

    private function setImage(Chauffeur $chauffeur, ChauffeurFormRequest $request) {

        $data = $request->validated();

        /* @var UploadedFile|null $image */
        $image = $request->validated('image_vehicule');

        if ( $image == null || $image->getError() ){
            return $data;
        }
        else
        {

            if ($chauffeur->image)
            {
                Storage::disk('public')->delete($chauffeur->image);
            }

            $data['image_vehicule'] = $image->store('vehicule', 'public');

        }

        return $data;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chauffeur = User::with('chauffeurs')
            -> where('role_user_id', '=',3)
            -> paginate(20);
        return view('admin.chauffeur.index', [
            'chauffeurs' => $chauffeur,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.chauffeur.form', [
            'chauffeur' => new User(),
            'utilisateurs' => User::with('role_user')->get(),
            'categories' => $this->categories_permis,
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
        return view('admin.chauffeur.form', [
            'chauffeur' => $chauffeur,
            'utilisateurs' => User::with('role_user')->get(),
            'categories' => $this->categories_permis,
        ]);

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
