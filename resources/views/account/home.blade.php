@extends('template')

@section('title', 'StratosFly - Mon compte')

@section('content')

@auth

<div class="container-fluid">
    <div class="row justify-content-between">
        <div class="col-sm-5 fs-1 ms-md-5 mt-3 fw-bold text-center">
            Bienvenue {{ " " . $user->genre . ". " . $user->name }} 
        </div>
        <div class="col-sm-3 mt-4 ms-md-5">
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
                    <div class="card-body py-5 p-4">
                        <i class="bi bi-person-circle fs-1 mb-3"></i>
                        <h3 class="card-title fw-bold fs-4">Mes Informations</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-5">
            <a href="/reservations" class="text-reset text-decoration-none">
                <div class="card text-center shadow-sm border-1 h-100">
                    <div class="card-body py-5 p-4">
                        <i class="bi bi-calendar-check fs-1 mb-3"></i>
                        <h3 class="card-title fw-bold fs-4">Mes Réservations</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-5">
            <a href="/panier" class="text-reset text-decoration-none">
                <div class="card text-center shadow-sm border-1 h-100">
                    <div class="card-body py-5 p-4">
                        <i class="bi bi-cart fs-1 mb-3"></i>
                        <h3 class="card-title fw-bold fs-4">Mon Panier</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-5">
            <div class="card text-center shadow-sm border-1">
                <div class="card-body py-5 p-4">
                    <i class="bi bi-life-preserver fs-1 mb-3"></i>
                    <h3 class="card-title fw-bold fs-4">Assistance</h3>
                </div>
            </div>
        </div>
    </div>
</div>


@endauth

@endsection