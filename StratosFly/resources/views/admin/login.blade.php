@extends('template')
@section('title', 'Connexion')

@section('content')
    <div style="
        background-image: url('/images/login-bg.jpg');
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
            background-color: rgba(255, 255, 255, 0.92);
            padding: 2rem;
            border-radius: 10px;
            max-width: 400px;
            width: 100%;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
        ">
            <h3 style="text-align: center; margin-bottom: 1.5rem;"><i class="bi bi-person-fill me-2"></i>Connexion</h3>
            
            
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
                    <label for="email" class="form-label"><i class="bi bi-envelope-fill me-2"></i>Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Entrez votre email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label"><i class="bi bi-key-fill me-2"></i>Mot de passe</label>
                    <input type="password" class="form-control" id="password" placeholder="Mot de passe" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Se connecter</button>
                <p class="mt-3 text-center">Vous n'avez pas de compte ? <a href="/accountCreation">S'inscrire</a></p>
            </form>
        </div>
    </div>
@endsection