<div class="d-flex justify-content-between">
    <h1 class="mb-4 ">Produits</h1>
    <a href="/productAdd" class="btn btn-outline-dark  h-50">
        <i class="bi bi-plus-lg"></i> Nouveau produit</a>

</div>
<div class="table-responsive">

    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Image</th>
                <th scope="col">Titre</th>
                <th scope="col">Description</th>
                <th scope="col">Quantité en stock</th>
                <th scope="col">Prix</th>
                <th scope="col">Sous categorie</th>
                <th scope="col">Categorie</th>
                <th scope="col">Opérations</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($produits as $produit) : ?>
            <tr>
                <td>
                    <?php echo $produit['id']; ?>
                </td>
                <td>
                    <img src="../Assets/images/<?php echo $image['chemin'] ?>" id="" class="" width="100px" />
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
                    <?php echo $produit['prix']; ?>
                </td>
                <td>
                    <?php echo $s_categorie['libelle']; ?>
                </td>
                <td>
                    <?php echo $categorie['libelle']; ?>
                </td>
                <td>
                    <a class="link-secondary" href="./updateClass?id=<?php echo $produit['id']; ?>"><i class="bi bi-pencil-square"></i></a>
                    <a class="link-secondary" href="./delete?id=<?php echo $produit['id']; ?>"><i class="bi bi-trash"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>