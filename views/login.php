<?php 
/**@var $model \app\models\User */
?>
<?php 
use app\core\form\Form;
?>
    <section class="login">
        <div class="row justify-content-center align-items-center">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex justify-content-center align-items-center">
                        <!-- side image -->
                        <div class="col-md-6 col-lg-6 col-xl-4 h-100">
                            <div class="bg-img img-form">
                                <div class="mask-c">
                                    <div class="d-flex justify-content-center align-items-center h-100">
                                        <div class="text-white text-center">
                                            <h2 class="title">made in morocco
                                            </h2>
                                            <p> Connectez-vous afin d’en profiter plainement de notre application web</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" p-4 p-md-5 bg-white shadow">
                           
                        <?php $form=Form::begin('',"post"); ?>

                            <div class="signin-form justify-content-center align-items-center">
                                <div class="mb-3">
                                    <h2 class="my-3">Connexion</h2>
                                    <p class=" mb-0">Vous n’avez pas un compte ?
                                        <a href="/register" class="text-secondary ">S’inscrire</a>
                                    </p>

                                </div>
                                <?php echo $form->field($model,'email') ?>
                                <?php echo $form->field($model,'password')->passwordField() ?>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-outline-dark rounded submit">Se connecter</button>
                                </div>
                                
                               
                                <!-- <div class="form-group d-md-flex">
                                    <div class="mt-3">
                                        <input type="checkbox">
                                        <label class="checkbox-wrap checkbox-primary mb-0">Se souvener de moi
									 
										</label>
                                    </div> -->
                                <?php  Form::end(); ?>
                                    <!-- <div class="w-50 text-md-right">
                                        <a href="#">Forgot Password</a>
                                    </div> -->
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
  