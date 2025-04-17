@extends('template')

@section('title', 'StratosFly - Reserver')

@section('content')


<div class="container">
    <div class="row text-center fs-5 rounded-4 align-items-center bg-light mt-md-4">
        <div class="col-3 custom-color py-3 rounded-4">
            Panier
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
        <div class="col-3">
            Confirmation
        </div>
    </div>
</div>





<div class="container-fluid my-5">
@if (session('failAdd'))
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-4">
                <div class="alert alert-warning text-center" role="alert">
                    {{ session('failAdd') }}
                </div>
            </div>
        </div>
    </div>
@endif
@if (session('successAdd'))
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-4">
                <div class="alert alert-success text-center" role="alert">
                    {{ session('successAdd') }}
                </div>
            </div>
        </div>
    </div>
@endif
@if (session('successDel'))
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-4">
                <div class="alert alert-warning text-center" role="alert">
                    {{ session('successDel') }}
                </div>
            </div>
        </div>
    </div>
@endif
    <div class="row">
        <div class="col-md-5 ms-md-5 mb-4">
            <p class="fs-1 fw-semibold"><i class="bi bi-basket2-fill"></i> Votre panier : </p>
            <div class="d-none d-md-block divider-lg custom-color"></div>
        </div>
        @if($panier->vols->isEmpty())
        <div class="col-md-6 d-flex justify-content-end align-items-center mb-4">
            <a href="/billets" class=" me-4 btn btn-lg custom-color  border py-3 px-4 d-inline-flex align-items-center" role="button">
                <i class="bi bi-plus-circle me-2"></i>Ajouter un vol
            </a>
            <a href="/reservation" class="disabled btn  btn-lg py-3 px-4 d-inline-flex align-items-center" role="button">
                <span class="fw-bold">Continuer</span><i class="bi bi-arrow-right-circle ms-2"></i>
            </a>
        </div>
        @else
        <div class="col-md-6 d-flex justify-content-end align-items-center mb-4">
            <a href="/billets" class=" me-4 btn btn-lg  border py-3 px-4 d-inline-flex align-items-center" role="button">
                <i class="bi bi-plus-circle me-2"></i>Ajouter un vol
            </a>
            <a href="/reservation" class="btn custom-color btn-lg py-3 px-4 d-inline-flex align-items-center" role="button">
                <span class="fw-bold">Continuer</span><i class="bi bi-arrow-right-circle ms-2"></i>
            </a>
        </div>
        @endif
    </div>
    

        @if($panier->vols->isEmpty())
            <div class="container">
                <div class="row justify-content-center mt-md-4">
                    <div class="col-md-10 alert alert-warning text-center ">
                        <span class="fs-3"><i class="bi bi-bag-x me-md-4"></i> Votre panier est vide !</span>
                    </div>
                </div>
            </div>
            <!-- Bannière Promo -->

        @else
        <!-- Pour chaque vol du panier  -->
        @foreach ($panier->vols as $vol)
        <div class="row justify-content-center mb-5">
            <div class="col-md-10 border border-1 bg-body-tertiary rounded-3">
                <div class="row mt-3 ms-1">
                    <div class="col-md-6 fs-1">
                        <p>{{ $vol->aeroportDepart->ville }} <i class="bi bi-arrow-right"></i> {{ $vol->aeroportArrivee->ville }}</p>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <form action="{{ route('delete') }}" method="POST">
                        @csrf
                            <input type="hidden" name="panier_vol_id" value="{{ $vol->id }}">
                            <button type="submit" class="btn btn-danger border border-1 px-2 mt-md-3 me-md-4" aria-label="Supprimer le vol">
                                <i class="bi bi-x-lg me-2"></i>Supprimer
                            </button>
                        </form>
                    </div>
                </div>
                <div class="row ms-1 mb-2">
                    <div class="col-md-6 fs-2">
                        <p><i class="bi bi-info-circle"></i> Informations</p>
                    </div>
                </div>
                <div class="row justify-content-evenly mb-5">
                    <div class="col-md-5 card">
                        <div class="card-title fs-3 mt-3 mb-0"><i class="bi bi-airplane-fill me-2"></i>Aéroports</div>
                        <div class="card-body">
                            <p><strong><i class="bi bi-geo-alt me-1"></i>Départ : </strong>{{ $vol->aeroportDepart->nom }}</p>
                            <p><strong><i class="bi bi-geo-alt me-1"></i>Arrivée :</strong> {{ $vol->aeroportArrivee->nom }}</p>
                        </div>
                    </div>
                    <div class="col-md-3 card my-3 my-md-0">
                        <div class="card-title mt-md-3 mb-md-0"><i class="bi bi-calendar3 me-2"></i> Dates</div>
                        <div class="card-body ">
                            <p>
                                <strong>Départ le </strong> {{ \Carbon\Carbon::parse($vol->date_depart)->format('d/m/Y') }} à 
                                {{ \Carbon\Carbon::parse($vol->date_depart)->format('H\hi') }}
                            </p>
                            <p>
                                <strong>Arrivée le  </strong> {{ \Carbon\Carbon::parse($vol->date_arrivee)->format('d/m/Y') }} à 
                                {{ \Carbon\Carbon::parse($vol->date_arrivee)->format('H\hi') }}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3 card">
                        <div class="card-title mt-3 mb-0"><i class="bi bi-currency-exchange me-2"></i> Prix </div>
                        <div class="card-body">
                            <p><strong>Prix du billet :</strong> {{$vol->prix}}€*</p>
                            <p><strong>Places disponibles :</strong> {{ $vol->nb_places }}.</p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        @endforeach

    @endif


</div>


@endsection