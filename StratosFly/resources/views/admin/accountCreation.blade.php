@extends('template')
@section('title', 'StratosFly - Creation de compte')

@section('content')
<div class="min-vh-100 d-flex justify-content-center align-items-center p-4" style="background: url('/images/login-bg.jpg') center/cover no-repeat;">
    <div class="bg-white bg-opacity-75 p-4 rounded-3 shadow" style="max-width: 450px; width: 100%;">
        <h3 class="text-center mb-4"><i class="bi bi-person-fill me-2"></i>Création de compte</h3>

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="/accountCreation" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label"><i class="bi bi-person-vcard-fill me-2"></i>Nom</label>
                <input type="text" class="form-control" id="name" placeholder="Entrez votre nom" name="name" required>
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label"><i class="bi bi-person-vcard me-2"></i>Prénom</label>
                <input type="text" class="form-control" id="prenom" placeholder="Entrez votre prénom" name="prenom" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label"><i class="bi bi-envelope-fill me-2"></i>Email</label>
                <input type="email" class="form-control" id="email" placeholder="Entrez votre email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label"><i class="bi bi-key-fill me-2"></i>Mot de passe</label>
                <input type="password" class="form-control" id="password" placeholder="Mot de passe" name="password" required>
            </div>
            <div class="mb-3">
                <label for="genre" class="form-label"><i class="bi bi-gender-trans me-2"></i>Genre</label>
                <select class="form-select" id="genre" name="genre" required>
                    <option value="">Choisir...</option>
                    <option value="M">Homme</option>
                    <option value="MME">Femme</option>
                    <option value="NP">Autre</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100">Créer mon compte</button>
            <p class="mt-3 text-center">Vous avez déjà un compte ? <a href="/login">Se connecter</a></p>
        </form>
    </div>
</div>

@endsection