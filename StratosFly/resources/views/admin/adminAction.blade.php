@extends('template')
@section('title', 'Actions Admin')

@section('content')

<div class="container-fluid">
    <div class="row vh-100">
        {{-- Sidebar --}}
        <div class="col-md-3 bg-light border-end p-3">
            <ul class="nav flex-column ">
                <li class="nav-item"><a class="nav-link text-dark fw-bold border-bottom" href="#" onclick="showForm('programmer')">Programmer un vol</a></li>
                <li class="nav-item"><a class="nav-link text-dark fw-bold border-bottom" href="#" onclick="showForm('modifier')"><i class="bi bi-tools me-2"></i>Modifier un vol</a></li>
                <li class="nav-item"><a class="nav-link text-dark fw-bold border-bottom" href="#" onclick="showForm('supprimer')"><i class="bi bi-trash3-fill me-2"></i>Supprimer un vol</a></li>
                <li class="nav-item"><a class="nav-link text-dark fw-bold border-bottom" href="#" onclick="showForm('visualiser')">Visualiser réservations</a></li>
                <li class="nav-item"><a class="nav-link text-dark fw-bold border-bottom" href="#" onclick="showForm('info')">Informations vol</a></li>
            </ul>
        </div>

        {{-- Content --}}
        <div class="col-md-9 p-5">
            {{-- Programmer un vol --}}
            <div id="programmer" class="card mb-4 form-section">
                <div class="card-header fw-bold">Programmer un vol</div>
                <div class="card-body">
                <form action="{{ route('vols.add') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label>Aéroport de départ</label>
                    <select name="aeroport_depart_id" class="form-control" required>
                        @foreach($aeroports as $aeroport)
                            <option value="{{ $aeroport->id }}">{{ $aeroport->nom }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>Aéroport d’arrivée</label>
                    <select name="aeroport_arrivee_id" class="form-control" required>
                        @foreach($aeroports as $aeroport)
                            <option value="{{ $aeroport->id }}">{{ $aeroport->nom }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>Date de départ</label>
                    <input type="datetime-local" name="date_depart" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Date d’arrivée</label>
                    <input type="datetime-local" name="date_arrivee" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Nombre de places</label>
                    <input type="number" name="nb_places" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Prix (€)</label>
                    <input type="number" name="prix" class="form-control" required>
                </div>
                <div class="text-center mt-4">
                    <button class="btn btn-primary" type="submit">Programmer le vol</button>
                </div>
                
            </form>
                </div>
            </div>

            {{-- Modifier un vol --}}
            <div id="modifier" class="card mb-4 form-section d-none">
                @if (session('volNotFound'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('volNotFound') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @error('id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <div class="card-header fw-bold fs-3"><i class="bi bi-tools me-2"></i>Modifier un vol</div>
                <div class="card-body">
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
                        <label class="form-label">	<i class="bi bi-people me-2"></i>Nombre de places</label>
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

            {{-- Supprimer un vol --}}
            <div id="supprimer" class="card mb-4 form-section d-none">
                <div class="card-header fw-bold fs-3"><i class="bi bi-trash3-fill me-2"></i>Supprimer un vol</div>
                <div class="card-body">
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

            {{-- Visualiser les réservations --}}
            <div id="visualiser" class="card mb-4 form-section d-none">
                <div class="card-header fw-bold">Visualiser les réservations</div>
                <div class="card-body">
                    <form action="{{ route('reservations.all') }}" method="GET">
                        <div class="text-center">
                            <button type="submit" class="btn btn-info text-white">Voir toutes les réservations</button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Informations vol --}}
            <div id="info" class="card mb-4 form-section d-none">
                <div class="card-header fw-bold">Informations sur un vol</div>
                <div class="card-body">
                    <form action="{{ route('vols.info') }}" method="GET">
                        <input type="text" class="form-control mb-3" name="id" placeholder="ID du vol">
                        <div class="text-center">
                            <button type="submit" class="btn btn-secondary">Afficher</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    function showForm(id) {
        const sections = document.querySelectorAll('.form-section');
        sections.forEach(section => section.classList.add('d-none'));
        document.getElementById(id).classList.remove('d-none');
    }
</script>

@endsection