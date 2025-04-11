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
            <form class="row gy-3 gx-3 justify-content-evenly align-items-center" action="{{ route('vols.filter') }}" method="POST">
                @csrf
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
                            <label for="prix" class="d-block small text-muted">Max (€)</label>
                            <input id="prix" type="text" name="prix" class="form-control border-0" placeholder="250">
                            @error('prix')
                            <div  class="invalid-feedback d-block position-absolute mt-2">
                                {{ $message }}
                            </div>
                            @enderror
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
                            <label for="lieu-depart" class="d-block small text-muted">Aéroport</label>
                            <select name="lieu-depart" class="form-select border-0 rounded-3 p-2" id="a-depart">
                                <option value="" selected>Départ de </option>
                                @foreach ($aeroports as $aeroport)
                                    <option value="{{ $aeroport->id }}">{{ $aeroport->nom }}</option>
                                @endforeach 
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
                                <option value="" selected>Arrivée à </option>
                                @foreach ($aeroports as $aeroport)
                                    <option value="{{ $aeroport->id }}">{{ $aeroport->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Ligne de séparation -->
                <hr class="d-none d-md-block mt-4 mb-3 border-dark w-100">

                <!-- Bouton rechercher -->
                <div class="col-md-3 mt-3 pb-sm-0 pb-2"  id="billets">
                    <button type="submit" class="btn custom-color w-100 py-2 py-sm-3 fs-3">Rechercher</button>
                </div>
            </form>
        </div>
    </div>
</section>

<section class="mb-5">
    <div class="container">
        <div class="row py-5">
            <div class="col-md-6">
                <h1 class="fw-bold">Vols disponibles : {{ $vols->count() }}</h1>
                <div class="divider-lg"></div>
            </div>
        </div>
    @if ($vols->isEmpty())
        <div class="row border border-3 border-danger rounded-4 bg-light py-5 mb-5">
            <div class="col text-center">
                <div class="text-danger fs-5">Désolé, nous n'avons trouvé aucun vol disponible. Essayez d'ajuster vos dates ou votre destination.</div>
            </div>
        </div>
    @else
        @foreach ($vols as $vol)
            <div class="card mb-3 shadow-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-1 text-center">
                            <p class="mb-0">ID : {{ $vol->id }}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="mb-0"><strong>{{ $vol->aeroportDepart->nom }}</strong></p>
                            <p class="mb-0 text-muted">Départ le
                            <b>{{ \Carbon\Carbon::parse($vol->date_depart)->format('d/m/Y') }}</b>
                             <br>à 
                                    {{ \Carbon\Carbon::parse($vol->date_depart)->format('H\hi') }}
                            </p>
                        </div>
                        <div class="col-md-4">
                            <p class="mb-0"><strong>{{ $vol->aeroportArrivee->nom }}</strong></p>
                            <p class="mb-0 text-muted">Arrivée le 
                                    <b>{{ \Carbon\Carbon::parse($vol->date_arrivee)->format('d/m/Y') }}</b>
                             <br>à 
                                    {{ \Carbon\Carbon::parse($vol->date_arrivee)->format('H\hi') }}</p>
                        </div>
                        <div class="col-md-3">
                            <div class="d-flex justify-content-between align-items-center">
                                @if ($vol->nb_places == 0)
                                    <p class="mb-0 text-danger fw-bold">Complet</p>
                                @else
                                    <p class="mb-0 text-success fw-bold">{{ $vol->nb_places }} places</p>
                                @endif
                                <p class="mb-0 fw-bold">{{ $vol->prix }} €*</p>
                                @if ($vol->nb_places == 0)
                                    <input type="submit" class="btn btn-md" disabled value="RESERVER">
                                @else
                                    <input type="submit" class="btn custom-color btn-md" value="RESERVER">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
    @endif

    </div>
</section>


<!-- Pour que ca affiche vers l'ancre, elle se trouve au niveau du bouton rechercher ! -->
@if(isset($billets))
    <script>
        window.location.hash = "{{ $billets }}";
    </script>
@endif


@endsection