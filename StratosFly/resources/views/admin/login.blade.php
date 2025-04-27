@extends('template')
@section('title', 'StratosFly - Connexion')

@section('content')
<div class="min-vh-100 d-flex justify-content-center align-items-center p-4" style="background: url('/images/login-bg.jpg') center/cover no-repeat;">
    <div class="bg-white bg-opacity-75 p-4 rounded-3 shadow" style="max-width: 400px; width: 100%;">
        <h3 class="text-center mb-4">
            <i class="bi bi-person-fill me-2"></i>Connexion
        </h3>

        @if (session('loginRequired'))
            <div class="alert alert-warning" role="alert">
                {{ session('loginRequired') }}
            </div>
        @endif
        @if (session('invalidLogin'))
            <div class="alert alert-danger" role="alert">
                {{ session('invalidLogin') }}
            </div>
        @endif
        @if (session('accountCreated'))
            <div class="alert alert-success" role="alert">
                {{ session('accountCreated') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label ms-1">
                    <i class="bi bi-envelope-fill me-2"></i>Email
                </label>
                <input type="email" class="form-control" id="email" placeholder="Entrez votre email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label ms-1">
                    <i class="bi bi-key-fill me-2"></i>Mot de passe
                </label>
                <input type="password" class="form-control" id="password" placeholder="Mot de passe" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Se connecter</button>
            <p class="mt-3 text-center">
                Vous n'avez pas de compte ? <a href="/accountCreation">S'inscrire</a>
            </p>
        </form>
    </div>
</div>

@endsection