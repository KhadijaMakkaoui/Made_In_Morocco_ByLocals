<?php 
use app\core\form\Form;

?>
    <section class="login">
        <div class="row justify-content-center align-items-center">

            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-12">
                    <div class="wrap d-md-flex justify-content-center align-items-center">

                        <div class="col-md-6 col-lg-6 col-xl-4 h-100">
                            <div class="bg-img img-form-vendeur">
                                <div class="mask-c">
                                    <div class="d-flex justify-content-center align-items-center h-100">
                                        <div class="text-white text-center">
                                            <h2 class="title">made in morocco
                                            </h2>
                                            <p> Devener un commerçant membre et vender vos produit sur MADE IN MOROCCO</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-2  bg-white shadow">
                            <!-- connect by API -->
                            <!-- <div class="d-flex">
                                <div class="w-100 ">
                                    <p class="social-media d-flex justify-content-end">
                                        <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
                                        <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
                                    </p>
                                </div>
                            </div> -->
                            <!-- register form -->
                            <?php $form=Form::begin('',"post"); ?>

                            <div class="signin-form justify-content-center align-items-center">
                                <div class="mb-2 mx-3">
                                    <h2 class="my-3">Inscription Fabriquant(e)</h2>
                                    <p class=" mb-0">Avez-vous déjà un compte?
                                        <a href="/login" class="text-secondary ">Se connecter</a>
                                    </p>

                                </div>
                                <!-- full name -->
                                <!-- <div class="row mx-1">
                                    <div class="col-md-6  mb-2">
                                        <div class="form-outline">
                                            <label class="form-label" for="firstName">Prénom</label>
                                            <input type="text" id="firstName" class="form-control" placeholder="Entrer votre prénom" />
                                        </div>
                                    </div>
                                    <div class="col-md-6  mb-2">
                                        <div class="form-outline">
                                            <label class="form-label" for="lastName">Nom</label>
                                            <input type="text" id="lastName" class="form-control" placeholder="Entrer votre nom" />
                                        </div>
                                    </div>
                                </div>
                                Adresse
                                <div class="row mx-1">
                                    Region
                                    <div class="col-md-6  mb-2">
                                        <div class="form-outline">
                                            <label class="form-label" for="region">Région</label>
                                            <select class="form-select " aria-label=" example">
                                                <option selected></option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                              </select>
                                        </div>
                                    </div>
                                    Ville 
                                    <div class="col-md-6  mb-2">
                                        <div class="form-outline">
                                            <label class="form-label" for="region">Ville</label>
                                            <select class="form-select " aria-label=" example">
                                                <option selected></option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                              </select>
                                        </div>
                                    </div>
                                </div>
                                Email input
                                <div class="form-outline mb-2 mx-3">
                                    <label class="form-label" for="form3Example3"> Addresse email</label>
                                    <input type="email" id="form3Example3" class="form-control" placeholder="Enter une addresse email valide " />
                                </div>
                                Email input
                                <div class="form-outline mb-2 mx-3">
                                    <label class="form-label" for="tel">Numéro de téléphone</label>
                                    <input type="tel" id="tel" class="form-control" placeholder="Enter votre numéro de téléphone " />
                                </div>
                                Password input
                                <div class="form-outline mb-2 mx-3">
                                    <label class="form-label" for="form3Example4">Mot de passe</label>
                                    <input type="password" id="form3Example4" class="form-control " placeholder="Enterer le mot de passe" />
                                </div>
                                Password confirm input
                                <div class="form-outline mb-2 mx-3">
                                    <label class="form-label" for="form3Example4">Confimation du mot de passe</label>
                                    <input type="password" id="form3Example4" class="form-control " placeholder="confirmer le mot de passe" />
                                </div> -->
                                <?php echo $form->field($model,'email') ?>
                                <?php echo $form->field($model,'password')->passwordField() ?>
                                <?php echo $form->field($model,'confirmPassword')->passwordField() ?>

                                <div class="form-group mx-3">
                                    <button type="submit" class="form-control btn btn-outline-dark rounded submit">S'inscrire</button>
                                </div>
                                <!-- Button submit -->
                                <div class="form-group mx-3">
                                    <button type="submit" class="form-control btn btn-outline-dark rounded submit">S'inscrire</button>
                                </div>
                                <div class="text-center my-1">
                                    <p class=" mb-0">vous n'êtes pas fabriquant?
                                        <a href="/register" class="text-secondary ">Inscrivez-vous ici</a>
                                    </p>

                                </div>
                            </div>
                            <?php  Form::end(); ?>

                        </div>

                    </div>

                </div>
            </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>