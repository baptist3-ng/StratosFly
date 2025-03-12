<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>@yield('title', 'AirPlane')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<header class="custom-color">
    <nav class="navbar navbar-expand-md navbar-dark custom-color rounded-bottom-5 py-4">
        <div class="container-fluid fw-bold">
            <a class="navbar-brand fs-1 ps-3 ps-lg-5" href="#"><i class="bi bi-airplane pe-lg-4 pe-3"></i>StratosFly</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto fs-4 pe-5">
                    <li class="nav-item mx-lg-3"><a class="nav-link active" href="#">Billets</a></li>
                    <li class="nav-item mx-lg-3"><a class="nav-link active" href="#">Contact</a></li>
                    <li class="nav-item mx-lg-3"><a class="nav-link active" href="#">Mon compte</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>



@yield('content')


<footer class="custom-color">
    <div class="container">
        <div class="row text-center py-4">
            <a class="navbar-brand fs-1 ps-3 ps-lg-5" href="#"><i class="bi bi-airplane pe-lg-4 pe-3"></i>StratosFly</a>
        </div>
        <div class="row justify-content-evenly mx-4">
            <div class="col-md-3 col-6">
                <div style="font-size: extra-large" class="row py-2">
                    Liens Utiles
                </div>
                <div style="font-size: medium" class="row">
                    - Accueil<br>- A propos<br>- Réservations<br>- Contact<br>- FAQ 
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div style="font-size: extra-large" class="row py-2">
                    Contact
                </div>
                <div style="font-size: medium" class="row">
                    - support@company.com<br>- +123 456 789
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div style="font-size: extra-large" class="row py-2">
                    Suivez-nous
                </div>
                <div class="row">
                    
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div style="font-size: extra-large" class="row py-2">
                    Newsletter
                </div>
                <div style="font-size: medium" class="row">
                    - Inscrivez-vous pour recevoir nos dernières offres et actualités.
                </div>
            </div>
        </div>
        <div class="row py-4 d-flex justify-content-center">
            © 2025 StratosFly INC - Tous droits réservés
        </div>
    </div>
</footer>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>