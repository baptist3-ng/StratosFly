@extends('template')

@section('title', 'Mes Informations')

@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="container mt-5">
    <div class="card shadow-sm p-4">
        <h2 class="mb-4"><i class="bi bi-info-circle"> Mes Informations</i></h2>

        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>Nom :</strong> {{ $user->name }}</li>
            <li class="list-group-item"><strong>Prénom :</strong> {{ $user->prenom }}</li>
            <li class="list-group-item"><strong>Email :</strong> {{ $user->email }}</li>
            <li class="list-group-item"><strong>Genre :</strong> {{ $user->genre }}</li>
        </ul>

        <div class="mt-4">
            <a href="{{ route('account.home') }}" class="btn btn-secondary">Retour</a>
            <a href="{{ route('user.edit') }}" class="btn btn-primary">Modifier mes informations</a>
        </div>
    </div>
</div>
@endsection