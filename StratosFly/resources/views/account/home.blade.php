@extends('template')

@section('title', 'StratosFly - Mon Compte')

@section('content')

@auth

<link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">

<style>
.text-outline {
    color: white; /* Couleur intérieure */
    -webkit-text-stroke: 2px black; /* Contour noir de 2px */
    text-stroke: 2px black; /* Pour compatibilité étendue */
}
</style>

<div class="container-fluid" style="background: url('/images/interieur_aeroport.jpg') center/cover no-repeat; min-height: 400px;">
    <div class="row justify-content-evenly">
        <div class="col-sm-7 fs-1 ms-md-5 mt-3 fw-bold text-outline " style="font-family: 'Courgette', cursive;">
            @if ($user->genre == "NP")
                Bienvenue, {{$user->name . "."}}
            @else
                Bienvenue, {{ $user->genre . ". " . $user->name . "."}} 
            @endif
            <p class="lead text-muted">Content de vous revoir sur StratosFly !</p>
        </div>
        <div class="col-sm-3 mt-4 text-end">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            @method("delete")
            <button type="submit" class="btn btn-danger px-4">
                <i class="bi bi-box-arrow-right me-2"></i> LOGOUT
            </button>
        </form>
        </div>
    </div>
</div>

<div class="container py-5">
    <div class="row justify-content-center g-4">
        <div class="col-md-5">
            <a href="/informations" class="text-reset text-decoration-none">
                <div class="card text-center shadow-sm border-1 h-100">
                    <div class="card-body py-5">
                        <i class="bi bi-person-circle fs-1 mb-3"></i>
                        <h3 class="card-title">Mes Informations</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-5">
            <a href="/reservations" class="text-reset text-decoration-none">
                <div class="card text-center shadow-sm border-1 h-100">
                    <div class="card-body py-5">
                        <i class="bi bi-calendar-check fs-1 mb-3"></i>
                        <h3 class="card-title">Mes Réservations</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-5">
            <a href="/panier" class="text-reset text-decoration-none">
                <div class="card text-center shadow-sm border-1 h-100">
                    <div class="card-body py-5">
                        <i class="bi bi-cart fs-1 mb-3"></i>
                        <h3 class="card-title">Mon Panier</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-5">
            <div class="card text-center shadow-sm border-1">
                <div class="card-body py-5">
                    <i class="bi bi-life-preserver fs-1 mb-3"></i>
                    <h3 class="card-title">Assistance</h3>
                </div>
            </div>
        </div>
    </div>
</div>


@endauth

@endsection