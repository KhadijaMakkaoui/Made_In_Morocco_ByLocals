<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="../public/Assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
</head>

<body class="first-color">
    <div class="row product-Page">
        <!--product details-->
        <div class="my-5">
            <div class="card">
                <div class="row">
                    <div class="col-md-6 border-end">
                        <div class="d-flex flex-column justify-content-center">
                            <div class="main_image">
                                <img src="../public/Assets/images/pouf.jpg" id="main_product_image" class="w-100" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="title">Pouf en cuir</h3>
                            </div>
                            <div class="price">400 DH</div>
                            <a href="#commentaires" class="text-decoration-none link-dark">
                                <div class="rate">
                                    <span class="me-4">
                      <i class="bi bi-star"></i>
                      <i class="bi bi-star"></i>
                      <i class="bi bi-star"></i>
                      <i class="bi bi-star"></i>
                      <i class="bi bi-star"></i>
                    </span>
                                    <span>5 Avis de client</span>
                                </div>
                            </a>
                            <div class="mt-2 pr-3 content">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
                                </p>
                            </div>

                            <!-- <div class="mt-5"> <span class="fw-bold">Color</span>
                                <div class="colors">
                                    <ul id="marker">
                                        <li id="marker-1"></li>
                                        <li id="marker-2"></li>
                                        <li id="marker-3"></li>
                                        <li id="marker-4"></li>
                                        <li id="marker-5"></li>
                                    </ul>
                                </div>
                            </div> -->
                            <div class="row my-5 gap-1">
                                <div class="counter d-inline-flex col-lg-4 justify-content-center">
                                    <button class="down btns btn btn-dark" onClick="decreaseCount(event, this)"> 
                                         -                   
                                         </button>
                                    <span class="px-2 bg">1</span>
                                    <button class="up btns btn btn-dark" onClick="increaseCount(event, this)">                      +                    </button>
                                </div>
                                <button class="btn btn-outline-dark title col-lg-7">
                    ajouter au panier
                  </button>

                            </div>

                            <div class="">
                                <button class="btn btn-outline-dark w-100 title">
                    <i class="bi bi-heart"></i>
                    Ajouter à la liste des souhaits
                  </button>
                            </div>
                            <div class="short-desc mt-4">

                                <div class="">
                                    <span class="fw-bold">En stock : </span>
                                    <span class="text-secondary"> 20 </span>
                                </div>
                                <div class="">
                                    <span class="fw-bold">Categorie : </span>
                                    <span class="text-secondary"> Maison et décoration </span>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- vendender details and description -->
        <div class="row justify-content-between">
            <div class="infos col-sm col-lg-6">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link link-dark bg-transparent active" id="description-tab" data-bs-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a
              >
            </li>
           
            </li>
            <li class="nav-item" role="presentation">
              <a
                class="nav-link link-dark bg-transparent"
                id="Livraisonetretours-tab"
                data-bs-toggle="tab"
                href="#Livraisonetretours"
                role="tab"
                aria-controls="Livraison et retours"
                aria-selected="false"
                >Livraison et retours</a
              >
            </li>
          </ul>
          <div class="tab-content mt-4" id="myTabContent">
            <div
              class="tab-pane fade show active"
              id="description"
              role="tabpanel"
              aria-labelledby="description-tab"
            >
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore
              inventore pariatur ullam in dolores unde maxime ab dignissimos
              atque? Maxime.
            </div>
            <div
              class="tab-pane fade"
              id="infos"
              role="tabpanel"
              aria-labelledby="infos-tab"
            >
              infos
            </div>
            <div
              class="tab-pane fade"
              id="Livraisonetretours"
              role="tabpanel"
              aria-labelledby="Livraison et retours-tab"
            >
            <h6 class="fw-bold"> Expédition de votre article</h6>
            <ul>
                <li>La livraison des colis se fait en jours ouvrés.</li>
            </ul>
            <ul>
                <li>          
                    Tous les articles achetés seront expédiés à destination dans les 1 à 3 jours suivant votre commande.
                </li>
            </ul>
            <h6 class="fw-bold mt-3">Condition de retour </h6>
            Pour que les Marchandises soient éligibles à un retour, veuillez vous assurer que :


            <ul>
                <li>Les Marchandises ont été achetées au cours des 14 derniers jours
                </li>
                <li>          
                    Les marchandises ne doivent pas être endommagées.
                </li>
                <li>          
                    Les marchandises sont dans l'emballage d'origine

                </li>
            </ul>
            </div>
          </div>
        </div>
        <!-- Vendeur info -->
        <div class="vendeur col-sm col-lg-5">
          <div class="card mb-4">
            <div class="card-body text-center">
              <h4 class="title">made by</h4>
              <img
                src="../publicAssets/images/maker.jpg"
                alt="avatar"
                class="rounded-circle img-fluid"
                style="width: 150px; height: 150px"
              />
              <h5 class="my-3">Prenom nom</h5>
              <p class="mb-1">Profession</p>
              <p class="mb-4">region</p>
              <p class="text-secondary mb-4 text-break">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Quisquam, culpa! Facilis eum cupiditate sed voluptates quibusdam
                inventore adipisci numquam iure?
              </p>

              <div class="d-flex justify-content-center mb-2">
                <button type="button" class="btn btn-outline-dark ms-1">
                  SAVOIR PLUS
                </button>
              </div>
            </div>
          </div>
          <div class="text-center mb-2">
            <p>Êtes-vous un vendeur?</p>
            <a href="registerVendeur.html" class="link-color">
              Postuler pour rejoigner-nous !
            </a>
            </div>
        </div>
    </div>
    <!-- commentaires et avis -->
    <div class=" comments my-5" id="commentaires">
        <h4 class="text-uppercase mb-3"><span>5</span> commentaires</h4>
        <div class="d-flex flex-row flex-nowrap overflow-auto justify-content-between gap-3">
            <div class="">
                <div class="card bg-transparent" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">
                            <div class="rate ">
                                <span class="me-4">
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                      </span>
                            </div>
                        </h5>
                        <h6 class="card-subtitle mb-2 fw-bold">Titre</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <div class="">Full name</div>

                    </div>
                </div>
            </div>
            <div class="">
                <div class="card bg-transparent" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">
                            <div class="rate ">
                                <span class="me-4">
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                      </span>
                            </div>
                        </h5>
                        <h6 class="card-subtitle mb-2 fw-bold">Titre</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <div class="">Full name</div>

                    </div>
                </div>
            </div>
            <div class="">
                <div class="card bg-transparent" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">
                            <div class="rate ">
                                <span class="me-4">
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                      </span>
                            </div>
                        </h5>
                        <h6 class="card-subtitle mb-2 fw-bold">Titre</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <div class="">Full name</div>

                    </div>
                </div>
            </div>
            <div class="">
                <div class="card bg-transparent" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">
                            <div class="rate ">
                                <span class="me-4">
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                      </span>
                            </div>
                        </h5>
                        <h6 class="card-subtitle mb-2 fw-bold">Titre</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <div class="">Full name</div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- produits similaires -->
    <div class="produit-pop">
        <h2 class="title m-5">produits similaires</h2>
        <div class="d-flex flex-row flex-nowrap overflow-auto justify-content-between gap-5">
            <div class="prod">
                <div class="card shadow" style="width: 18rem">
                    <img clas="card-img-top" src="Assets/images/babouche-gravee-noire.jpg" alt=" " />
                    <div class="card-body text-center">
                        <h5>Babouche noire femme</h5>
                        <p>
                            Babouche femme noire Babouche originale de cuire à 100% décorer en blanc
                        </p>
                        <p>
                            Categorie: Vêtements et accessoires PRIX:
                            <span class="price">DH200.00</span>
                        </p>
                        <a href="#">
                            <button class="btn btn-outline-dark p-3 my-2 rounded-2 border-1">
                    Ajouter au panier
                  </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="prod">
                <div class="card shadow" style="width: 18rem">
                    <img clas="card-img-top" src="Assets/images/babouche-gravee-noire.jpg" alt=" " />
                    <div class="card-body text-center">
                        <h5>Babouche noire femme</h5>
                        <p>
                            Babouche femme noire Babouche originale de cuire à 100% décorer en blanc
                        </p>
                        <p>
                            Categorie: Vêtements et accessoires PRIX:
                            <span class="price">DH200.00</span>
                        </p>
                        <a href="#">
                            <button class="btn btn-outline-dark p-3 my-2 rounded-2 border-1">
                    Ajouter au panier
                  </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="prod">
                <div class="card shadow" style="width: 18rem">
                    <img clas="card-img-top" src="Assets/images/babouche-gravee-noire.jpg" alt=" " />
                    <div class="card-body text-center">
                        <h5>Babouche noire femme</h5>
                        <p>
                            Babouche femme noire Babouche originale de cuire à 100% décorer en blanc
                        </p>
                        <p>
                            Categorie: Vêtements et accessoires PRIX:
                            <span class="price">DH200.00</span>
                        </p>
                        <a href="#">
                            <button class="btn btn-outline-dark p-3 my-2 rounded-2 border-1">
                    Ajouter au panier
                  </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="prod">
                <div class="card shadow" style="width: 18rem">
                    <img clas="card-img-top" src="Assets/images/babouche-gravee-noire.jpg" alt=" " />
                    <div class="card-body text-center">
                        <h5>Babouche noire femme</h5>
                        <p>
                            Babouche femme noire Babouche originale de cuire à 100% décorer en blanc
                        </p>
                        <p>
                            Categorie: Vêtements et accessoires PRIX:
                            <span class="price">DH200.00</span>
                        </p>
                        <a href="#">
                            <button class="btn btn-outline-dark p-3 my-2 rounded-2 border-1">
                    Ajouter au panier
                  </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="prod">
                <div class="card shadow" style="width: 18rem">
                    <img clas="card-img-top" src="Assets/images/babouche-gravee-noire.jpg" alt=" " />
                    <div class="card-body text-center">
                        <h5>Babouche noire femme</h5>
                        <p>
                            Babouche femme noire Babouche originale de cuire à 100% décorer en blanc
                        </p>
                        <p>
                            Categorie: Vêtements et accessoires PRIX:
                            <span class="price">DH200.00</span>
                        </p>
                        <a href="#">
                            <button class="btn btn-outline-dark p-3 my-2 rounded-2 border-1">
                    Ajouter au panier
                  </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="Assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>