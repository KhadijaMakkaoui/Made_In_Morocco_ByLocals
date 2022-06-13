<h1 class="title mb-5">Modifier un produit</h1>
<?php
$form = app\core\form\Form::begin('', "post"); ?>
<?php #echo $form->field($model, 'id')->hiddenField(); ?>
  <div class="row">
    <div class="col">
        <div class="card" style="width: 18rem">
            <img src="/Assets/images/<?php #echo $p[] ?>" class="card-img-top" alt="image du produit" />
            <div class="card-body text-center">
                <!-- <a href="#" class="btn btn-dark">Télécharger une image</a> -->
                <input type="file" name="" id="" class="w-100" />
                <input type="number" name="fk_image" id="">
            </div>
        </div>
    </div>
    <div class="col">
        <div >
      <?php echo $form->field($model, 'titre'); ?>
    </div>
    <div class="">
      <?php echo $form->field($model, 'prix')->numberField(); ?>
    </div>
    <div class="">
      <?php echo $form->field($model, 'quantite')->numberField(); ?>
    </div>
    <div class="">
      <?php echo $form->field($model, 'fk_s_categorie'); ?>
    </div> 
    <div class="">
      <?php echo $form->field($model, 'description'); ?>
    </div> 
    <!-- <div class="">
      <?php # echo $form->selectField($s_categorie, 'sous_categorie',); ?>
    </div>  -->
    <!-- select categories -->
    <div class="mb-4">
        <label class="form-label" for="form6Example3">Catégorie</label>

        <select class="form-select" name="" aria-label="Default select example">
          <option>--Categorie--</option>
          <?php foreach ($categories as $cat):?>
          <option value="<?php echo $cat['id'] ?>"><?php echo $cat['libelle'] ?></option>
          <?php endforeach;?>
        </select>
    </div>
    <!-- select Sous categories -->
    <div class="mb-4">
        <label class="form-label" for="form6Example3">Sous catégorie</label>
        <select class="form-select" name="fk_s_categorie" aria-label="Default select example">
        <option selected>--Sous-categorie--</option>
        <?php foreach ($s_categories as $cat):?>
          <option value="<?php echo $cat['id'] ?>"><?php echo $cat['libelle'] ?></option>
          <?php endforeach;?>
      </select>
    </div>
   
  </div>
    </div>
  
  
  <button type="submit" class="btn btn-primary mt-5">Submit</button>
<?php app\core\form\Form::end(); ?>

