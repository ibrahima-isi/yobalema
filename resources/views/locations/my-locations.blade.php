@extends('layouts.client.base')

@section('title', 'Mes Locations')

@section('content')
    <div class="bg-secondary" style="height: 100px;"></div>
    <div class="container">
    <div class="d-flex justify-content-between">
        <h2 class="align-self-start my-5">Liste mes locations</h2>
    </div>
    <div class="row vsatck gap-3">
        @foreach($locations as $location)
            <div class="card mb-5 col-md-4">
                <div class="card-header">
                    <h4 class="card-title">{{ $statut[$location->id] }}</h4>
                </div>
                <div class="card-body">
                    <p class="card-text">Départ: {{ $location->heure_depart }}</p>
                    <p class="card-text">Prix Montant: {{ $location->prix_estime  }} Fcfa</p>
                    <p class="card-text">Lieu de Départ: {{ $location->lieu_depart  }}</p>
                    <p class="card-text">Lieu de destination: {{ $location->lieu_destination }}</p>
                    <p class="card-text">Chauffeur en charge: {{ $location?->chauffeur_id }}</p>
                    <p class="card-text">Véhicule: {{ $location->vehicule?->matricule }}</p>
                    <form action="{{ route('admin.payement.store') }}" method="POST"
                          class="needs-validation" novalidate>
                        @csrf
                        @include('shared.input', ['label' => "Indiquer votre moyen de payement",
                            'name' => 'mode', 'type' => 'text', 'value' =>old('mode')])

                        <input type="hidden" name="location_id" value="{{ $location->id }}">
                        <button type="submit" class="btn btn-primary" @disabled($location->heure_arrivee!=null)>
                            Payer
                        </button>
                    </form>
                    <!--supprimer la location en cas d'annulation ou de rejet -->
                    <form action="{{ route('admin.location.destroy', ['location' => $location]) }}"
                          method="POST" class="mt-4 needs-validation" novalidate>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            Annuler la location
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    </div>
@endsection
