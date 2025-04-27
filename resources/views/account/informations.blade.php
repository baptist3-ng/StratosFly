@extends('template')

@section('title', 'StratosFly - Mes Informations')

@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="container my-5">
    <div class="card shadow-sm p-4">
        <h2 class="mb-4"><i class="bi bi-info-circle-fill me-2"></i>Mes Informations</h2>

        <ul class="list-group list-group-flush">
            <li class="list-group-item"><i class="bi bi-person-vcard-fill me-2"></i><strong>Nom :</strong> {{ $user->name }}</li>
            <li class="list-group-item"><i class="bi bi-person-vcard me-2"></i><strong>Prénom :</strong> {{ $user->prenom }}</li>
            <li class="list-group-item"><i class="bi bi-envelope-fill me-2"></i><strong>Email :</strong> {{ $user->email }}</li>
            <li class="list-group-item"><i class="bi bi-gender-trans me-2"></i><strong>Genre :</strong> {{ $user->genre }}</li>
        </ul>

        <div class="mt-4">
            <a href="{{ route('account.home') }}" class="btn btn-secondary">Retour</a>
            <a href="{{ route('user.edit') }}" class="btn btn-primary">Modifier mes informations</a>
        </div>
    </div>
</div>
@endsection