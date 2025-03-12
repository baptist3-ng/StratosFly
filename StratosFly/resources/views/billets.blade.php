@extends('template')

@section('title', 'StratosFly - Billeterie')

@section('content')

<section>
    <div style="background-image: url('/images/gens.png'); background-size: cover; background-position: center; background-repeat: no-repeat; witdh: 1512px; height:444px"></div>
</section>

<section class="p-3 ">
    <div class="container">
        <div class="row py-5">
            <div class="col-md-12">
                <h1 class="fw-bold">Trouvez le vol idéal selon vos critères !</h1>
                <div class="divider-lg"></div>
            </div>
        </div>
    </div>

    <div class="container border border-3 rounded-4 bg-light pb-4">
        <div class="row justify-content-center">
            <form class="row gy-3 gx-3 justify-content-evenly align-items-center">
                <!-- Date de départ -->
                <div class="col-md-3 pb-sm-0 pb-2">
                    <div class="position-relative">
                        <div class="custom-color text-white rounded-top ps-3 py-1 w-100">Départ</div>
                        <div class="border rounded-3 p-2">
                            <label for="date-depart" class="d-block small text-muted">Date</label>
                            <input type="date" id="date-depart" name="date-depart" class="form-control border-0">
                        </div>
                    </div>
                </div>

                <!-- Date d'arrivée -->
                <div class="col-md-3 pb-sm-0 pb-2">
                    <div class="position-relative">
                        <div class="custom-color text-white rounded-top px-3 py-1 w-100">Arrivée</div>
                        <div class="border rounded-3 p-2">
                            <label for="date-arrivee" class="d-block small text-muted">Date</label>
                            <input type="date" id="date-arrivee" name="date-arrivee" class="form-control border-0">
                        </div>
                    </div>
                </div>

                <!-- Prix -->
                <div class="col-md-3 pb-sm-0 pb-2">
                    <div class="position-relative">
                        <div class="custom-color text-white rounded-top px-3 py-1 w-100">Prix</div>
                        <div class="border rounded-3 p-2">
                            <label for="prix" class="d-block small text-muted">Min-Max</label>
                            <select id="prix" name="prix" class="form-select border-0">
                                <option value="50-100" selected>50 - 100€</option>
                                <option value="100-200">100 - 200€</option>
                                <option value="200-300">200 - 300€</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Ligne de séparation -->
                <hr class="d-none d-md-block mt-4 mb-3 border-dark w-100">

                <!-- Deuxième ligne (lieu de départ, lieu d'arrivée) -->
                <div class="col-md-5 pb-sm-0 pb-2">
                    <div class="position-relative">
                        <div class="custom-color text-white rounded-top px-3 py-1 w-100">Lieu de départ</div>
                        <div class="border rounded-3 p-2">
                            <label for="a-depart" class="d-block small text-muted">Aéroport</label>
                            <select name="lieu-depart" class="form-select border-0 rounded-3 p-2" id="a-depart">
                                <option value="a-depart-1">Aéroport Francisco Sá Carneiro, Portugal.</option>
                                <option value="a-depart-2">Aéroport international de Budapest Ferenc Liszt, Hongrie.</option>
                                <option value="a-depart-3">Aéroport Roissy Charles de Gaulle, France.</option>
                                <option value="a-depart-4">Aéroport international de Santiago du Chili, Chili.</option>  
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 pb-sm-0 pb-2">
                    <div class="position-relative">
                        <div class="custom-color text-white rounded-top px-3 py-1 w-100">Lieu d'arrivée</div>
                        <div class="border rounded-3 p-2">
                            <label for="a-arrivee" class="d-block small text-muted">Aéroport</label>
                            <select name="lieu-arrivee" class="form-select border-0 rounded-3 p-2" id="a-arrivee">
                                <option value="a-arrivee-1">Aéroport Francisco Sá Carneiro, Portugal.</option>
                                <option value="a-arrivee-2">Aéroport international de Budapest Ferenc Liszt, Hongrie.</option>
                                <option value="a-arrivee-3" selected>Aéroport Roissy Charles de Gaulle, France.</option>
                                <option value="a-arrivee-4">Aéroport international de Santiago du Chili, Chili.</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Ligne de séparation -->
                <hr class="d-none d-md-block mt-4 mb-3 border-dark w-100">

                <!-- Bouton rechercher -->
                <div class="col-md-3 mt-3 pb-sm-0 pb-2">
                    <button type="submit" class="btn custom-color w-100 py-2 py-sm-3 fs-3">Rechercher</button>
                </div>
            </form>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row py-5">
            <div class="col-md-6">
                <h1 class="fw-bold">Vols disponibles</h1>
                <div class="divider-lg"></div>
            </div>
        </div>
    </div>
</section>


@endsection