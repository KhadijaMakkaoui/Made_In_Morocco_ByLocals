

<div class="container d-flex justify-content-between">
    <h1 class="mb-4 ">Produits</h1>
    <a href="/addProduct" class="btn btn-outline-dark  h-50">
        <i class="bi bi-plus-lg"></i> Nouveau produit</a>

</div>
<div class="container table-responsive">

    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Image</th>
                <th scope="col">Titre</th>
                <th scope="col">Description</th>
                <th scope="col">Quantité en stock</th>
                <th scope="col">Prix</th>
                <th scope="col">Sous categorie</th>
                <th scope="col">Opérations</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($produits as $produit) : ?>
                <?php 
                    $obj_s_categ->select($produit['fk_s_categorie']); 
                    $libelle=$obj_s_categ->dataList['libelle']; 
                    // var_dump($produit['fk_image']);
                    // exit;
                    $fk_img=(int) $produit['fk_image'];
                    $obj_image->select($fk_img);
                   
                    // $chemin=$obj_image->dataList['chemin'];  
                    ?>
            <tr>
                <td>
                    <?php echo $produit['id']; ?>
                </td>
                <td>
                    <img src="/files/<?php echo $obj_image->dataList['chemin'] ?>" alt="<?php echo $obj_image->dataList['chemin'] ?>" class="" width="70px" />
                </td>
                <td>
                    <?php echo $produit['titre']; ?>
                </td>
                <td>
                    <?php echo $produit['description']; ?>
                </td>
                <td>
                    <?php echo $produit['quantite']; ?>
                </td>
                <td>
                    <?php echo $produit['prix']; ?> DH
                </td>
                <td>
                    <?php echo $libelle; ?>
                </td>
                
                <td>
                    <a class="link-secondary" href="./updateProduct?id=<?php echo $produit['id']; ?>"><i class="bi bi-pencil-square"></i></a>
                    <a class="link-secondary" href="./deleteProduct?id=<?php echo $produit['id']; ?>"><i class="bi bi-trash"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>