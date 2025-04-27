@extends('template')

@section('title', 'StratosFly - Réservation')

@section('content')


<div class="container-fluid">
    <div class="row bg-light py-4">
        <div class="col-1 offset-1">
            <a href="/panier" class="text-dark"><i class="bi bi-arrow-left fs-5"></i></a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 bg-light">
            <div class="row justify-content-evenly">
                {{-- Partie Panier gauche --}}
                <div class="col-11 col-lg-9">
                    <div class="row bg-white">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 border-bottom fs-2 py-3 mb-4">
                                    <i class="bi bi-1-circle-fill fs-2 me-3 ms-4"></i>Informations
                                </div>
                            </div>
                            <form action="{{ route('sendInfos') }}" method="POST">
                            @csrf
                            {{-- Foreach --}}@foreach($panier->vols as $vol)
                            <input type="hidden" name="vols_ids[]" value="{{ $vol->id }}"> <!-- récupérer les vols -->  
                            <div class="row mt-1">
                                <div class="col-12">
                                    <div class="row justify-content-evenly">
                                        <div class="col-11 fs-5 fw-semibold">
                                            {{ $vol->aeroportDepart->ville }} <i class="bi bi-arrow-left-right mx-2"></i> {{ $vol->aeroportArrivee->ville }}
                                        </div>
                                    </div>
                                    <div class="row justify-content-evenly mt-3">
                                        <div class="col-10">
                                            <div class="row justify-content-between align-items-end">
                                                <div class="col-5">
                                                <i class="bi bi-ticket-detailed me-2"></i>Billets
                                                </div>
                                                <div class="col-4 col-sm-3 col-md-2 col-lg-3 col-xl-2">
                                                    <select name="{{$vol->id}}_nb_billets" class="form-select py-1">
                                                        @for ($i = 1; $i <= min(5,$vol->nb_places); $i++)
                                                        <option value="{{$i}}">{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-evenly mt-3">
                                        <div class="col-10">
                                            <div class="row justify-content-between align-items-center">
                                                <div class="col-5">
                                                <i class="bi bi-suitcase me-2"></i>Baggages
                                                </div>
                                                <div class="col-4 col-sm-3 col-md-2 col-lg-3 col-xl-2">
                                                    <select name="{{$vol->id}}_nb_baggages" class="form-select py-1">
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-evenly my-4">
                                        <div class="col-11 border-bottom">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- FIN Foreach --}}@endforeach
                            <div class="row justify-content-end mb-4">
                                <div class="col-12 col-sm-4">
                                    <button type="submit" class="btn w-100 rounded-5 btn-custom-color py-2"><small>Continuer</small></button>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row mt-4 bg-white opacity-75">
                        <div class="col-12 fs-2 py-3">
                            <i class="bi bi-2-circle fs-2 me-3 ms-4"></i>Passagers
                        </div>
                    </div>
                    <div class="row mt-3 bg-white opacity-75">
                        <div class="col-12 fs-2 py-3">
                            <i class="bi bi-3-circle fs-2 me-3 ms-4"></i>Paiement
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
                    <div class="row mt-3">
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
                    <div class="row mt-4 border-bottom pb-4">
                        <div class="col-12">
                            @if ($panier->vols->isEmpty())
                                <button type="submit" disabled class="btn w-100 rounded-5 py-2"><small>Continuer la réservation</small></button>
                            @else
                                <button type="submit" class="btn w-100 rounded-5 btn-custom-color py-2"><small>Continuer la réservation</small></button>
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