@extends('template')

@section('title', 'StratosFly - Liste des réservations')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-end mt-4">
        <div class="col-md-3 text-center">
            <a href="{{ route('admin.admin') }}" class="btn btn-secondary my-3 btn-custom-color fs-5 px-4 py-3"><i class="bi bi-arrow-left-circle me-2"></i>Retour à l'administration</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <p class="fs-2 fw-bold"><i class="bi bi-list-ul me-2"></i>Liste des réservations</p>
        </div>
    </div>

    @if ($reservations->isEmpty())
        <div class="row border border-3 border-danger rounded-4 bg-light py-5 mb-5">
            <div class="col text-center">
                <div class="text-danger fs-5">Aucunes réservations.</div>
            </div>
        </div>
    @else
    @foreach($reservations as $reservation)
        <div class="card my-3">
            <div class="card-header fw-bold fs-5">
                Réservation #{{ $reservation->id }} — Vol ID : {{ $reservation->vol_id }} — Email : {{ $reservation->email }}
            </div>
            <div class="card-body p-4">
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
    @endif
</div>
@endsection