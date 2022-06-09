
<div class="container table-responsive"> 
<caption>
  <h1 class="mb-4">Produits</h1> </caption>
<table class="table table-bordered table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">id</th>
      <th scope="col">Titre</th>
      <th scope="col">Description</th>
      <th scope="col">Quantité en stock</th>
      <th scope="col">Prix</th>
      <th scope="col">Disponibilité</th>
      <th scope="col">Opérations</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach($produits as $produit) : ?>
      <tr>
          <td><?php echo $produit['id']; ?></td>
          <td><?php echo $produit['titre_produit']; ?></td>
          <td><?php echo $produit['description_produit']; ?></td>
          <td><?php echo $produit['quantite_produit']; ?></td>
          <td><?php echo $produit['prix_produit']; ?></td>
          <td><?php echo $produit['dispo_produit']; ?></td>
          <td>
              <a class="link-secondary" href="./updateClass?id=<?php echo $produit['id']; ?>"><i class="bi bi-pencil-square"></i></a>
              <a class="link-secondary" href="./delete?id=<?php echo $produit['id']; ?>"><i class="bi bi-trash"></i></a> 
          </td>
      </tr>
      <?php endforeach; ?>
  </tbody>
</table>
</div>