@extends('layouts.admin.base')
@section('title', $chauffeur->exists ? 'Modifier le chauffeur' : 'Ajouter un chauffer')
@section('content')
    <div class="container mt-5">
        <h1>@yield('title')</h1>
        <div class="card col-md-8">
            <div class="card-body">
                <form method="post" class="gap-2 needs-validation vstack"
        action="{{ route($chauffeur->exists ? 'admin.chauffeur.update' : 'admin.chauffeur.store', $chauffeur) }}"
                      novalidate
                >
                    @csrf
                    @method($chauffeur->exists ? "PUT" : "POST")

                    @include('shared.input', ['label' => "Numero Permis", 'name' => "num_permis",
                     'value' => $chauffeur->num_permis])

                    @include('shared.select', ['label' => "Categorie", 'name' => "prenom",
                     'value' => $chauffeur->prenom])

                    @include('shared.input', ['type' => 'email', 'name' => "email", 'value' => $chauffeur->email])

                    @include('shared.input', ['type' => 'password', 'name' => 'password', 'label' => 'Mot de passe'])

                    @include('shared.input', ['type' => 'password', 'name' => 'confirm_password',
                     'label' => 'Confirmer le mot de passe'])

                    @include('shared.input', ['label' => 'Téléphone', 'name' => 'telephone',
                     'value' => $chauffeur->telephone])

                     @include('shared.input', ['name' => 'adresse', 'value' => $chauffeur->adresse])

                    <button type="submit" class="btn btn-primary">
                        @if($chauffeur->exists)
                            Continuer la Modification
                        @else
                            Continuer
                        @endif
                    </button>

                </form>
            </div>
        </div>
    </div>
@endsection
