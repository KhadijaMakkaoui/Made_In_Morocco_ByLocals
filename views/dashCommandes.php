
<div class="container table-responsive"> 
<caption>
  <h1 class="mb-4">Commandes</h1> </caption>
<table class="table table-bordered table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">id</th>
      <th scope="col">Date</th>
      <th scope="col">Quantité</th>
      <th scope="col">Description</th>
      <th scope="col">Type</th>

    </tr>
  </thead>
  <tbody>
      <?php foreach($commandes as $commande) : ?>
      <tr>
          <td><?php echo $commande['id']; ?></td>
          <td><?php echo $commande['date']; ?></td>
          <td><?php echo $commande['quantite']; ?></td>
          <td><?php echo $commande['description']; ?></td>
          <td><?php echo $commande['type']; ?></td>
          <td>
              <a class="link-secondary" href="./updateClass?id=<?php echo $produit['id']; ?>"><i class="bi bi-pencil-square"></i></a>
              <a class="link-secondary" href="./delete?id=<?php echo $produit['id']; ?>"><i class="bi bi-trash"></i></a> 
          </td>
      </tr>
      <?php endforeach; ?>
  </tbody>
</table>
</div>