@extends('template')

@section('title', 'StratosFly - Accueil')

@section('content')

<section style="background-image: url('/images/ai_avion.webp'); background-size: cover; background-position: center; background-repeat: no-repeat; witdh: 1512px; height:661px" class="pb-5">
    <div class="container py-5">
        <div class="row pt-5 my-2">
            <div class="col-sm-5 offset-sm-7 offset-6 col-6 text-light fs-1 text-center fst-italic fw-bold pt-5">"Travel far, with peace of mind."</div>
        </div>
    </div>
    <div class="container bg-secondary-subtle rounded-4 pb-3">
        <div class="row">
            <div class="col-lg-2 custom-color col-md-4 col-6 rounded-bottom-3 ps-4">
                Acheter un billet
            </div>
        </div>
        <div class="row">
            <form action="{{ route('vols.filter') }}" method="POST" class="d-lg-flex justify-content-evenly">
            @csrf    
                <div class="col-lg-2 py-lg-4 py-2 col-12">
                    <select id="trajet" name="trajet" class="p-lg-3 form-select ">
                        <option value="aller-retour" selected>Aller-Retour</option>
                        <option value="aller">Aller</option>
                        <option value="retour">Retour</option>
                    </select>
                </div>
                <div class="col-lg-3 py-lg-4 py-2 col-12">
                    <select id="depart" name="lieu-depart" class="p-lg-3 form-select text-truncate">
                        <option value="default" disabled selected>Départ de </option>
                        @foreach ($aeroports as $aeroport)
                        <option value="{{ $aeroport->id }}">{{ $aeroport->nom }}</option>
                        @endforeach   
                    </select>
                </div>
                <div class="col-lg-3 py-lg-4 py-2 col-12">
                    <select id="arrivee" name="lieu-arrivee" class="p-lg-3 form-select text-truncate">
                        <option value="default" disabled selected>Arrivée à </option>
                        @foreach ($aeroports as $aeroport)
                        <option value="{{ $aeroport->id }}">{{ $aeroport->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-2 py-lg-4 py-2 col-12">
                    <input type="submit" value="PARTIR" class="p-3 btn custom-color col-12">
                </div>
            </form>
        </div>
    </div>
    
</section>

<section class="bg-light py-5">
<div class="container">
    <div class="row py-5">
        <div class="fs-1 fw-bold text-center text-md-start ">
            Prêt pour votre prochaine aventure ?
        </div>
        <div class="d-none d-md-block divider-lg ms-3"></div>
    </div>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="/images/porto.webp" class="card-img-top" alt="Portugal">
                    <div class="card-body">
                        <h5 class="card-title">Porto dès 59€* par personne !</h5>
                        <p class="card-text">(*)Tarif par personne, hors taxes et frais. Offre soumise à conditions, voir détails sur notre site. Tarif applicable sur certaines dates et destinations uniquement.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="/images/budapest-la-nuit.webp" class="card-img-top" alt="Budapest">
                    <div class="card-body">
                        <h5 class="card-title">Budapest dès 75€* par personne !</h5>
                        <p class="card-text">(*)Tarif par personne, hors taxes et frais. Offre soumise à conditions, voir détails sur notre site. Tarif applicable sur certaines dates et destinations uniquement.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="/images/chili.jpg" class="card-img-top" alt="Chili">
                    <div class="card-body">
                        <h5 class="card-title">Le Chili dès 395€* par personne !</h5>
                        <p class="card-text">(*)Tarif par personne, hors taxes et frais. Offre soumise à conditions, voir détails sur notre site. Tarif applicable sur certaines dates et destinations uniquement.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
     <div class="container-fluid custom-color py-5">
        <div class="row d-flex justify-content-evenly align-items-center">
            <div class="col-lg-5 fs-1 fw-bold text-center py-5">
                Pourquoi choisir StratosFly ?
            </div>
            <div class="col-lg-5 fw-bold py-5 text-center fs-5">
                <div>- Tarifs attractifs et transparents : Profitez de prix compétitifs sans frais cachés.</div>
                <div>- Service clientèle 24/7 : Toujours à votre écoute pour répondre à vos besoins.</div>
                <div>- Confort et sécurité : Une flotte moderne pour un voyage agréable et sécurisé.</div>
                <div>- Fidélité récompensée : Cumulez des points et bénéficiez d'avantages exclusifs.</div>
                <div>- Réservation facile : Réservez en quelques clics, où que vous soyez.</div>
            </div>
        </div>
     </div>
</section>

<section>
    <div class="container my-5">
    <h2 class="fw-bold">Vos avis sont importants</h2>
    <div class="divider"></div>

    <div class="row g-4 mt-4">
        <!-- Note moyenne -->
        <div class="col-md-4">
            <div class="card-custom py-4">
                <div class="rating fs-4">★★★★★</div>
                <p class="fw-bold fs-4 mt-2">4,3/5</p>
                <p class="text-muted"><em>Note moyenne sur +22k avis</em></p>
            </div>
        </div>

        <!-- Avis 1 -->
        <div class="col-md-4">
            <div class="card-custom py-4">
                <div class="rating">★★★★☆</div>
                <p class="fw-bold mt-2">Gilbert</p>
                <p class="text-muted">Publié le 19/03/25</p>
                <p>“Très bon rapport qualité/prix.”</p>
            </div>
        </div>

        <!-- Avis 2 -->
        <div class="col-md-4">
            <div class="card-custom py-4">
                <div class="rating">★★★★★</div>
                <p class="fw-bold mt-2">Sophie</p>
                <p class="text-muted">Publié le 22/01/25</p>
                <p>“Excellent.”</p>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <a href="#" class="text-dark text-decoration-none fw-semibold">Découvrir tous les avis &rarr;</a>
    </div>
</div>
</section>


@endsection