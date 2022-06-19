<?php  #var_dump($p_s_cat['id']);exit; ?>
<h1 class="title mb-5">Modifier un produit</h1>
<div class="col">
    <div class="mb-3">
        <p class="fs-6 text-secondary text-uppercase">étape 1 : Modifier l'image de votre produit</p>
        <hr/>
    </div>
    <form enctype="multipart/form-data" class="" method="post" action="">

        <!-- <div class="card " style="width: 18rem"> -->
            <!-- <img src="files/add-product.png<?php #echo $image['chemin']?>" class="card-img-top" alt="image du produit" /> -->
            <!-- <div class="card-body text-center">
                <a href="#" class="btn btn-dark">Télécharger une image</a>
                <input type="file" name="chemin" id="" class="w-100" accept="image/png,image/gif,image/jpeg,image/svg,image/webp" />

            </div> -->

        <!-- </div> -->
        <input type="file" name="chemin" id="" class="w-100 " accept="image/png,image/gif,image/jpeg,image/svg,image/webp" required />
        <div class="mt-4 text-center">
            <input type="submit" name="submit_img" class="btn btn-outline-dark  w-50 " id="" value="Modifier">
        </div>
    </form>
</div>

<div class="col mt-5">
<div class="mb-3">
        <p class="fs-6 text-secondary text-uppercase">étape 2 : Modifier les details de votre produit</p>
        <hr/>
    </div>
    <form class="row" method="post" action="">

    <!-- Text input -->
    <div class="form-outline mb-4">
            <label class="form-label" for="form6Example3">Titre</label>
            <input type="text" value="<?php echo $produit['titre'] ?>" name="titre" id="form6Example3" class="form-control" placeholder="Titre du produit" />
        </div>

    <!-- Text input -->
    <div class="form-outline mb-4">
            <label class="form-label" for="form6Example3">Prix</label>
            <input type="number" value="<?php echo $produit['prix'] ?>" name="prix" id="form6Example3" class="form-control" placeholder="Prix du produit" min="0" />
        </div>
    <!-- select Sous categories -->
    <div class="mb-4">
            <label class="form-label" for="form6Example3">Catégorie</label>
            <select class="form-select" name="fk_s_categorie" aria-label="Default select example">
            <option selected value="<?php echo $p_s_cat['id'] ?>"><?php echo $p_s_cat['libelle'] ?></option>
            <?php foreach ($s_categories as $cat):
              if($cat['id']!=$p_s_cat['id']):?>
              <option value="<?php echo $cat['id'] ?>"><?php echo $cat['libelle'] ?></option>
              <?php endif;?>
              <?php endforeach;?>
          </select>
        </div>
    <!-- Number input -->
    <div class="form-outline mb-4">
            <label class="form-label" for="form6Example6">Quantité disponible</label>
            <input type="number" name="quantite" value="<?php echo $produit['quantite'] ?>" id="form6Example6" class="form-control" placeholder="Quantité disponible du produit" min="0" />
        </div>

    <!-- Description input -->
    <div class="form-outline mb-4">
            <label class="form-label" for="form6Example7">Description</label>
            <textarea class="form-control" name="description" id="form6Example7" rows="4 " placeholder="Description du produit">
            <?php echo $produit['description'] ?>
            </textarea>
        </div>
        <input type="text" name="fk_image" value="<?php echo $produit['fk_image']?>">
        <input type="text" name="fk_fabriquant" value="<?php if(isset($_SESSION['fabriquant_id'])) echo $_SESSION['fabriquant_id']?>">
    <!-- Submit button -->
    <button type="submit" name="submit_data" class="btn btn-outline-dark w-100 mb-4">
           Modifier
        </button>
</div>
</form>