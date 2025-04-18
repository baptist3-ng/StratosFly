@extends('template')
@section('title', 'Creation de compte')

@section('content')
    <div style="
        background-image: url('/images/login-bg.jpg'); /* ➜ Mets ton image ici */
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 2rem;
    ">
        <div style="
            background-color: rgba(255, 255, 255, 0.93);
            padding: 2rem;
            border-radius: 12px;
            max-width: 450px;
            width: 100%;
            box-shadow: 0 0 18px rgba(0,0,0,0.25);
        ">
            <h3 style="text-align: center; margin-bottom: 1.5rem;">Création de compte</h3>
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
                    <label for="name" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="name" placeholder="Entrez votre nom" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="prenom" placeholder="Entrez votre prénom" name="prenom" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Entrez votre email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password" placeholder="Mot de passe" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="genre" class="form-label">Genre</label>
                    <select class="form-control" id="genre" name="genre" required>
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