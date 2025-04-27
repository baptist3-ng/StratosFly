@extends('templateAdmin')
@section('title', 'StratosFly - Admin')

@section('content')

<div class="container-fluid">
    <div class="row">
        {{-- Sidebar --}}
        <div class="col-md-3 bg-light border-end p-3">
            <ul class="nav flex-column fs-4">
                <li class="nav-item my-2"><a class="nav-link text-dark fw-bold border-bottom" href="#programmer"><i class="bi bi-plus-lg me-2"></i>Programmer un vol</a></li>
                <li class="nav-item my-2"><a class="nav-link text-dark fw-bold border-bottom" href="#modifier"><i class="bi bi-tools me-2"></i>Modifier un vol</a></li>
                <li class="nav-item my-2"><a class="nav-link text-dark fw-bold border-bottom" href="#supprimer"><i class="bi bi-trash3-fill me-2"></i>Supprimer un vol</a></li>
                <li class="nav-item my-2"><a class="nav-link text-dark fw-bold border-bottom" href="#visualiser"><i class="bi bi-ticket-detailed me-2"></i>Visualiser réservations</a></li>
                <li class="nav-item my-2"><a class="nav-link text-dark fw-bold border-bottom" href="#info"><i class="bi bi-info-circle-fill me-2"></i>Informations vol</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        @method("delete")
                        <button type="submit" class="btn btn-danger px-4 mt-md-4 ms-md-2">
                            <i class="bi bi-box-arrow-right me-2"></i> LOGOUT
                        </button>
                    </form>
                </li>
            </ul>
        </div>

        {{-- Content --}}
        <div class="col-md-9 p-5">
            @if (session('error'))
            <div class="alert alert-danger text-center">
                {{ session('error') }}
            </div>
            
            @endif
            {{-- Programmer un vol --}}
            <div id="programmer" class="card mb-5 form-section">
                @if (session('volCreated'))
                <div class="alert alert-success text-center" role="alert">
                    {{ session('volCreated') }}
                </div>
                @endif
                <div class="card-header fw-bold fs-3"><i class="bi bi-plus-lg me-2"></i>Programmer un vol</div>
                <div class="card-body p-4">
                <form action="{{ route('vols.add') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-airplane me-2"></i>Aéroport de départ</label>
                    <select name="aeroport_depart_id" class="form-control" required>
                        <option disabled selected>Sélectionnez un aéroport</option>
                        @foreach($aeroports as $aeroport)
                            <option value="{{ $aeroport->id }}">{{ $aeroport->nom }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-airplane-fill me-2"></i>Aéroport d'arrivée</label>
                    <select name="aeroport_arrivee_id" class="form-control" required>
                        <option disabled selected>Sélectionnez un aéroport</option>
                        @foreach($aeroports as $aeroport)
                            <option value="{{ $aeroport->id }}">{{ $aeroport->nom }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-calendar3 me-2"></i>Date de départ</label>
                    <input type="datetime-local" name="date_depart" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-calendar3 me-2"></i>Date d'arrivée</label>
                    <input type="datetime-local" name="date_arrivee" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-people me-2"></i>Nombre de places</label>
                    <input type="number" name="nb_places" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-currency-exchange me-2"></i>Prix (€)</label>
                    <input type="number" name="prix" class="form-control" required>
                </div>
                <div class="text-center mt-4">
                    <button class="btn btn-primary" type="submit">Programmer le vol</button>
                </div>
                
            </form>
                </div>
            </div>
            <div class="d-none d-md-block divider-lg custom-color"></div>

            {{-- Modifier un vol --}}
            <div id="modifier" class="card my-5 form-section">
                @if (session('volModified'))
                    <div class="alert alert-success text-center" role="alert">
                        {{ session('volModified') }}
                    </div>
                @endif
                <div class="card-header fw-bold fs-3"><i class="bi bi-tools me-2"></i>Modifier un vol</div>
                <div class="card-body p-4">
                    <form action="{{ route('vols.update') }} " method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-key me-2"></i>ID du vol</label>
                            <select name="id" class="form-control">
                                <option disabled selected>Sélectionnez un vol</option>
                                @foreach($vols as $vol)
                                    <option value="{{ $vol->id }}">{{ $vol->aeroportDepart->ville . "->" . $vol->aeroportArrivee->ville . " ID : " . $vol->id }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                        <label class="form-label"><i class="bi bi-airplane me-2"></i>Aéroport de départ</label>
                        <select name="nouvel_aeroport_depart_id" class="form-control">
                            <option disabled selected>Sélectionnez un aéroport</option>
                            @foreach($aeroports as $aeroport)
                                <option value="{{ $aeroport->id }}">{{ $aeroport->nom }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><i class="bi bi-airplane-fill me-2"></i>Aéroport d’arrivée</label>
                        <select name="nouvel_aeroport_arrivee_id" class="form-control">
                            <option disabled selected>Sélectionnez un aéroport</option>
                            @foreach($aeroports as $aeroport)
                                <option value="{{ $aeroport->id }}">{{ $aeroport->nom }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><i class="bi bi-calendar3 me-2"></i>Date de départ</label>
                        <input type="datetime-local" name="nouvelle_date_depart" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><i class="bi bi-calendar3 me-2"></i>Date d’arrivée</label>
                        <input type="datetime-local" name="nouvelle_date_arrivee" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><i class="bi bi-people me-2"></i>Nombre de places</label>
                        <input type="number" name="nouveau_nb_places" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><i class="bi bi-currency-exchange me-2"></i>Prix (€)</label>
                        <input type="number" name="nouveau_prix" class="form-control">
                    </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-warning">Modifier</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="d-none d-md-block divider-lg custom-color"></div>

            {{-- Supprimer un vol --}}
            <div id="supprimer" class="card my-5 form-section">
                @if (session('volDeleted'))
                <div class="alert alert-success text-center">
                    {{ session('volDeleted') }}
                </div>
                @endif
                <div class="card-header fw-bold fs-3"><i class="bi bi-trash3-fill me-2"></i>Supprimer un vol</div>
                <div class="card-body p-4">
                    <form action="{{ route('vols.delete') }}" method="POST">
                        @csrf
                        <label class="form-label"><i class="bi bi-key me-2"></i>ID du vol</label>
                        <select name="id" class="form-control">
                            <option disabled selected>Sélectionnez un vol</option>
                            @foreach($vols as $vol)
                                <option value="{{ $vol->id }}">{{ $vol->aeroportDepart->ville . "->" . $vol->aeroportArrivee->ville . " ID : " . $vol->id}}</option>
                            @endforeach
                        </select>
                        <div class="text-center">
                            <button type="submit" class="btn btn-danger mt-3">Supprimer</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="d-none d-md-block divider-lg custom-color"></div>

            {{-- Visualiser les réservations --}}
            <div id="visualiser" class="card my-5 form-section">
                <div class="card-header fw-bold fs-3"><i class="bi bi-ticket-detailed me-2"></i>Visualiser les réservations</div>
                <div class="card-body p-4">
                    <form action="{{ route('reservations.all') }}" method="GET">
                        <div class="text-center">
                            <button type="submit" class="btn btn-info text-white">Voir toutes les réservations</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="d-none d-md-block divider-lg custom-color"></div>

            {{-- Informations vol --}}
            <div id="info" class="card my-5 form-section">
                <div class="card-header fw-bold fs-3"><i class="bi bi-info-circle-fill me-2"></i>Informations sur un vol</div>
                <div class="card-body p-4">
                    <form action="{{ route('vols.info') }}" method="GET">
                    <label class="form-label"><i class="bi bi-key me-2"></i>ID du vol</label>
                        <select name="id" class="form-control">
                            <option disabled selected>Sélectionnez un vol</option>
                            @foreach($vols as $vol)
                                <option value="{{ $vol->id }}">{{ $vol->aeroportDepart->ville . "->" . $vol->aeroportArrivee->ville . " ID : " . $vol->id}}</option>
                            @endforeach
                        </select>
                        <div class="text-center my-4">
                            <button type="submit" class="btn btn-secondary">Afficher</button>
                        </div>
                    </form>
                    @if (isset($vol_return))
                    <div class="container-fluid">
                        <div class="row justify-content-center mb-5">
                            <div class="col-md-12 border border-1 bg-body-tertiary rounded-3">
                                <div class="row mt-3 ms-1">
                                    <div class="col-md-6 fs-1">
                                        <p>{{ $vol_return->aeroportDepart->ville }} <i class="bi bi-arrow-right"></i> {{ $vol_return->aeroportArrivee->ville }}</p>
                                    </div>
                                </div>
                                <div class="row justify-content-evenly mb-5">
                                    <div class="col-md-5 card">
                                        <div class="card-title fs-3 mt-3 mb-0 fw-bold fs-4"><i class="bi bi-airplane-fill me-2"></i>Aéroports</div>
                                        <div class="card-body p-4">
                                            <p><strong><i class="bi bi-geo-alt me-1"></i>Départ : </strong>{{ $vol_return->aeroportDepart->nom }}</p>
                                            <p><strong><i class="bi bi-geo-alt me-1"></i>Arrivée :</strong> {{ $vol_return->aeroportArrivee->nom }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3 card my-3 my-md-0">
                                        <div class="card-title mt-md-3 mb-md-0 fw-bold fs-4"><i class="bi bi-calendar3 me-2"></i> Dates</div>
                                        <div class="card-body p-4">
                                            <p>
                                                <strong>Départ le </strong> {{ \Carbon\Carbon::parse($vol_return->date_depart)->format('d/m/Y') }} à 
                                                {{ \Carbon\Carbon::parse($vol_return->date_depart)->format('H\hi') }}
                                            </p>
                                            <p>
                                                <strong>Arrivée le  </strong> {{ \Carbon\Carbon::parse($vol_return->date_arrivee)->format('d/m/Y') }} à 
                                                {{ \Carbon\Carbon::parse($vol_return->date_arrivee)->format('H\hi') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-3 card">
                                        <div class="card-title mt-3 mb-0 fw-bold fs-4"><i class="bi bi-currency-exchange me-2"></i> Prix </div>
                                        <div class="card-body p-4">
                                            <p><strong>Passagers pour ce vol:</strong> {{ $vol_return->places_totales - $vol_return->nb_places }}.</p>
                                            <p><strong>Prix du billet :</strong> {{$vol_return->prix}}€*</p>
                                            <p><strong>Places disponibles :</strong> {{ $vol_return->nb_places }}.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-11 card mb-5 ms-5">
                                    <div class="card-title mt-3 mb-0 fw-bold fs-4"><i class="bi bi-person-lines-fill me-2 ms-4"></i>Liste des passagers</div>
                                    <div class="card-body p-4">
                                    @if($passagers->isEmpty())
                                        <p>Aucun passager pour ce vol.</p>
                                    @else
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Prénom</th>
                                                <th>Nom</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($passagers as $passager)
                                                <tr>
                                                    <td>{{ $passager->prenom }}</td>
                                                    <td>{{ $passager->nom }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>

@if(session('volCreated'))
    <script>
        window.location.hash = "programmer";
    </script>
@elseif(session('volModified'))
    <script>
        window.location.hash = "modifier";
    </script>
@elseif(session('volDeleted'))
    <script>
        window.location.hash = "supprimer";
    </script>
@elseif(isset($vol_return))
    <script>
        window.location.hash = "info";
    </script>
@endif


@endsection