@extends('layouts.admin.base')

@section('title', $contrat->exists ? 'Modifier le contrat' : 'Ajouter un contrat')

@section('content')
    <h1>@yield('title')</h1>
    <div class="d-flex justify-content-end">
        <a href="{{ route('admin.contrat.index') }}" class="btn btn-danger">Retour</a>
    </div>
@endsection
