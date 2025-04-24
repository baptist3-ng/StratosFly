@extends('template')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm p-4">
        <h2 class="mb-4">Modifier mes informations</h2>

        <form action="{{ route('user.update') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" name="prenom" value="{{ old('prenom', $user->prenom) }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Adresse email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Nouveau mot de passe <small>(laisser vide si inchangé)</small></label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>

            <div class="mb-3">
                <label for="genre" class="form-label">Genre</label>
                <select name="genre" class="form-control" required>
                    <option value="M" {{ $user->genre == 'M' ? 'selected' : '' }}>Homme</option>
                    <option value="MME" {{ $user->genre == 'MME' ? 'selected' : '' }}>Femme</option>
                    <option value="NP" {{ $user->genre == 'NP' ? 'selected' : '' }}>Autre</option>
                </select>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-success">Enregistrer</button>
                <a href="{{ route('user.infos') }}" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>
</div>
@endsection