@extends('template')

@section('title', 'Liste des réservations')

@section('content')
<div class="container-fluid">
<a href="{{ route('admin.adminAction') }}" class="btn btn-secondary mb-3">Retour à l'administration</a>
    <h2 class="mb-4">Liste des réservations</h2>

    @foreach($reservations as $reservation)
        <div class="card mb-3">
            <div class="card-header">
                Réservation #{{ $reservation->id }} — Vol ID : {{ $reservation->vol_id }} — Email : {{ $reservation->email }}
            </div>
            <div class="card-body">
                <p>Nombre de passagers : {{ $reservation->nb_passagers }}</p>
                <h5>Passagers :</h5>
                <ul>
                    @foreach($reservation->passagers as $passager)
                        <li>{{ $passager->prenom }} {{ $passager->nom }} — {{ $passager->email }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endforeach
</div>
@endsection