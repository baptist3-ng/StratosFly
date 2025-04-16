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
        <div class="col-3 custom-color py-3 rounded-4">
            Confirmation
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <p>Merci d'avoir réserver avec StratosFly.</p>
    </div>
    <div class="row">
        <p>Résumé de votre réservation :</p>
    </div>
    @foreach ($reservations as $reservation)
    <p>Id: {{ $reservation->id_random }}</p>
    <p>Email: {{ $reservation->email }}</p>
    <p>Vol: {{ $reservation->vol->aeroportDepart->ville }}->{{ $reservation->vol->aeroportArrivee->ville }}</p>
    <p>Nombre de passagers: {{ $reservation->nb_passagers }}</p>
    <p>Liste des passagers:</p>
    @foreach ($reservation->passager as $passager)
        <p>{{ $passager->nom }}</p>
        <p>{{ $passager->prenom }}</p>
    @endforeach
    
    @endforeach
</div>


@endsection