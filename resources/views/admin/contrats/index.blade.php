@extends('layouts.admin.base')

@section('title', 'Contrats')

@section('content')
            <div class="d-flex  justify-content-between">
                <h2 class="align-self-start">Liste des contrats</h2>
                <a href="{{ route('admin.contrat.create') }}" class="btn btn-primary" >Ajouter</a>
            </div>
@endsection

