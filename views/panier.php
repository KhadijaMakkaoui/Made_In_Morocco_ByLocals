
    <main class="panier ">
        <!-- heading -->
        <div class="section-image image-head text-center mb-5">
            <div class="mask-c">
                <div class="d-flex justify-content-center align-items-center h-100">
                    <div class="text-white ">
                        <h1 class=" title">mon panier</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mx-4">
            <!-- Vos selections -->
            <div class="vos-selct col-lg-8">
                <h3 class="fw-light">VOS SELECTIONS</h3>
                <hr>
                 <?php foreach($panier as $p): 
                            $obj_product->select($p['fk_produit']);
                            $product=$obj_product->dataList;
                            $obj_image->select($product['fk_image']);
                            $img=$obj_image->dataList;
                           ?>
                <!-- article -->
                <div class="article row mb-4">
                    <!-- image -->
                    <div class="col-sm-12 col-md-4 mt-3" style=" width: 18rem; ">
                        <img class="img-fluid rounded" src="/files/<?php echo $img['chemin']?>" alt="">
                    </div>
                    <!-- Deatails cart -->
                    <div class="card border-0 col-sm-12 col-md-8 mt-3 " style="width:20rem">
                        <div class="card-body text-break">
                            <h5 class="card-title"><?php echo $product['titre'] ?></h5>
                            <div class="card-text">
                                <p> 
                                <?php echo $product['description'] ?>
                                </p>
                                <div class="qte">
                                    <span>Quantité </span>
                                    <!-- quantite commander -->
                                    <input type="number" readonly="true" min="1" max="<?php echo  $product['quantite'] ?>" id="quantite_panier" value="<?php echo  $p['quantite'] ?>"/>
                                </div>
                                <div>Prix
                                    <span class="price"><?php echo $product['prix'] ?> DH</span>
                                </div>
                            </div>
                            <div>
                                <span>Subtotal : </span>
                                <?php echo $total=(int)$p['quantite']*(float)$product['prix'] ?> DH 
                                <?php $total+= (int)$p['quantite']*(float)$product['prix'] ?>
                            </div>
                            <a href="/delete?id=<?php echo $p['id'] ?>" class="card-link me-2">Supprimer </a>
                            <!-- <a href="/productDetails?id=<?php #echo $product['id']?>" class="card-link">Modifier</a> -->
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <!-- Recap de la commande -->
            <form method="post" class=" text-break fourth-color shadow fw-light p-3 col-lg-4 " style=" height: 20rem; ">
                <h5 class="title ">récapitulatif de la commande</h5>
                <hr class="m-1">
                <div class="d-flex flex-row justify-content-between">
                    <div class=" ">Total</div>
                    <div class=""><?php echo $total ?> DH</span>
                    </div>
                </div>
                <div class="d-flex flex-row justify-content-between ">
                    <div class=" ">Livraison</div>
                    <div class=" ">Gratuite</div>
                </div>
                <div class="d-flex flex-row justify-content-between ">
                    <div class=" ">Total séstimé</div>
                    <div class="fw-bold fs-4 ">
                        <?php echo $total ?> <span>DH</span>
                        <input type="hidden" name="" value="<?php echo $total ?> ">
                    </div>
                </div>
                <!-- Details -->
                <div class=" ">
                    <h5 class="fw-light ">DETAILS</h5>
                    <hr>
                    <div class=" ">
                        Vous serez débité au moment de l'expédition. S'il s'agit d'un achat personnalisé ou sur commande, vous serez facturé au moment de l'achat.
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    <button class="btn btn-outline-dark ">COMMANDER</button>
                </div>
            </div>
        </div>
    </main>
<script src="/Assets/js/produitDetails.js"></script>

