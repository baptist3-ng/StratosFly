@extends('template')

@section('title', 'StratosFly - Réservation')

@section('content')

<div class="container">
    <div class="row text-center fs-5 rounded-4 align-items-center bg-light mt-md-4">
        <div class="col-3">
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
        <div class="col-3">
            Confirmation
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 ms-md-5 mt-md-4 fs-1">
            <i class="bi bi-person-fill me-2"></i>Passagers :
            <div class="d-none d-md-block divider-lg custom-color"></div>
        </div>
    </div>
</div>

<div class="container">
    <form action="">
        <div class="row">
            <div class="col fw-bold fs-4 mt-md-4">
                Vol : Ville A -> Ville B
            </div>
        </div>
        <div class="row border-bottom border-start border-end bg-light mb-4">
            <div class="col-md-6">
                <div class="row mt-md-4 mb-md-2">
                    <div class="col-11">
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
                        <p class="fs-5 fw-bold mt-3">Passager 1</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <label class="form-label me-3" for="nom1">Nom</label>
                        <input class="form-control" id="nom1" name="nom1" type="text">
                    </div>
                    <div class="col-5">
                        <label class="form-label me-3" for="prenom1">Prénom</label>
                        <input class="form-control" id="prenom1" name="prenom1" type="text">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p class="fs-5 fw-bold mt-3">Passager 2</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <label class="form-label me-3" for="nom1">Nom</label>
                        <input class="form-control" id="nom1" name="nom1" type="text">
                    </div>
                    <div class="col-5">
                        <label class="form-label me-3" for="prenom1">Prénom</label>
                        <input class="form-control" id="prenom1" name="prenom1" type="text">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col">
                        <p class="fs-5 fw-bold mt-3">Passager 3</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <label class="form-label me-3" for="nom1">Nom</label>
                        <input class="form-control" id="nom1" name="nom1" type="text">
                    </div>
                    <div class="col-5">
                        <label class="form-label me-3" for="prenom1">Prénom</label>
                        <input class="form-control" id="prenom1" name="prenom1" type="text">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p class="fs-5 fw-bold mt-3">Passager 4</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <label class="form-label me-3" for="nom1">Nom</label>
                        <input class="form-control" id="nom1" name="nom1" type="text">
                    </div>
                    <div class="col-5">
                        <label class="form-label me-3" for="prenom1">Prénom</label>
                        <input class="form-control" id="prenom1" name="prenom1" type="text">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p class="fs-5 fw-bold mt-3">Passager 5</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <label class="form-label me-3" for="nom1">Nom</label>
                        <input class="form-control" id="nom1" name="nom1" type="text">
                    </div>
                    <div class="col-5">
                        <label class="form-label me-3" for="prenom1">Prénom</label>
                        <input class="form-control" id="prenom1" name="prenom1" type="text">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


@endsection