@extends('template')
@section('title', 'login')

@section('content')
    <div class="container my-5 pt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Connexion</h3>
                    </div>
                    <div class="card-body">
                        <form action="/login" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" placeholder = "Entrez votre email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label" >Mot de passe</label>
                                <input type="password" class="form-control" id="password" placeholder = "Mot de passe" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Se connecter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection