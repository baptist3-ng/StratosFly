@extends('template')

@section('title', 'StratosFly - Réservation')

@section('content')

<div class="container-fluid">
    <div class="row bg-light py-4">
        <div class="col-1 offset-1">
            <a href="/account" class="text-dark"><i class="bi bi-arrow-left fs-5"></i></a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 bg-light">
            <div class="row justify-content-evenly">
                {{-- Partie Panier gauche --}}
                <div class="col-11 col-lg-9">
                    <div class="row bg-white opacity-75">
                        <div class="col-12 fs-2 py-3">
                            <i class="bi bi-1-circle fs-2 me-3 ms-4"></i>Informations
                        </div>
                    </div>  
                    <div class="row bg-white mt-3 opacity-75">
                        <div class="col-12 fs-2 py-3">
                            <i class="bi bi-2-circle fs-2 me-3 ms-4"></i>Passagers
                        </div>
                    </div>  
                    <div class="row mt-3 bg-white opacity-75">
                        <div class="col-12 fs-2 py-3">
                            <i class="bi bi-3-circle fs-2 me-3 ms-4"></i>Paiement
                        </div>
                    </div>
                    <div class="row mt-3 mb-5 bg-white">
                        <div class="col-12 py-3">
                            <div class="row">
                                <div class="col-12 border-bottom fs-2 py-3 mb-4">
                                    <i class="bi bi-4-circle-fill fs-2 me-3 ms-4"></i>Confirmation
                                </div>
                            </div>
                            <div class="row justify-content-evenly">
                                <div class="col-10 text-center">
                                    Votre réservation a bien été prise en compte.
                                </div>
                            </div>
                            <div class="row justify-content-evenly mt-3">
                                <div class="col-11 fs-4">
                                    Récapitulatif
                                </div>
                            </div>
                            
                            @foreach($reservations as $reservation)
                                @php
                                    $details = $details_vols[$reservation['vol_id']];
                                @endphp
                                <div class="row justify-content-evenly my-3 fs-5">
                                    <div class="col-11 bg-light py-2">
                                    {{ $details['vol']->aeroportDepart->ville }} ➔ {{ $details['vol']->aeroportArrivee->ville }}
                                    </div>
                                </div>
                                <div class="row mt-3 justify-content-evenly">
                                    <div class="col-10">
                                        ID réservation : {{ $reservation['id_random'] }}
                                    </div>
                                </div>
                                <div class="row mt-3 justify-content-evenly">
                                    <div class="col-10">
                                        Nombres de billets : {{ $reservation['nb_passagers'] }}
                                    </div>
                                </div>
                                <div class="row mt-3 justify-content-evenly">
                                    <div class="col-10">
                                        Passagers :
                                    </div>
                                </div>
                                <div class="row justify-content-evenly">
                                    <div class="col-8">
                                    <ul class="list-group list-group-flush">
                                        @foreach($reservation['passagers'] as $passager)
                                            <li>
                                            <small>{{ $passager['genre'] }}</small> {{ $passager['prenom'] }} {{ $passager['nom'] }} 
                                            </li>
                                        @endforeach
                                    </ul>
                                    </div>
                                </div>
                            @endforeach
                            
                        </div>
                    </div>

                </div>
                {{-- FIN Partie Panier gauche --}}
            </div>
        </div>
        <div class="col-lg-4 mb-5">
            <div class="row justify-content-evenly">
                <div class="col-11 col-lg-9">
                    <div class="row mt-3 mb-2">
                        <div class="col-6">
                            Sous-total
                        </div>
                        <div class="col-6 text-end">
                            {{ $prix_hors_baggages }},00€
                        </div>
                    </div>
                    @foreach($details_vols as $vol_id => $details)
                    @php $vol = $details['vol']; @endphp
                    <div class="row justify-content-end">
                        <div class="col-9 col-lg-8">
                            <small>{{ $vol->aeroportDepart->ville }} <i class="bi bi-arrow-left-right mx-2"></i> {{ $vol->aeroportArrivee->ville }}</small>
                        </div>
                        <div class="col-3 text-end">
                            <small>{{ $vol->prix * $details['nb_billets'] }},00€</small>
                        </div>
                    </div>
                    @endforeach
                    <div class="row mt-3 mb-2">
                        <div class="col-6">
                            Baggages
                        </div>
                        <div class="col-6 text-end">
                            {{ $prix_baggages }},00€
                        </div>
                    </div>
                    @foreach($details_vols as $vol_id => $details)
                    @if ($details['nb_baggages'] > 0)
                    @php $vol = $details['vol']; @endphp
                    <div class="row justify-content-end">
                        <div class="col-9 col-lg-8">
                            <small>{{ $vol->aeroportDepart->ville }} <i class="bi bi-arrow-left-right mx-2"></i> {{ $vol->aeroportArrivee->ville }}</small>
                        </div>
                        <div class="col-3 text-end">
                            <small>{{ $details['nb_baggages'] * 35 }},00€</small>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    <div class="row mt-3">
                        <div class="col-6">
                            Total
                        </div>
                        <div class="col-6 text-end">
                            {{ $total }},00€
                        </div>
                    </div>
                    <div class="row mt-4 border-bottom pb-4">
                        <div class="col-12">
                        <button type="submit" class="btn w-100 rounded-5 border border-1 py-2"><small>Payé</small></button>
                        </div>
                        <div class="col-12 mt-2">
                            <button type="button" class="btn btn-primary w-100 rounded-5 fs-5 fw-bold"><i class="bi bi-paypal me-2"></i>PayPal</button>
                        </div>
                        </form>
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