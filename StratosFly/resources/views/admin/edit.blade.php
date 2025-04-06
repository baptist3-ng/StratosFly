<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>StratosFly - Admin Panel</title>
</head>
<body>
    <h1>Ajouter un vol</h1>
    <form action="{{ route('vols.ajout') }}" method="POST">
    @csrf
        <label for="aeroport_depart_id" >Aéroport Départ</label>
            <select name="aeroport_depart_id">
                @foreach ($aeroports as $aeroport)
                    <option value="{{ $aeroport->id }}">{{ $aeroport->nom }}</option>
                @endforeach
            </select>
            <br><br>
        <label for="aeroport_arrivee_id" >Aéroport Arrivee</label>
            <select name="aeroport_arrivee_id">
                @foreach ($aeroports as $aeroport)
                    <option value="{{ $aeroport->id }}">{{ $aeroport->nom }}</option>
                @endforeach
            </select>
            <br><br>
        <label for="date_depart">Date de départ : </label>
        <input type="datetime-local" name="date_depart">
        <br><br>
        <label for="date_arrivee">Date d'arrivée' : </label>
        <input type="datetime-local" name="date_arrivee">
        <br><br>
        <label for="nb_places">Nb de places : </label>
        <input type="number" name="nb_places">
        <br><br>
        <label for="prix">Prix du billet : </label>
        <input type="number" name="prix">
        <br><br>
        <input type="submit" value="envoyer">
    </form>

    @error('aeroport_depart_id')
    <div>{{ $message }}</div>
    @enderror
    @error('aeroport_arrivee_id')
    <div>{{ $message }}</div>
    @enderror
    @error('date_depart')
    <div>{{ $message }}</div>
    @enderror
    @error('date_arrivee')
    <div>{{ $message }}</div>
    @enderror
    @error('nb_places')
    <div>{{ $message }}</div>
    @enderror
    @error('prix')
    <div>{{ $message }}</div>
    @enderror

    @if(session('success'))
    <div class="alert alert-success col-6">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <h1>Supprimer un vol</h1>
    <form action="{{ route('vols.supprime') }}" method="POST">
    @csrf
        @foreach ($vols as $vol)
            <p>Liste des vols : </p><br>
            <p>Id : {{ $vol->id }}</p>
        @endforeach
        <label for="id">Vol à supprimer : </label><br>
        <input type="text" name="id">
        <br>
        <input type="submit" value="Supprimer">
    </form>
    @error('id')
    <div>{{ $message }}</div>
    @enderror
    

</body>
</html>