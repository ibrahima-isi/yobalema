@extends('layouts.admin.base')
@section('title', 'Liste des chauffeurs')

@section('content')
    <div class="d-flex justify-content-between">
        <h2>@yield('title')</h2>
        <a href="{{ route("admin.chauffeur.create") }}" class="btn btn-primary"> Ajouter</a>
    </div>
    <div class="py-12">
        <div class="m-auto card">

            <table class="table table-striped">
                <thead class="table-header-group">
                <tr>
                    <th scope="col">Profile</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Numéro de Permis</th>
                    <th scope="col">Catégorie</th>
                    <th scope="col">Date Délivrance</th>
                    <th scope="col">Date Expiration</th>
                    <th scope="col">Annee Expérience</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($chauffeurs as $chauffeur)
                    <tr>
                        <td>
                            <img src="{{ asset('/storage/'.$chauffeur->image) }}" class="rounded"
                            alt="Chauffeur Avatar" width="150" height="150">
                        </td>
                        <td>{{ $chauffeur->num_permis }}</td>
                        <td>{{ $chauffeur->categorie }}</td>
                        <td>{{ $chauffeur->date_delivrance }}</td>
                        <td>{{ $chauffeur->expiration }}</td>
                        <td>{{ $chauffeur->annee_experience }}</td>
                        <td>
                            <a href="{{ route("admin.chauffeur.edit", $chauffeur) }}"
                               class="btn btn-primary">Modifier</a>
                            <form action="{{ route("admin.chauffeur.destroy", $chauffeur) }}" method="post"
                                  class="needs-validation d-inline" novalidate>
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
