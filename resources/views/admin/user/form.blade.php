@extends('layouts.admin.base')

@section('title', 'Formulaire utilisateur')

@section('content')

    <h1>@yield('title')</h1>

    <div class="card">
        <div class="card-header">
            <div class="card-title">@yield('title')</div>
        </div>
        <div class="card-body">
            <form class="needs-validation" novalidate action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    @include('shared.input',['name' => 'nom', 'value' => $user->nom, 'required' => false,
                        'class' => 'col-md-4' ])

                    @include('shared.input',['name' => 'prenom', 'value' => $user->prenom, 'class' => 'col-md-4'])

                </div>


                @include('shared.input', ['label' => 'Mot de passe', 'name' => 'password',
                        'type' => 'password'])

            </form>
        </div>
    </div>

@endsection


