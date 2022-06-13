<div class="d-flex justify-content-between">
    <h1 class="mb-4 ">Commandes</h1>
    <a href="/addCommande" class="btn btn-outline-dark  h-50">
        <i class="bi bi-plus-lg"></i> Nouvelle commande</a>
</div>
<div class="container table-responsive"> 
<table class="table table-bordered table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">id</th>
      <th scope="col">Date</th>
      <th scope="col">Quantité</th>
      <th scope="col">Description</th>
      <th scope="col">ID produit</th>
      <th scope="col">ID client</th>

    </tr>
  </thead>
  <tbody>
      <?php foreach($commandes as $commande) : ?>
      <tr>
          <td><?php echo $commande['id']; ?></td>
          <td><?php echo $commande['date']; ?></td>
          <td><?php echo $commande['quantite']; ?></td>
          <td><?php echo $commande['description']; ?></td>
          <td><?php echo $commande['fk_produit']; ?></td>
          <td><?php echo $commande['fk_client']; ?></td>
          <td>
              <a class="link-secondary" href="./updateCommande?id=<?php echo $commande['id']; ?>"><i class="bi bi-pencil-square"></i></a>
              <a class="link-secondary" href="./delete?id=<?php echo $commande['id']; ?>"><i class="bi bi-trash"></i></a> 
          </td>
      </tr>
      <?php endforeach; ?>
  </tbody>
</table>
</div>