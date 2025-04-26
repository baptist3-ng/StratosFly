@extends('template')

@section('title', 'StratosFly - Panier')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 bg-light">
            <div class="row justify-content-evenly">
                {{-- Partie Panier gauche --}}
                <div class="col-11 col-lg-9">
                    <div class="row shadow-lg align-items-center rounded-3 my-4 mx-4 mx-md-0">
                        <div class="col-2 col-sm-1 bg-dark text-center py-3 rounded-start px-2">
                            <i class="bi bi-info-circle text-light fs-3"></i>
                        </div>
                        <div class="col-10 col-sm-11">
                            <small>N'oubliez pas de personaliser vos billets ! Découvrez ci-dessous nos options</small>
                        </div>
                    </div>
                    <div class="row d-block d-lg-none">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary w-100 rounded-4 custom-color py-2"><small>Continuer la réservation</small></button>
                        </div>
                        <div class="col-12 text-center mt-3">
                            <small><a style="text-underline-offset: 0.3em;" class="text-dark" href="#">Continuer mes achats</a></small>
                        </div>
                    </div>
                    <div class="row my-lg-5 my-4 align-items-end">
                        <div class="col-6 fw-semibold fs-5">
                            Mon Panier <sup class="fw-normal">({{ $panier->vols->count() }})</sup>
                        </div>
                        <div class="col-6 text-end d-none d-lg-block">
                            <small><a style="text-underline-offset: 0.3em;" class="text-dark" href="/billets">Continuer mes achats</a></small>
                        </div>
                    </div>
                    @if (!$panier->vols->isEmpty())
                    {{-- Foreach --}}@foreach($panier->vols as $vol)
                    <div class="row mb-5">
                        <div class="col">
                            <div class="card border-0">
                                <div class="card-title py-2 mx-3 border-bottom">
                                {{ $vol->aeroportDepart->ville }} <i class="bi bi-arrow-left-right mx-2"></i> {{ $vol->aeroportArrivee->ville }}
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="fw-bold fs-5">Itinéraire</p>
                                            <p class="text-truncate"><i class="bi bi-arrow-up-right mx-2"></i><small>{{ $vol->aeroportDepart->nom }}</small></p>
                                            <p class="text-truncate"><i class="bi bi-arrow-down-right mx-2"></i><small>{{ $vol->aeroportArrivee->nom }}</small></p>
                                            <div class="row">
                                                <div class="col">
                                                <p class="fw-bold fs-5">Dates</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <p><i class="bi bi-calendar3 mx-2"></i>: <small>{{ \Carbon\Carbon::parse($vol->date_depart)->format('d/m/Y') }}</small> <i class="bi bi-clock ms-3 me-1"></i>: <small>{{ \Carbon\Carbon::parse($vol->date_depart)->format('H\hi') }}</small></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <p><i class="bi bi-calendar3 mx-2"></i>: <small>{{ \Carbon\Carbon::parse($vol->date_arrivee)->format('d/m/Y') }}</small> <i class="bi bi-clock ms-3 me-1"></i>: <small>{{ \Carbon\Carbon::parse($vol->date_arrivee)->format('H\hi') }}</small></p>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-12">
                                                    <p class="fw-bold fs-5">Billeterie</p>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <p><i class="bi bi-currency-exchange me-2"></i>{{$vol->prix}}€ </p>
                                                        </div>
                                                        <div class="col-8 text-end">
                                                            <small>(Tarif par personne)</small>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-9">
                                                            <p class="d-block d-sm-block d-lg-none d-xl-block"><i class="bi bi-ticket-fill me-2"></i>Places disponibles</p>
                                                            <p class="d-none d-lg-block d-xl-none"><i class="bi bi-ticket-fill me-2"></i>Places disp.</p>
                                                        </div>
                                                        <div class="col-3 text-end">
                                                            {{ $vol->nb_places }}
                                                        </div>
                                                    </div>
                                                    <div class="row g-1 mt-sm-5">
                                                        <div class="col-6 mt-sm-4 mt-3">
                                                            <button type="submit" class="btn border w-100 rounded-0 custom-color"><i class="bi bi-heart me-2"></i>Favoris</button>
                                                        </div>
                                                        <div class="col-6 mt-sm-4 mt-3">
                                                            <form action="{{ route('delete') }}" method="POST">
                                                            @csrf
                                                                <input type="hidden" name="panier_vol_id" value="{{ $vol->id }}">
                                                                <button type="submit" class="btn border w-100 rounded-0 border-danger text-danger"><i class="bi bi-x-circle me-2"></i>Retirer</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- FIN Foreach --}}@endforeach
                    @else
                    <div class="row">
                        <div class="col text-center">
                            <div class="card border-0">
                                <img src="images/panier_vide.avif" class="img-fluid d-block mx-auto mt-5" alt="" style="max-width: 350px;">
                                <div class="card-body fs-3 mt-5">
                                    <div class="row">
                                        <div class="col fst-italic">
                                            Votre panier est vide... et le monde vous attends !
                                        </div>
                                    </div>
                                    <div class="row justify-content-center my-3">
                                        <div class="col-12 col-md-6 col-lg-12 col-xl-8 col-xxl-6">
                                            <a href="/billets" class="btn border border-2 rounded-5 w-100 fs-5 mt-5">Découvrez nos offres <i class="bi bi-arrow-right-circle ms-5"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    
                </div>
                {{-- FIN Partie Panier gauche --}}
            </div>
        </div>
        <div class="col-lg-4 mb-5">
            <div class="row justify-content-evenly">
                <div class="col-11 col-lg-9">
                <div class="row mt-5 mb-2">
                        <div class="col-6">
                            Sous-total
                        </div>
                        <div class="col-6 text-end">
                            {{ $total }},00€
                        </div>
                    </div>
                    @foreach($panier->vols as $vol)
                    <div class="row justify-content-end">
                        <div class="col-9 col-lg-8">
                            <small>{{ $vol->aeroportDepart->ville }} <i class="bi bi-arrow-left-right mx-2"></i> {{ $vol->aeroportArrivee->ville }}</small>
                        </div>
                        <div class="col-3 text-end">
                            <small>{{ $vol->prix }},00€</small>
                        </div>
                    </div>
                    @endforeach
                    <div class="row mt-2">
                        <div class="col-6">
                            Baggages
                        </div>
                        <div class="col-6 text-end">
                            0,00€
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            Total
                        </div>
                        <div class="col-6 text-end">
                            {{ $total }},00€
                        </div>
                    </div>
                    <div class="row mt-3 border-bottom pb-4">
                        <div class="col-12">
                            @if ($panier->vols->isEmpty())
                                <button type="submit" disabled class="btn w-100 rounded-5 py-2"><small>Continuer la réservation</small></button>
                            @else
                                <a type="submit" href="/panier/infos" class="btn w-100 rounded-5 custom-color py-2"><small>Continuer la réservation</small></a>
                            @endif
                        </div>
                        <div class="col-12 mt-2">
                            <button type="submit" class="btn btn-primary w-100 rounded-5 fs-5 fw-bold"><i class="bi bi-paypal me-2"></i>PayPal</button>
                        </div>
                        
                    </div>
                    <div class="row mt-4 justify-content-between align-items-center">
                        <div class="col-1">
                            <i class="bi bi-credit-card fs-4"></i>
                        </div>
                        <div class="col-10 ps-4">
                            <h6>Paiement sécurisé</h6>
                            <small>Carte de crédit, Paypal et BTC.</small>
                        </div>
                        <div class="col-1 d-sm-block d-lg-none d-xl-block">
                            <i class="bi bi-chevron-right"></i>
                        </div>
                    </div>
                    <div class="row mt-4 justify-content-between align-items-center">
                        <div class="col-1">
                            <i class="bi bi-puzzle fs-4"></i>
                        </div>
                        <div class="col-10 ps-4">
                            <h6>Réservation Flexible</h6>
                            <small>Modifiez ou annulez votre vol sans frais jusqu'à 24 heures.</small>
                        </div>
                        <div class="col-1 d-sm-block d-lg-none d-xl-block">
                            <i class="bi bi-chevron-right"></i>
                        </div>
                    </div>
                    <div class="row mt-4 justify-content-between align-items-center">
                        <div class="col-1">
                            <i class="bi bi-at fs-4"></i>
                        </div>
                        <div class="col-10 ps-4">
                            <h6>Enregistrement en ligne</h6>
                            <small>Enregistrez-vous en ligne jusqu'à 24 heures avant le départ.</small>
                        </div>
                        <div class="col-1 d-sm-block d-lg-none d-xl-block">
                            <i class="bi bi-chevron-right"></i>
                        </div>
                    </div>
                    <div class="row mt-4 justify-content-between align-items-center">
                        <div class="col-1 ">
                            <i class="bi bi-headset fs-4"></i>
                        </div>
                        <div class="col-10 ps-4">
                            <h6>Service client</h6>
                            <small>Notre équipe est à votre disposition pour vous 24/7.</small>
                        </div>
                        <div class="col-1 d-sm-block d-lg-none d-xl-block">
                            <i class="bi bi-chevron-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection