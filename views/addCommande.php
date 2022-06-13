<h1 class="title mb-5">Ajouter une commande</h1>
<form class="" method="post" action="">

    <div class="">
        <!-- Number input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="form6Example3">Quantité</label>
            <input type="number" name="quantite" id="form6Example3" min="1" class="form-control" placeholder="Quantité à commander" />
        </div>
        <!-- select categories -->
        <div class="mb-4">
            <label class="form-label" for="form6Example3">ID du client</label>

            <select class="form-select" name="fk_client" aria-label="Default select example">
              <option>-Veuiller selectionner un ID-</option>
              <?php foreach ($client as $c):?>
              <option value="<?php echo $c['id'] ?>"><?php echo $c['id'] ?></option>
              <?php endforeach;?>
            </select>
        </div>
        <!-- select Sous categories -->
        <div class="mb-4">
            <label class="form-label" for="form6Example3">ID du produit</label>
            <select class="form-select" name="fk_produit" aria-label="Default select example">
            <option>-Veuiller selectionner un ID-</option>
            <?php foreach ($product as $p):?>
              <option value="<?php echo $p['id'] ?>"><?php echo $p['id'] ?></option>
              <?php endforeach;?>
          </select>
        </div>


        <!-- Description input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="form6Example7">Description</label>
            <textarea class="form-control" name="description" id="form6Example7" rows="4 " placeholder="Description du produit"></textarea>
        </div>
        <input type="hidden" name="fk_fabriquant" value="1">
        <!-- Submit button -->
        <button type="submit" class="btn btn-outline-dark w-100 mb-4">
           Ajouter
        </button>
    </div>
</form>