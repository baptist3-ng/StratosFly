@extends('template')

@section('title', 'StratosFly - Confirmation')

@section('content')


<div class="container">
    <div class="row text-center fs-5 rounded-4 align-items-center bg-light mt-md-4">
        <div class="col-3">
            <a href="/panier" class="text-reset text-decoration-none">Panier</a>
        </div>
        <div class="col-1">
            >>>
        </div>
        <div class="col-3">
            Voyageurs
        </div>
        <div class="col-1">
            >>>
        </div>
        <div class="col-4 custom-color py-3 rounded-4">
            Confirmation
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center mt-md-5 mb-md-4 fs-1">
            <p class="text-primary">Merci d'avoir réserver avec StratosFly !</p>
        </div>
    </div>
    <div class="row mt-2 mb-md-5">
        <div class="col-md-6 ms-md-5">
        <p class="fs-1 fw-semibold"><i class="bi bi-card-text me-2"></i> Détails réservation :</p>
        <div class="d-none d-md-block divider-lg custom-color"></div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center mb-md-5">
        @foreach ($reservations as $reservation)
        <div class="row bg-light mb-5 border">
            <div class="col-md-6">
                <div class="row pt-3 mb-3 mt-2">
                    <p class="fs-3"><i class="bi bi-airplane-fill me-2"></i><strong>Vol</strong> : {{ $reservation->vol->aeroportDepart->ville }}<i class="bi bi-arrow-right mx-2"></i>{{ $reservation->vol->aeroportArrivee->ville }}</p>
                </div>
                <div class="row ms-2">
                    <p><strong>ID réservation</strong> : {{ $reservation->id_random }}</p>
                </div>
                <div class="row ms-2">
                    <p><strong>Email</strong> : {{ $reservation->email }}</p>
                </div>
                <div class="row ms-2">
                    <p><strong>Prix du billet</strong> : {{$reservation->vol->prix}}€</p>
                </div>
                <div class="row ms-2">
                    <p><strong>Prix total TTC</strong>: {{$reservation->vol->prix * $reservation->nb_passagers}}€</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row mb-3 mt-2">
                    <p class="fs-3 pt-3"><i class="bi bi-people-fill me-2"></i>Voyageurs :</p>
                </div>
                <div class="row ms-2">
                    <p><strong>Nombre de passagers</strong> : {{ $reservation->nb_passagers }}</p>
                </div>
                <div class="row ms-2">
                    <p><strong>Liste des passagers</strong>:</p>
                    <ul class="ms-3">
                        @foreach ($reservation->passagers as $passager)
                        <li>{{ $passager->genre }}. {{ $passager->nom }}, {{ $passager->prenom }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>



@endsection
