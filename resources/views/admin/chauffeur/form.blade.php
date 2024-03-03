@extends('layouts.admin.base')
@section('title', $chauffeur->exists ? 'Modifier le chauffeur' : 'Ajouter un chauffer')
@section('content')
    <div class="container mt-5">
        <h1>@yield('title')</h1>
        <div class="card col-md-8">
            <div class="card-body">
                <form method="post" class="needs-validation vstack gap-2"
                      action="{{ route($chauffeur -> exists ? 'admin.chauffeur.update' : 'admin.chauffeur.store', $chauffeur) }}"
                      novalidate
                >
                    @csrf
                    @method($chauffeur->exists ? "PUT" : "POST")

                    @include('shared.input', ['label' => "Nom", 'name' => "name", 'value' => $chauffeur->name])
                    @if($utilisateurs)
{{--
    # SELECTIONNER L'UTILISATEUR QUI SERA LE CHAUFFEUR A PARTIR DE LA LISTE DES UTILISATEURS
--}}
                        <label for="user" class="form-label">Utilisateur</label>
                       <select id="user" class="form-control"  name="user">
                           <option value="" >Selectionner le chauffeur</option>
                           @foreach($utilisateurs as $utilisateur)
{{--                               {{ $utilisateur->role_user->id }}--}}
{{--                               {{ $utilisateur->role_user->name }}--}}
                               @if(strtolower($utilisateur->role_user?->name) == 'chauffeur')
                                   <option value="{{ $utilisateur->id }}">{{ $utilisateur->prenom }} {{ $utilisateur->nom }}</option>
                               @endif
                           @endforeach
                       </select>
                    @else
                        <p>Aucun utilisateur</p>
                    @endif

                    <button type="submit" class="btn btn-primary">
                        @if($chauffeur->exists)
                            Modifier
                        @else
                            Creer
                        @endif
                    </button>

                </form>
            </div>
        </div>
    </div>
@endsection
