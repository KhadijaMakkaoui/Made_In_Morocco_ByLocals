<h1 class="title mb-5">Modifier une commande</h1>
<form class="" method="post" action="">

    <div class="">
        <!-- Number input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="form6Example3">id</label>
            <input type="number" value="<?php echo $model->id; ?>" name="id" id="form6Example3" min="1" class="form-control"/>
        </div>
        <!-- Number input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="form6Example3">Quantité</label>
            <input type="number" value="<?php echo $model->quantite; ?>" name="quantite" id="form6Example3" min="1" class="form-control" placeholder="Quantité à commander" />
        </div>
        <!-- select categories -->
        <div class="mb-4">
            <label class="form-label" for="form6Example3">ID du client</label>

            <select class="form-select" name="fk_client" aria-label="Default select example">
            <option value="<?php echo $model->fk_client; ?>"> <?php echo $model->fk_client; ?></option>
                <?php foreach ($client as $c):?>
                    <?php if ($model->fk_client != $c['id']):?>
                        <option value="<?php echo $c['id'] ?>"><?php echo $c['id'] ?></option>
                    <?php endif;?>              
                <?php endforeach;?>
            </select>
        </div>
        <!-- select Sous categories -->
        <div class="mb-4">
            <label class="form-label" for="form6Example3">ID du produit</label>
            <select class="form-select" name="fk_produit" aria-label="Default select example">
            <option value="<?php echo $model->fk_produit; ?>"> <?php echo $model->fk_produit; ?></option>
            <?php foreach ($product as $p):?>
                <?php if ($model->fk_produit != $p['id']):?>
                    <option value="<?php echo $p['id'] ?>"><?php echo $p['id'] ?></option>
                <?php endif;?>
            <?php endforeach;?>
          </select>
        </div>


        <!-- Description input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="form6Example7">Description</label>
            <textarea class="form-control" name="description" id="form6Example7" rows="4 " placeholder="Description du produit">
                <?php echo $model->description; ?>
            </textarea>
        </div>
        <input type="hidden" name="fk_fabriquant" value="1">
        <!-- Submit button -->
        <button type="submit" class="btn btn-outline-dark w-100 mb-4">
           Mettre à jour
        </button>
    </div>
</form>