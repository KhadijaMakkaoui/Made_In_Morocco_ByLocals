<?php use app\core\Application;
if(Application::isGuest()): ?>
    <?php header("Location: /login") ?>
  <?php endif ?>
<div class="container table-responsive"> 
<caption>
  <h1 class="mb-4">Avis</h1> </caption>
<table class="table  table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nombre étoile</th>
      <th scope="col">Commataire</th>

    </tr>
  </thead>
  <tbody>
      <?php foreach($avis as $a) : ?>
      <tr>
          <td><?php echo $a['id']; ?></td>
          <td><?php echo $a['nb_etoile_avis']; ?></td>
          <td><?php echo $a['commentaire_avis']; ?></td>
          <td>
              <a class="link-secondary" href="./deleteAvis?id=<?php echo $a['id']; ?>"><i class="bi bi-trash"></i></a> 
          </td>
      </tr>
      <?php endforeach; ?>
  </tbody>
</table>
</div>