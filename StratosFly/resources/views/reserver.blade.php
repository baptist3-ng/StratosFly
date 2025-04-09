@extends('template')

@section('title', 'StratosFly - Reserver')

@section('content')


<div class="container-fluid my-5">
    <div class="row">
        <div class="col-md-5 ms-5 mb-4">
            <p class="fs-1 fw-semibold"><i class="bi bi-basket2-fill"></i> Votre panier : </p>
            <div class="d-none d-md-block divider-lg custom-color"></div>
        </div>
    </div>
    <form action="">
        <!-- Pour chaque vol du panier  -->
        <div class="row justify-content-center">
            <div class="col-md-7 border border-1 bg-body-tertiary rounded-start-3">
                <div class="row mt-3 ms-1">
                    <div class="col-6 fs-1">
                        <p>Ville A <i class="bi bi-arrow-right"></i> Ville B</p>
                    </div>
                </div>
                <div class="row ms-1 mb-2">
                    <div class="col-6 fs-2">
                        <p><i class="bi bi-info-circle"></i> Informations</p>
                    </div>
                </div>
                <div class="row justify-content-evenly">
                    <div class="col-5 card">
                        <div class="card-title fs-3 mt-3 mb-0"><i class="bi bi-airplane-fill me-2"></i>Aéroports</div>
                        <div class="card-body">
                            <p><strong><i class="bi bi-geo-alt me-1"></i>Départ : </strong>Aéroport fqkjvvfrhiurvh</p>
                            <p><strong><i class="bi bi-geo-alt me-1"></i>Arrivée :</strong> Aéroport fqkjvvfrhiurvh</p>
                        </div>
                    </div>
                    <div class="col-5 card">
                        <div class="card-title mt-3 mb-0"><i class="bi bi-calendar3 me-2"></i> Dates</div>
                        <div class="card-body">
                            <p><strong>Départ le</strong> 11/20/20 à 12h36.</p>
                            <p><strong>Arrivée le</strong> 11/29/30 à 15h37.</p>
                        </div>
                    </div>
                    <div class="col-5 card mt-5 mb-5">
                        <div class="card-title mt-3 mb-0"><i class="bi bi-currency-exchange me-2"></i> Prix </div>
                        <div class="card-body">
                            <p><strong>Prix du billet :</strong> 136€*</p>
                            <p><strong>Places disponibles :</strong> 111.</p>
                        </div>
                    </div>
                    <div class="col-5"></div>
                    
                </div>
            </div>

            <div class="col-md-3 border border-1 ">
                <div class="row fs-1 mt-3 ms-1">
                    <div class="col">
                        <p><i class="bi bi-person-fill me-1"></i>Voyageur</p>
                    </div>
                </div>
                <div class="alert alert-info d-flex" role="alert">
                <div class="col-md-1">
                    <i class="bi bi-info-circle-fill me-2 fs-5"></i>
                </div>
                <div class="col-md-11">
                    <strong>Nouveau !</strong> Vous pouvez désormais réserver <strong>pour vos proches</strong>, directement depuis votre compte — <em>même à leur place</em> ! Un gain de temps pour vous, une surprise pour eux. 💌
                </div>
                    
                </div>
                <div class="row">
                    <div class="col fs-4 mt-3 ms-1">
                        <p>Remplissez les champs suivants :</p>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col">
                    <label class="form-label ms-1 me-4 fs-5">Voyagez-vous seul ?</label>
                    <div class="d-flex">
                        <input type="radio" class="btn-check" name="seul" id="oui" autocomplete="off" checked>
                        <label class="btn btn-light rounded-pill px-4 py-2 shadow-sm me-2" for="oui">Oui</label>

                        <input type="radio" class="btn-check" name="seul" id="non" autocomplete="off">
                        <label class="btn btn-light rounded-pill px-4 py-2 shadow-sm" for="non">Non</label>
                    </div>


                    </div>
                </div>
                <div class="row my-3">
                    <div class="col">
                    <label for="nbPersonnes" class="form-label ms-1 me-4">Si non, indiquez le nombre de personnes</label>
                    <select class="form-select" name="nbPersonnes" id="nbPersonnes" disabled>
                        <option value="1" selected>1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="alert alert-secondary d-flex mt-3" role="alert">
                        <i class="bi bi-question-circle-fill me-2"></i>
                        <div>
                            Si vous souhaitez réserver <strong>pour d'autres personnes</strong> sans être présent, sélectionnez <strong>« Non »</strong>.  
                            Vous pourrez ensuite <strong>indiquer les noms et prénoms</strong> de chaque passager.
                        </div>
                    </div>

                    </div>
                </div>
            </div>
            <div class="col-md-1">
                <input type="hidden" name="panier_vol_id" value="1"> <!-- Remplacez 1 par l'ID dynamique du vol -->
                <!-- Bouton croix pour supprimer le vol -->
                <button type="submit" class="btn btn-link border border-1 px-2" aria-label="Supprimer le vol">
                <i class="bi bi-x-lg" style="font-size: 1.5rem;"></i>
                </button>
            </div>
        </div>
    </form>
    
</div>


<!-- Script pour la section oui/non -->
<script>
    const ouiBtn = document.getElementById('oui');
    const nonBtn = document.getElementById('non');
    const nbInput = document.getElementById('nbPersonnes');

    // Ajout des événements
    ouiBtn.addEventListener('change', () => {
      if (ouiBtn.checked) {
        nbInput.disabled = true;
        nbInput.value = ''; // on peut aussi effacer la valeur
      }
    });

    nonBtn.addEventListener('change', () => {
      if (nonBtn.checked) {
        nbInput.disabled = false;
      }
    });
  </script>


@endsection