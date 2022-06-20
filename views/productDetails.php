<?php #var_dump($product);exit;
$fab=  $fabriquant->select($product['fk_fabriquant']);
$fab=  $fabriquant->dataList;
// var_dump($fab);exit;
$fab_data->select($fab['fk_account']);
// var_dump($fab_data); exit;
$data_fab=$fab_data->dataList;
//img produit
$fk_img=(int) $product['fk_image'];
$obj_image->select($fk_img);
$img=$obj_image->dataList;


//img fabriquant
$fk_img=(int) $data_fab['fk_image'];
$obj_image->select($fk_img);
$fab_img=$obj_image->dataList;

$reg=$region->GetRegionByVille($data_fab['fk_ville']);

// var_dump($data_fab);
?>
<div class="row product-Page">
    <!--product details-->
    <div class="my-5">
        <div class="card">
            <div class="row">
                <div class="col-md-6 border-end">
                    <div class="d-flex flex-column justify-content-center">
                        <div class="main_image">
                            <img src="/files/<?php echo $img['chemin']?>" id="main_product_image" class="w-100" alt="<?php echo $img['chemin']?>" />
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <form method="post" class="p-3" action="">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="title"><?php echo  $product['titre'] ?></h3>
                        </div>
                        
                        <div class="price"><?php echo  $product['prix'] ?> DH</div>
                        <!-- etoiles -->
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
                            <p><?php echo  $product['description'] ?>
                            </p>
                        </div>
                        <div class="row my-5 gap-1">
                            <!-- Quantité -->
                            <div class="counter d-inline-flex col-lg-4 justify-content-center">
                                <a class="down btns btn btn-dark" onClick="decreaseCount(event, this)"> 
                                        -                   
                                        </a>
                                <span class="px-2 bg" >1</span>
                                <a class="up btns btn btn-dark" onClick="increaseCount(event, this)">                     
                                      +                    
                                    </a>
                                    <input type="hidden" id="hide_quantite" name="quantite" value="1"/>
                            </div>
                            <input type="hidden" id="" name="fk_produit" value="<?php echo $_GET['id'] ?>"/>
                            <input type="text" id="" name="fk_client" value="<?php echo $_SESSION['client_id'] ?>"/>
 
                            <!-- btn panier -->
                            <!-- <a href="/panier?id=<?php echo  $product['id'] ?>&cat=<?php echo  $_GET['cat'] ?>" class="btn btn-outline-dark title col-lg-7">
                                ajouter au panier
                            </a> -->
                            <input type="submit" value="ajouter au panier" class="btn btn-outline-dark title col-lg-7" />

                        </div>

                        <div class="">
                            <a href="/wishList?id= <?php echo  $product['id'] ?>&cat=<?php echo  $_GET['cat'] ?>" class="btn btn-outline-dark w-100 title">
                                <i class="bi bi-heart"></i>
                                Ajouter à la liste des souhaits
                            </a>
                        </div>
                        <div class="short-desc mt-4">

                            <div class="">
                                <span class="fw-bold">En stock : </span>
                                <span class="text-secondary" id="quantite_produit"> <?php echo  $product['quantite'] ?> </span>
                            </div>
                            <div class="">
                                <span class="fw-bold">Categorie : </span>
                                <span class="text-secondary"> <?php 
                                $categorie->select($_GET['cat']);
                                $c=$categorie->dataList;
                                echo  $c['libelle'] 
                                ?> </span>

                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--  details livraison and description -->
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
        <?php echo  $product['description'] ?>
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
            src="/files/<?php echo $fab_img['chemin']?>"
            alt="avatar"
            class="rounded-circle img-fluid"
            style="width: 150px; height: 150px"
            />
            <h5 class="my-3 title fw-normal"><?php echo $data_fab['prenom'].' '.$data_fab['nom'] ?></h5>
            <p class="mb-1"><?php echo $fab['profession'] ?></p>
            <p class="mb-4"><?php echo $reg['nom'] ?></p>
            <p class="text-secondary mb-4 text-break">
            <?php echo $fab['description'] ?>
            </p>

            <div class="d-flex justify-content-center mb-2">
            <a href="/profileVendeur?<?php echo $fab['id'] ?>" class="btn btn-outline-dark ms-1">
                SAVOIR PLUS
            </a>
            </div>
        </div>
        </div>
        <div class="text-center mb-2">
        <p>Êtes-vous un vendeur?</p>
        <a href="/registerVendeur" class="link-color">
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
<?php  $p_similaire=$obj_product->selectProductsByCategory($_GET['cat']);
?>
<div class="produit-pop">
    <h2 class="title m-5">produits similaires</h2>
    <div class="d-flex flex-row flex-nowrap overflow-auto justify-content-between gap-5">
    <?php 
    $i=0;
    foreach ($p_similaire as $p):
        $obj_image->select($p['fk_image']);
        $img=$obj_image->dataList;?>  
    
        <?php if($i<7 && $p['id']!=$_GET['id']):?>    

        <div class="prod">
                <a href="/productDetails?id=<?php echo $p['id']?>&cat=<?php echo  $_GET['cat']?>" class="card shadow link-dark text-decoration-none" style="width: 18rem">
                    <img clas="card-img-top" src="/files/<?php echo $img['chemin']?>" alt=" " />
                    <div class="card-body text-center">
                        <h5><?php echo $p['titre']?></h5>
                        <p>
                        <?php echo $p['description']?>                        </p>
                        <p>
                            Categorie: <?php echo $c['libelle']?> PRIX:
                            <span class="price"><?php echo $p['prix']?> DH</span>
                        </p>
                        <a href="/panier?id=<?php echo $p['id']?>&cat=<?php echo  $_GET['cat'] ?>">
                            <button class="btn btn-outline-dark p-3 my-2 rounded-2 border-1">
                    Ajouter au panier
                    </button>
                        </a>
                    </div>
                </a>
            </div>
        </div>
    
        <?php endif;?>    
        <?php $i++?>    

    <?php endforeach?>    

</div>
</div>
<script src="/Assets/js/produitDetails.js"></script>
