@extends('template')
@section('title', 'login')

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
            <h3 style="text-align: center; margin-bottom: 1.5rem;">Connexion</h3>
            
            @if ($errors->has('invalid'))
                <div class="alert alert-danger">
                    {{ $errors->first('invalid') }}
                </div>
            @endif
            @if ($errors->has('required'))
                <div class="alert alert-danger">
                    {{ $errors->first('required') }}
                </div>
            @endif
            <form action="/login" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Entrez votre email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password" placeholder="Mot de passe" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Se connecter</button>
                <p class="mt-3 text-center">Vous n'avez pas de compte ? <a href="/accountCreation">S'inscrire</a></p>
            </form>
        </div>
    </div>
@endsection