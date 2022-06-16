<main class="categories">
    <!-- nos selections -->           
        <h1 class="title py-5">
        <?php echo $categorie['libelle']; ?>
        </h1>
        

    <div class="selections">
        <div class="">
            <?php 
            // echo '<pre>';
            // var_dump($produits);echo'</pre>';
            $list_produits="";
            ?>
            <?php foreach ($distinct_s_cat as $s_cat):?>
                  
                <div class="selction ">
                    <div class="mb-3">
                        <span class="col title"><?php echo $s_cat['libelle'] ?></span>
                        <!-- <span class="text-secondary col">Categorie: <a href="" class="link-secondary">maison et
                                décoration</a> </span> -->
                    </div>
                    <div class="d-flex flex-row flex-nowrap overflow-auto justify-content-between gap-5">
                    
                        <div class="">
                            <?php
                            $list_produits=$produits->selectProductsBySCategory($s_cat['id']);
                            // var_dump($produits);
                            // exit; 
                            foreach ($list_produits as $key => $value):
                            //     echo '<pre>';
                            // var_dump($value);echo '<pre />';
                             
                            ?>  
                            
                                <a href="/productDetails?id=<?php echo  $value['id'] ?>" class="link-dark text-decoration-none">
                                    <div class="card first-color border-white shadow" style="width: 20rem;">
                                        <img class="card-img-top" src="/Assets/images/pouf.jpg" alt=" ">
                                        <div class="card-body text-center bg-white">
                                            <h5> <?php echo  $value['titre'] ?></h5>
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
            <?php endforeach;?>

</main>
