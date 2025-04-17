@extends('template')
@section('title', 'Actions Admin')

@section('content')
@if (session('error'))
    <div class="alert alert-danger">
    {{ session('error') }}
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success">
    {{ session('success') }}
    </div>
@endif
<div class="container-fluid">
    <div class="row vh-100">
        {{-- Sidebar --}}
        <div class="col-md-3 bg-light border-end p-3">
            <ul class="nav flex-column ">
                <li class="nav-item"><a class="nav-link text-dark fw-bold border-bottom" href="#" onclick="showForm('programmer')">Programmer un vol</a></li>
                <li class="nav-item"><a class="nav-link text-dark fw-bold border-bottom" href="#" onclick="showForm('modifier')">Modifier un vol</a></li>
                <li class="nav-item"><a class="nav-link text-dark fw-bold border-bottom" href="#" onclick="showForm('supprimer')">Supprimer un vol</a></li>
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
                <form action="/flights/create" method="POST">
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
                <div class="card-header fw-bold">Modifier un vol</div>
                <div class="card-body">
                    <form action="/flights/update" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label>ID du vol</label>
                            <input type="number" name="id" class="form-control" required>
                        </div>
                        <div class="mb-3">
                        <label>Aéroport de départ</label>
                        <select name="nouvel_aeroport_depart_id" class="form-control">
                            @foreach($aeroports as $aeroport)
                                <option value="{{ $aeroport->id }}">{{ $aeroport->nom }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Aéroport d’arrivée</label>
                        <select name="nouvel_aeroport_arrivee_id" class="form-control">
                            @foreach($aeroports as $aeroport)
                                <option value="{{ $aeroport->id }}">{{ $aeroport->nom }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Date de départ</label>
                        <input type="datetime-local" name="nouvelle_date_depart" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Date d’arrivée</label>
                        <input type="datetime-local" name="nouvelle_date_arrivee" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Nombre de places</label>
                        <input type="number" name="nouveau_nb_places" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Prix (€)</label>
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
                <div class="card-header fw-bold">Supprimer un vol</div>
                <div class="card-body">
                    <form action="/flights/delete" method="POST">
                        @csrf
                        <input type="text" class="form-control mb-3" name="id" placeholder="ID du vol à supprimer">
                        <div class="text-center">
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Visualiser les réservations --}}
            <div id="visualiser" class="card mb-4 form-section d-none">
                <div class="card-header fw-bold">Visualiser les réservations</div>
                <div class="card-body">
                    <form action="/reservations/show" method="GET">
                        <input type="text" class="form-control mb-3" name="vol_id" placeholder="ID du vol">
                        <div class="text-center">
                            <button type="submit" class="btn btn-info text-white">Voir</button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Informations vol --}}
            <div id="info" class="card mb-4 form-section d-none">
                <div class="card-header fw-bold">Informations sur un vol</div>
                <div class="card-body">
                    <form action="/flights/info" method="GET">
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