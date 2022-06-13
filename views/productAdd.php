<h1 class="title mb-5">ajouter un produit</h1>
<div class="row">
    <div class="col">
        <div class="card" style="width: 18rem;">
            <img src="/Assets/images/pouf.jpg" class="card-img-top" alt="image du produit">
            <div class="card-body text-center">
                <!-- <a href="#" class="btn btn-dark">Télécharger une image</a> -->
                <input type="file" name="image" id="" class="w-100">
            </div>
        </div>
    </div>
    <div class="col">
        <form class="">
            <!-- Text input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form6Example3">Titre</label>
                <input type="text" name="titre" id="form6Example3" class="form-control" placeholder="Titre du produit" />
            </div>

            <!-- Text input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form6Example3">Prix</label>
                <input type="text" name="prix" id="form6Example3" class="form-control" placeholder="Prix du produit" />
            </div>
            <!-- select categories -->
            <div class="mb-4">
                <label class="form-label" for="form6Example3">Catégorie</label>

                <select class="form-select" name="categorie" aria-label="Default select example">
              <option selected>--Categorie--</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
            </div>
            <!-- select Sous categories -->
            <div class="mb-4">
                <label class="form-label" for="form6Example3">Sous catégorie</label>
                <select class="form-select" name="sous_categorie" aria-label="Default select example">
                  <option selected>--Sous-categorie--</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
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
                <textarea class="form-control" id="form6Example7" rows="4 " placeholder="Description du produit"></textarea>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-outline-dark w-100 mb-4">Ajouter</button>
        </form>
    </div>
</div>