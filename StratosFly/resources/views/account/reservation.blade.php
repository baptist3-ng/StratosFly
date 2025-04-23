@extends('template')

@section('title', 'StratosFly - Réservation')

@section('content')

<div class="container d-sm-block d-none">
    <div class="row text-center fs-5 rounded-4 align-items-center mt-4 justify-content-center">
        <div class="col-2">
            Panier
        </div>
        <div class="col-1">
            >>>
        </div>
        <div class="col-3 custom-color py-3 rounded-4">
            Voyageurs
        </div>
        <div class="col-1">
            >>>
        </div>
        <div class="col-2">
            Confirmation
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-5 ms-md-5 mt-4 fs-1 mb-3 mb-md-0">
            <i class="bi bi-people-fill me-2"></i></i>Passagers :
            <div class="d-none d-md-block divider-lg custom-color"></div>
        </div>
    </div>
</div>

<div class="container">
    <form action="{{ route('sendForm') }}" method="POST">
    @foreach ($panier->vols as $vol)
    @csrf
        <input type="hidden" name="vols_ids[]" value="{{ $vol->id }}"> <!-- récupérer les vols -->
        <div class="row border bg-light mb-4 mt-4">
            <div class="fw-bold fs-4 mt-md-4 mb-3">
                Vol : {{ $vol->aeroportDepart->ville }} -> {{ $vol->aeroportArrivee->ville }}
            </div>
            <div class="col-md-6">
                <div class="row mt-4 mb-md-2">
                    <div class="col-12">
                        <div class="alert alert-info d-flex" role="alert">
                            <div class="col-md-1">
                                <i class="bi bi-info-circle-fill me-2 fs-5"></i>
                            </div>
                            <div class="col-md-11">
                            Veuillez renseigner les informations des voyageurs. Si vous voyagez seul, remplissez uniquement les champs du premier passager. 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p class="fs-5 fw-bold mt-3"><i class="bi bi-person-vcard-fill me-2"></i>Passager 1</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label class="form-label me-3" for="nom1">Nom</label>
                        <input class="form-control @error($vol->id . '_nom1') is-invalid @enderror" @error($vol->id . '_nom1') placeholder="Le nom est requis." @enderror id="nom1" name="{{$vol->id}}_nom1" type="text">
                    </div>
                    <div class="col-4">
                        <label class="form-label me-3" for="prenom1">Prénom</label>
                        <input class="form-control @error($vol->id . '_nom1') is-invalid @enderror" @error($vol->id . '_nom1') placeholder="Le prénom est requis." @enderror id="prenom1" name="{{$vol->id}}_prenom1" type="text">
                    </div>
                    <div class="col-2">
                        <label for="select1" class="form-label">Genre</label>
                        <select id="select5" class="form-select" name="{{$vol->id}}_p1_genre">
                            <option value="M">H</option>
                            <option value="MME">F</option>
                            <option value="NP">Autre</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p class="fs-5 fw-bold mt-3"><i class="bi bi-person-vcard-fill me-2"></i>Passager 2</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label class="form-label me-3" for="nom2">Nom</label>
                        <input class="form-control" id="nom2" name="{{$vol->id}}_nom2" type="text">
                    </div>
                    <div class="col-4">
                        <label class="form-label me-3" for="prenom2">Prénom</label>
                        <input class="form-control" id="prenom2" name="{{$vol->id}}_prenom2" type="text">
                    </div>
                    <div class="col-2">
                        <label for="select2" class="form-label">Genre</label>
                        <select id="select5" class="form-select" name="{{$vol->id}}_p2_genre">
                            <option value="M">H</option>
                            <option value="MME">F</option>
                            <option value="NP">Autre</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="row">
                    <div class="col">
                        <p class="fs-5 fw-bold mt-3"><i class="bi bi-person-vcard-fill me-2"></i>Passager 3</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label class="form-label me-3" for="nom3">Nom</label>
                        <input class="form-control" id="nom3" name="{{$vol->id}}_nom3" type="text">
                    </div>
                    <div class="col-4">
                        <label class="form-label me-3" for="prenom3">Prénom</label>
                        <input class="form-control" id="prenom3" name="{{$vol->id}}_prenom3" type="text">
                    </div>
                    <div class="col-2">
                        <label for="select3" class="form-label">Genre</label>
                        <select id="select5" class="form-select" name="{{$vol->id}}_p3_genre">
                            <option value="M">H</option>
                            <option value="MME">F</option>
                            <option value="NP">Autre</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p class="fs-5 fw-bold mt-3"><i class="bi bi-person-vcard-fill me-2"></i>Passager 4</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label class="form-label me-3" for="nom4">Nom</label>
                        <input class="form-control" id="nom4" name="{{$vol->id}}_nom4" type="text">
                    </div>
                    <div class="col-4">
                        <label class="form-label me-3" for="prenom4">Prénom</label>
                        <input class="form-control" id="prenom4" name="{{$vol->id}}_prenom4" type="text">
                    </div>
                    <div class="col-2">
                        <label for="select4" class="form-label">Genre</label>
                        <select id="select5" class="form-select" name="{{$vol->id}}_p4_genre">
                            <option value="M">H</option>
                            <option value="MME">F</option>
                            <option value="NP">Autre</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p class="fs-5 fw-bold mt-3"><i class="bi bi-person-vcard-fill me-2"></i>Passager 5</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label class="form-label me-3" for="nom5">Nom</label>
                        <input class="form-control" id="nom5" name="{{$vol->id}}_nom5" type="text">
                    </div>
                    <div class="col-4">
                        <label class="form-label me-3" for="prenom5">Prénom</label>
                        <input class="form-control" id="prenom5" name="{{$vol->id}}_prenom5" type="text">
                    </div>
                    <div class="col-2">
                        <label for="select5" class="form-label">Genre</label>
                        <select id="select5" class="form-select" name="{{$vol->id}}_p5_genre">
                            <option value="M">H</option>
                            <option value="MME">F</option>
                            <option value="NP">Autre</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>    
    @endforeach

    <div class="row">
        <div class="offset-md-6 col-md-6 d-flex justify-content-end">
            <button type="submit" class="btn btn-lg custom-color my-4 px-5 fs-4">Réserver<i class="bi bi-check2-all ms-3"></i></button>
        </div>
    </div>
    </form>


</div>


@endsection