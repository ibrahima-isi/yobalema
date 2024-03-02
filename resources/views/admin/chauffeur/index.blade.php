@extends('layouts.admin.base')
@section('title', 'Liste des chauffeurs')

@section('content')
    <div class="d-flex justify-content-between">
        <h2>@yield('title')</h2>
        <a href="{{ route("admin.chauffeur.create") }}" class="btn btn-primary"> Ajouter</a>
    </div>
    <div class="py-12">
        <div class="card col-md-8 m-auto">

            <table class="table table-striped">
                <thead class="table-header-group">
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Type de Contrats</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($chauffeurs as $chauffeur)
                    <tr>
                        <td>{{ $chauffeur->matricule }}</td>
                        <td>
                            <a href="{{ route("admin.vehicule.edit", $chauffeur) }}"
                               class="btn btn-primary">Modifier</a>
                            <form action="{{ route("admin.vehicule.destroy", $chauffeur) }}" method="post"
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
