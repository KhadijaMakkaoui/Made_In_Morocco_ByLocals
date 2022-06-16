<?php use app\core\Application; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="Assets/css/style.css">

    <title></title>
</head>

<body>
    
    <!-- Navbar -->
    <div class="first-color">
        <div class="">
            <nav class="navbar navbar-expand-lg  navbar-light">
                    
                <a class="navbar-brand" href="/"><img src="/Assets/images/logo.svg" class="" width="200px" alt="logo" /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse col-lg-10  justify-content-end me-4" id="navbarToggler">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/boutique">Boutique</a>
                        </li>
                        <li class="nav-item dropdown pointer">
                            <span class="dropdown-toggle nav-link " id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Nos catégories</span>
                            <ul class="dropdown-menu  ">
                                <li><a href="/productsByCat?categorie=1" class="nav-link">Maison et Décorations</a></li>
                                <li><a href="/productsByCat?categorie=2" class="nav-link">Vêtement et accessoirs</a></li>
                                <li><a href="/productsByCat?categorie=3" class="nav-link">Herbes, épices et fruits secs</a></li>
                                <li><a href="/productsByCat?categorie=4" class="nav-link">Santé et cosmetique</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#">Blogue et histoires</a></li>
                        <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
                        <!-- <li class="nav-item">|</li> -->

                       
                    </ul>
                    <?php if(Application::isGuest()): ?>
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="/login">Se connecter</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/register">S'inscrire</a>
                        </li>
                    </ul>
                    <?php else: ?>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/logout">Welcome <?php echo Application::$app->user->getDisplayName(); ?>
                    (Logout)
                    </a>
                        </li>
                    </ul><?php endif; ?>
                    <ul class="navbar-nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="/panier"><i class="bi bi-bag"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/wishList"><i class="bi bi-heart"></i></a>
                        </li>
                    </ul>
                    
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar -->

    <div class="first-color pb-5">
        <?php if(Application::$app->session->getFlash('success')):?>
        <div class="alert alert-success">
            <?php echo Application::$app->session->getFlash('success') ?>
        </div>
        <?php endif; ?> {{content}}
    </div>

    <!-- Footer -->
    <footer class="text-center text-lg-start text-muted second-color">
        <img class="mx-auto d-block" src="../Assets/images/logo-dark.png" alt="logo" width="200px">
        <div class="text-center text-md-start mt-5 ">
            <div class="row mt-3">
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4 ">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4 ">
                        MADE IN MOROCCO
                    </h6>
                    <p>
                        <div class="row">
                            <p>
                                <a href="" class="text-reset text-decoration-none">MADE IN MARRAKESH</a>
                            </p>
                            <a href="" class="text-reset text-decoration-none">MADE IN FES</a>
                            <p>

                            </p>
                            <a href="" class="text-reset text-decoration-none">MADE IN TANGER</a>
                            <div class="col">

                            </div>
                            <p>
                                <img src="../Assets/images\pic-footer.svg " class="mx-auto d-block" alt=" ">
                            </p>

                        </div>
                    </p>
                </div>

                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4 ">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4 ">
                        SERVICES
                    </h6>
                    <p>
                        <a href="#! " class="text-reset text-decoration-none">Termes et conditions</a>
                    </p>
                    <p>
                        <a href="#! " class="text-reset text-decoration-none">Livraison et retour</a>
                    </p>
                    <p>
                        <a href="#! " class="text-reset text-decoration-none">Contactez-nous</a>
                    </p>

                </div>
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4 ">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4 ">
                        BLOG ET HISTOIRES
                    </h6>
                    <p>
                        <a href="#! " class="text-reset text-decoration-none">Pourquoi nous avons pensez à créer l'application web MADE IN MOROCCO?</a>
                    </p>
                    <p>
                        <a href="#! " class="text-reset text-decoration-none">Comment sont fabriquées le fontaines marocaines?</a>
                    </p>
                    <p>
                        <a href="#! " class="text-reset text-decoration-none">Histoire de lala Rachida femme berbère du douar qui créer des tapis artistiques</a>
                    </p>

                </div>
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4 ">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4 ">
                        Contact
                    </h6>
                    <p>EMAIL: madeinmorocco2022@gmail.com </p>
                    <p>
                        Tél: +212 506060606
                    </p>
                    <p>
                        Réseaux sociaux :
                        <p class="d-flex justify-content-between text-center">
                            <a href=""></a>
                            <a href="" class="text-reset"><i class="bi bi-instagram"></i></a>
                            <a href="" class="text-reset"><i class="bi bi-facebook"></i></a>
                            <a href="" class="text-reset"><i class="bi bi-twitter"></i></a>
                            <a href="" class="text-reset"><i class="bi bi-linkedin"></i></a>

                        </p>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous "></script>

</body>

</html>