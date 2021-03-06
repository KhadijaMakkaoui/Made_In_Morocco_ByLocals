<?php var_dump($_SESSION['client_id']); ?>
    <main class="categories ">
        <!-- heading -->
        <div class="section-image image-head text-center ">
            <div class="mask">
                <div class="d-flex justify-content-center align-items-center h-100">
                    <div class="text-white">
                        <h1 class=" title ">découvrir nos catégories</h1>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- recherche par région -->
        <div class="m-5">
            <h2 class="title  m-5">rechercher par région</h2>
            <div class="d-flex flex-row flex-nowrap overflow-auto justify-content-between gap-5">
                <div class="">
                    <a href="index.html" class="link-dark text-decoration-none">
                        <div class="card first-color border-white" style="width: 18rem;">
                            <img class="card-img-top" src=" /Assets/images/marrakesh.jpg" alt=" ">
                            <div class="card-body text-center">
                                <h6 class="card-title title">MARRAKESH-SAFI</h6>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="">
                    <a href="index.html" class="link-dark text-decoration-none">
                        <div class="card border-white" style="width: 18rem;">
                            <img class="card-img-top" src="/Assets/images/casa.jpg" alt=" ">
                            <div class="card-body text-center">
                                <h6 class="card-title title">casablanca-settat</h6>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="">
                    <a href="index.html" class="link-dark text-decoration-none">
                        <div class="card border-white" style="width: 18rem;">
                            <img class="card-img-top" src="/Assets/images/tour-hassan-rabat-morocco-by-migel.jpg" alt=" ">
                            <div class="card-body text-center">
                                <h6 class="card-title title">rabat-sale-kenitra</h6>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="">
                    <a href="index.html" class="link-dark text-decoration-none">
                        <div class="card border-white " style="width: 18rem;">
                            <img class="card-img-top" src=" /Assets/images/agadir.jpg" alt=" ">
                            <div class="card-body text-center">
                                <h6 class="card-title title">souss-massa</h6>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="">
                    <a href="index.html" class="link-dark text-decoration-none">
                        <div class="card border-white" style="width: 18rem;">
                            <img class="card-img-top" src=" /Assets/images/marrakesh.jpg" alt=" ">
                            <div class="card-body text-center">
                                <h6 class="card-title title">MARRAKESH-SAFI</h6>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- rechercher par categorie -->
        <div class="m-5 section-categ">
            <h2 class="title mb-4">rechercher par catégorie</h2>
            <div class="row justify-content-center recherche-categ">
                <div class="row w-75 gap-1 mb-1 justify-content-around" style="height:18rem">
                    <a href="/productsByCat?categorie=1" class="card categ col-sm-12 col-md-5" style="text-decoration:none !important;background-image: url( /Assets/images/maison.jpg);background-position: center;background-size: cover;">
                        <div class="card-body text-light mask-c align-bottom">
                            <h3 class="text-uppercase ">Maison et décoration</h3>
                        </div>
                    </a>
                    <a href="/productsByCat?categorie=2" class="card categ col-sm-12 col-md-5" style="text-decoration:none !important;background-image: url( /Assets/images/accessoires.jpg);">
                        <div  class="card-body text-light mask-c align-bottom">
                            <h3 class="text-uppercase">Vêtements et accessoires</h3>
                        </div>
                    </a>
                </div>
                <div class="row w-75 gap-1 mb-4 justify-content-around" style="height:18rem">
                    <a href="/productsByCat?categorie=3" class="card categ col-sm-12 col-md-5" style="text-decoration:none !important;background-image: url( /Assets/images/epices.jpg);">
                        <div  class="card-body text-light mask-c align-bottom">
                            <h3 class="text-uppercase">Herbes, épices et fruit secs</h3>
                        </div>
                    </a>
                    <a href="/productsByCat?categorie=4" class="card categ col-sm-12 col-md-5" style="text-decoration:none !important;background-image: url( /Assets/images/cosmetique.jpg);">
                        <div  class="card-body text-light mask-c align-bottom">
                            <h3 class="text-uppercase">Santé et cosmétique</h3>
                        </div>
                    </a>
                </div>
            </div>

        </div>
        <!-- nos selections -->
        <div class="m-5 selections">
            <h1 class="title my-5">NOS séléction</h1>
          
            <?php
                            
                foreach ($products as $value):
                $fk_img=(int) $value['fk_image'];
                $obj_image->select($fk_img);
                $cat=$obj_product->getCategoryById( $value['fk_s_categorie']);
                ?>  
                
                    <a href="/productDetails?id=<?php echo  $value['id'] ?>&cat=<?php echo $cat['id']; ?>" class="link-dark text-decoration-none">
                        <div class="card first-color border-white shadow" style="width: 20rem;">
                        <img class="card-img-top" src="/files/<?php echo $obj_image->dataList['chemin'] ?>" alt="<?php echo $obj_image->dataList['chemin'] ?>" class="" width="70px" />

                        <!-- <img class="card-img-top" src="/Assets/images/pouf.jpg" alt=" "> -->
                            <div class="card-body text-center bg-white">
                                <h5> <?php echo  $value['titre'] ?></h5>
                                <p class="description"> <?php echo $value['description'] ?></p>
                                <p class="price"> <?php echo $value['prix'] ?><span>DH</span></p>
                                </p>
                                <a href="/panier?id= <?php echo $value['id'] ?>">
                                    <button class="btn btn-outline-dark rounded-2  border-1">Ajouter au
                                        panier</button>
                                </a>
                            </div>

                        </div>
                    </a>
                </div>
                <?php endforeach;?>
            </div>
                        
        </div>
 
            <!-- <div class="">
                <div class="selction ">
                    <div class="mb-3">
                        <span class="col title">Notre séléction des <span>pouffs</span></span>
                        <span class="text-secondary col">Categorie: <a href="" class="link-secondary">maison et
                                décoration</a> </span>
                    </div>
                    <div class="d-flex flex-row flex-nowrap overflow-auto justify-content-between gap-5">
                        <div class="">
                            <a href="index.html" class="link-dark text-decoration-none">
                                <div class="card first-color border-white" style="width: 20rem;">
                                    <img class="card-img-top" src=" /Assets/images/pouf.jpg" alt=" ">
                                    <div class="card-body text-center bg-white">
                                        <h5>Pouf en cuir </h5>
                                        <p class="price">200.00 <span>DH</span></p>
                                        </p>
                                        <a href="#">
                                            <button class="btn btn-outline-dark rounded-2  border-1">Ajouter au
                                                panier</button>
                                        </a>
                                    </div>

                                </div>
                            </a>
                        </div>
                        <div class="">
                            <a href="index.html" class="link-dark text-decoration-none">
                                <div class="card first-color border-white" style="width: 20rem;">
                                    <img class="card-img-top" src=" /Assets/images/tapis-fes.jpg" alt=" ">
                                    <div class="card-body text-center bg-white">
                                        <h5>Pouf en cuir </h5>
                                        <p class="price">200.00 <span>DH</span></p>
                                        </p>
                                        <a href="#">
                                            <button class="btn btn-outline-dark rounded-2  border-1">Ajouter au
                                                panier</button>
                                        </a>
                                    </div>

                                </div>
                            </a>
                        </div>
                        <div class="">
                            <a href="index.html" class="link-dark text-decoration-none">
                                <div class="card first-color border-white" style="width: 20rem;">
                                    <img class="card-img-top" src=" /Assets/images/tapis-fes.jpg" alt=" ">
                                    <div class="card-body text-center bg-white">
                                        <h5>Pouf en cuir </h5>
                                        <p class="price">200.00 <span>DH</span></p>
                                        </p>
                                        <a href="#">
                                            <button class="btn btn-outline-dark rounded-2  border-1">Ajouter au
                                                panier</button>
                                        </a>
                                    </div>

                                </div>
                            </a>
                        </div>
                        <div class="">
                            <a href="index.html" class="link-dark text-decoration-none">
                                <div class="card first-color border-white" style="width: 20rem;">
                                    <img class="card-img-top" src=" /Assets/images/tapis-fes.jpg" alt=" ">
                                    <div class="card-body text-center bg-white">
                                        <h5>Pouf en cuir </h5>
                                        <p class="price">200.00 <span>DH</span></p>
                                        </p>
                                        <a href="#">
                                            <button class="btn btn-outline-dark rounded-2  border-1">Ajouter au
                                                panier</button>
                                        </a>
                                    </div>

                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="selction my-5">
                    <div class="mb-3">
                        <span class="col title">Notre séléction des <span>pouffs</span></span>
                        <span class="text-secondary col">Categorie: <a href="" class="link-secondary">maison et
                                décoration</a> </span>

                    </div>
                    <div class="d-flex flex-row flex-nowrap overflow-auto justify-content-between gap-5">
                        <div class="">
                            <a href="index.html" class="link-dark text-decoration-none">
                                <div class="card first-color border-white" style="width: 20rem;">
                                    <img class="card-img-top" src=" /Assets/images/pouf.jpg" alt=" ">
                                    <div class="card-body text-center bg-white">
                                        <h5>Pouf en cuir </h5>
                                        <p class="price">200.00 <span>DH</span></p>
                                        </p>
                                        <a href="#">
                                            <button class="btn btn-outline-dark rounded-2  border-1">Ajouter au
                                                panier</button>
                                        </a>
                                    </div>

                                </div>
                            </a>
                        </div>
                        <div class="">
                            <a href="index.html" class="link-dark text-decoration-none">
                                <div class="card first-color border-white" style="width: 20rem;">
                                    <img class="card-img-top" src=" /Assets/images/tapis-fes.jpg" alt=" ">
                                    <div class="card-body text-center bg-white">
                                        <h5>Pouf en cuir </h5>
                                        <p class="price">200.00 <span>DH</span></p>
                                        </p>
                                        <a href="#">
                                            <button class="btn btn-outline-dark rounded-2  border-1">Ajouter au
                                                panier</button>
                                        </a>
                                    </div>

                                </div>
                            </a>
                        </div>
                        <div class="">
                            <a href="index.html" class="link-dark text-decoration-none">
                                <div class="card first-color border-white" style="width: 20rem;">
                                    <img class="card-img-top" src=" /Assets/images/tapis-fes.jpg" alt=" ">
                                    <div class="card-body text-center bg-white">
                                        <h5>Pouf en cuir </h5>
                                        <p class="price">200.00 <span>DH</span></p>
                                        </p>
                                        <a href="#">
                                            <button class="btn btn-outline-dark rounded-2  border-1">Ajouter au
                                                panier</button>
                                        </a>
                                    </div>

                                </div>
                            </a>
                        </div>
                        <div class="">
                            <a href="index.html" class="link-dark text-decoration-none">
                                <div class="card first-color border-white" style="width: 20rem;">
                                    <img class="card-img-top" src=" /Assets/images/tapis-fes.jpg" alt=" ">
                                    <div class="card-body text-center bg-white">
                                        <h5>Pouf en cuir </h5>
                                        <p class="price">200.00 <span>DH</span></p>
                                        </p>
                                        <a href="#">
                                            <button class="btn btn-outline-dark rounded-2  border-1">Ajouter au
                                                panier</button>
                                        </a>
                                    </div>

                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="selction">
                    <div class="mb-3">
                        <span class="col title">Notre séléction des <span>pouffs</span></span>
                        <span class="text-secondary col">Categorie: <a href="" class="link-secondary">maison et
                                décoration</a> </span>
                    </div>
                    <div class="d-flex flex-row flex-nowrap overflow-auto justify-content-between gap-5">
                        <div class="">
                            <a href="index.html" class="link-dark text-decoration-none">
                                <div class="card first-color border-white" style="width: 20rem;">
                                    <img class="card-img-top" src=" /Assets/images/pouf.jpg" alt=" ">
                                    <div class="card-body text-center bg-white">
                                        <h5>Pouf en cuir </h5>
                                        <p class="price">200.00 <span>DH</span></p>
                                        </p>
                                        <a href="#">
                                            <button class="btn btn-outline-dark rounded-2  border-1">Ajouter au
                                                panier</button>
                                        </a>
                                    </div>

                                </div>
                            </a>
                        </div>
                        <div class="">
                            <a href="index.html" class="link-dark text-decoration-none">
                                <div class="card first-color border-white" style="width: 20rem;">
                                    <img class="card-img-top" src=" /Assets/images/tapis-fes.jpg" alt=" ">
                                    <div class="card-body text-center bg-white">
                                        <h5>Pouf en cuir </h5>
                                        <p class="price">200.00 <span>DH</span></p>
                                        </p>
                                        <a href="#">
                                            <button class="btn btn-outline-dark rounded-2  border-1">Ajouter au
                                                panier</button>
                                        </a>
                                    </div>

                                </div>
                            </a>
                        </div>
                        <div class="">
                            <a href="index.html" class="link-dark text-decoration-none">
                                <div class="card first-color border-white" style="width: 20rem;">
                                    <img class="card-img-top" src=" /Assets/images/tapis-fes.jpg" alt=" ">
                                    <div class="card-body text-center bg-white">
                                        <h5>Pouf en cuir </h5>
                                        <p class="price">200.00 <span>DH</span></p>
                                        </p>
                                        <a href="#">
                                            <button class="btn btn-outline-dark rounded-2  border-1">Ajouter au
                                                panier</button>
                                        </a>
                                    </div>

                                </div>
                            </a>
                        </div>
                        <div class="">
                            <a href="index.html" class="link-dark text-decoration-none">
                                <div class="card first-color border-white" style="width: 20rem;">
                                    <img class="card-img-top" src=" /Assets/images/tapis-fes.jpg" alt=" ">
                                    <div class="card-body text-center bg-white">
                                        <h5>Pouf en cuir </h5>
                                        <p class="price">200.00 <span>DH</span></p>
                                        </p>
                                        <a href="#">
                                            <button class="btn btn-outline-dark rounded-2  border-1">Ajouter au
                                                panier</button>
                                        </a>
                                    </div>

                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </main>
  
