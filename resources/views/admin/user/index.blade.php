@extends('layouts.admin.base')

@section('title', 'Page utilisateurs')

@section('content')

    <h1>@yield('title')</h1>

    <a href="{{ route('admin.user.create') }}" class="btn btn-primary">Ajouter</a>

    <!-- TODO: AFFicher la listes de tous les utilisateurs -->

    @foreach($users as $user)

    @endforeach

@endsection
