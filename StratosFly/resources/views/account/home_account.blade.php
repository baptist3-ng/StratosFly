@extends('template')

@section('title', 'StratosFly - My Account')

@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 fs-1 ms-5 mt-3 fw-bold">
            Bienvenue M.
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
                    <h3 class="card-title">Mon Panier</h3>
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




@endsection