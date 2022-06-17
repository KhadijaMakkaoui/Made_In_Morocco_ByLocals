<h1 class="title mb-5">ajouter un produit</h1>
<form enctype="multipart/form-data" class="row" method="post" action="">
    <div class="col">
        <div class="card" style="width: 18rem">
            <img src="/Assets/images/add-product.png" class="card-img-top" alt="image du produit" />
            <div class="card-body text-center">
                <!-- <a href="#" class="btn btn-dark">Télécharger une image</a> -->
                <input type="file" name="image" id="" class="w-100" />
                <!-- <input type="number" name="fk_image" id=""> -->
            </div>
        </div>
    </div>
    <div class="col">
        <!-- Text input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="form6Example3">Titre</label>
            <input type="text" name="titre" id="form6Example3" class="form-control" placeholder="Titre du produit" />
        </div>

        <!-- Text input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="form6Example3">Prix</label>
            <input type="number" name="prix" id="form6Example3" class="form-control" placeholder="Prix du produit" min="0" />
        </div>
        <!-- select Sous categories -->
        <div class="mb-4">
            <label class="form-label" for="form6Example3">Catégorie</label>
            <select class="form-select" name="fk_s_categorie" aria-label="Default select example">
            <option selected>--Veuillez selectionnez une categorie--</option>
            <?php foreach ($s_categories as $cat):?>
              <option value="<?php echo $cat['id'] ?>"><?php echo $cat['libelle'] ?></option>
              <?php endforeach;?>
          </select>
        </div>
        <!-- Number input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="form6Example6">Quantité disponible</label>
            <input type="number" name="quantite" id="form6Example6" class="form-control" placeholder="Quantité disponible du produit" min="0" />
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