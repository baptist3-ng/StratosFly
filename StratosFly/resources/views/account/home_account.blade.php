@extends('template')

@section('title', 'StratosFly - My Account')

@section('content')

@auth

<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 fs-1 ms-5 mt-3 fw-bold">
            Bienvenue M.{{ " " . $user->prenom . " " . $user->name}} 
        </div>
        <div class="col-md-1">
            <form action="{{ route('logout') }}" method="POST">
                @csrf

                @method("delete")
                <input type="submit" value="LOGOUT" class="btn btn-submit">
            </form>
        </div>

    </div>
</div>

<div class="container py-5">
    <div class="row justify-content-center g-4">
        <div class="col-md-5">
            <div class="card text-center shadow-sm border-1">
                <div class="card-body py-5">
                    <i class="bi bi-person-circle fs-1 mb-3"></i>
                    <h3 class="card-title">Mes Informations</h3>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card text-center shadow-sm border-1">
                <div class="card-body py-5">
                    <i class="bi bi-calendar-check fs-1 mb-3"></i>
                    <h3 class="card-title">Mes Réservations</h3>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card text-center shadow-sm border-1">
                <div class="card-body py-5">
                    <i class="bi bi-cart fs-1 mb-3"></i>
                    <h3 class="card-title"><a href="/panier" class="text-reset text-decoration-none">Mon Panier</a></h3>
                </div>
            </div>
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