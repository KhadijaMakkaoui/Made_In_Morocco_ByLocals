<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/Assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet">

    <title></title>
</head>

<body>
<!-- Sidebar -->
    <div class="first-color dashboard">
        <div class="row flex-nowrap ">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 fifth-color">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">
                        <img src="/Assets/images/logo-dash.png" alt="" class="w-100"></span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item w-100 me-md-5">
                            <a href="/dashHome" class="nav-link align-middle px-0 link-secondary">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline ">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item w-100">
                            <a href="/dashProducts" class="nav-link px-0 align-middle link-secondary">
                                <i class="fs-4 bi-shop"></i> <span class="ms-1 d-none d-sm-inline">Produits</span></a>
                        </li>
                        <li class="nav-item w-100">
                            <a href="/dashCommandes" class="nav-link px-0 align-middle link-secondary">
                                <i class="fs-4 bi-basket3"></i> <span class="ms-1 d-none d-sm-inline">Commandes</span> </a>
                        </li>
                        <li class="nav-item w-100">
                            <a href="/dashAvis" class="nav-link px-0 align-middle link-secondary">
                                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Avis</span> </a>
                        </li>

                        <li class="nav-item w-100">
                            <a href="#" class="nav-link px-0 align-middle link-secondary">
                                <i class="fs-4 bi-chat-left"></i> <span class="ms-1 d-none d-sm-inline">Messages</span> </a>
                        </li>

                    </ul>
                    <hr>

                </div>
            </div>
            <div class="col py-3">
                <!-- header -->
                <div class="nav-bar d-flex justify-content-end">
                    <div class="dropdown small-dropdown">
                        <a class="btn  btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="./Assets/images/maker.jpg" alt="" width="30" height="30" class="rounded-circle"> Ahmed Salim
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li>
                                <a class="dropdown-item" href="/dashProfile">Profile</a>
                            </li>
                            <hr>
                            <li>
                                <a class="dropdown-item" href="#">Paramètres</a>
                            </li>
                            <li><a class="dropdown-item" href="#">Aide</a></li>
                            <hr>
                            <li>
                                <a class="dropdown-item" href="/logout">Déconnexion</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Main content -->
        <div class="container my-5">
            {{content}}
        </div>
            </div>
        </div>
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous "></script>

</body>

</html>