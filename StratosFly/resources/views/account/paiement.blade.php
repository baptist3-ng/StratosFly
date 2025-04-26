@extends('template')

@section('title', 'StratosFly - Réservation')

@section('content')

<div class="container-fluid">
    <div class="row bg-light py-4">
        <div class="col-1 offset-1">
            <a href="/panier/passagers" class="text-dark"><i class="bi bi-arrow-left fs-5"></i></a>
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
                    <div class="row mt-3 bg-white">
                        <div class="col-12 py-3">
                            <div class="row ">
                                <div class="col-12 border-bottom fs-2 py-3 mb-4">
                                    <i class="bi bi-3-circle-fill fs-2 me-3 ms-4"></i>Paiement
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-8">
                                    <div class="row">
                                        <div class="ms-3 col-12 fs-5">
                                        <i class="bi bi-person-fill me-2"></i>Titulaire
                                        </div>
                                    </div>
                                    <form action="{{ route('sendPayment') }}" method="POST">
                                        @csrf
                                    <div class="row mt-3">
                                       <div class="col-5 offset-1">
                                            <label for="nom" class="form-label"><small>Nom</small></label>
                                            <input name="nom" required id="nom" type="text" class="form-control">
                                       </div>
                                       <div class="col-5">
                                            <label for="prenom" class="form-label"><small>Prénom</small></label>
                                            <input name="prenom" required id="prenom" type="text" class="form-control">
                                       </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-10 offset-1">
                                            <label for="mail" class="form-label"><small>Email</small></label>
                                            <input name="email" required id="mail" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="ms-3 fs-5 col-12">
                                            <i class="bi bi-credit-card me-2"></i>Carte de crédit
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-10 offset-1">
                                            <label for="chiffres" class="form-label"><small>Numéro carte bancaire</small></label>
                                            <input name="chiffres" required id="chiffres" type="text" class="form-control" placeholder="4974 6857 ...">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                       <div class="col-5 offset-1">
                                            <label for="date" class="form-label"><small>Date d'expiration</small></label>
                                            <input name="date" required id="date" type="text" class="form-control" placeholder="05/27">
                                       </div>
                                       <div class="col-5">
                                            <label for="cvv" class="form-label"><small>CVV</small></label>
                                            <input name="cvv" required id="cvv" type="text" class="form-control" placeholder="121">
                                       </div>
                                    </div>
                                    <div class="row mt-4 justify-content-evenly">
                                        <div class="col-10 text-muted text-center">
                                            <i class="bi bi-lock-fill me-2"></i><small>Secure payment processing.</small>
                                        </div>
                                    </div>
                                    <div class="row my-2 justify-content-evenly">
                                        <div class="col-10">
                                            <button type="submit" class="btn custom-color rounded-3 w-100">Procéder au paiement</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="row mt-4">
                                        <div class="ms-3 col-12 ms-sm-0 col-sm-12 offset-sm-0 fs-5">
                                            <i class="bi bi-bell-fill me-2"></i>Nouveau !
                                        </div>
                                    </div>
                                    <div class="row mt-3 justify-content-evenly">
                                        <div class="ms-3 col-11 ms-sm-0  col-sm-11 offset-sm-0 border-bottom"></div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-10 offset-1 col-sm-12 offset-sm-0 fst-italic fw-bold">
                                            Pay in 2, 3, or 4 with
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-10 offset-1 col-sm-12 offset-sm-0 mt-2">
                                            <button type="button" class="btn btn-primary w-100 rounded-5 fs-5 fw-bold"><i class="bi bi-paypal me-2"></i>PayPal</button>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-10 offset-1 col-sm-12 offset-sm-0 fw-bold">
                                            We accept crypto !
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-10 offset-1 col-sm-12 offset-sm-0 mt-2">
                                            <button type="button" class="btn btn-orange w-100 rounded-5 fs-5 fw-bold text-white"><i class="bi bi-currency-bitcoin me-2"></i>Bitcoin</button>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-10 offset-1 col-sm-12 offset-sm-0 mt-2">
                                            <button type="button" class="btn border border-2 w-100 rounded-5 fs-5 fw-bold d-flex align-items-center justify-content-center">
                                                <svg width="20px" height="20px" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid"><path d="M127.998 0C57.318 0 0 57.317 0 127.999c0 14.127 2.29 27.716 6.518 40.43H44.8V60.733l83.2 83.2 83.198-83.2v107.695h38.282c4.231-12.714 6.521-26.303 6.521-40.43C256 57.314 198.681 0 127.998 0" fill="#F60"/><path d="M108.867 163.062l-36.31-36.311v67.765H18.623c22.47 36.863 63.051 61.48 109.373 61.48s86.907-24.617 109.374-61.48h-53.933V126.75l-36.31 36.31-19.13 19.129-19.128-19.128h-.002z" fill="#4C4C4C"/></svg>
                                                <span class="ms-2">Monero</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3 mb-5 bg-white opacity-75">
                        <div class="col-12 fs-2 py-3">
                            <i class="bi bi-4-circle fs-2 me-3 ms-4"></i>Confirmation
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
                            @if ($panier->vols->isEmpty())
                                <button type="submit" disabled class="btn w-100 rounded-5 py-2"><small>Continuer la réservation</small></button>
                            @else
                                <button type="submit" class="btn w-100 rounded-5 custom-color py-2"><small>Procéder au paiement</small></button>
                            @endif
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