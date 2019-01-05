<!-- Contenido login -->
<div class="bg-white pulldown">
    <div class="content content-boxed overflow-hidden">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
                <div class="push-30-t push-50 animated fadeIn">
                    <!-- Login Title -->
                    <div class="text-center">
                        <i class="fa fa-2x fa-circle-o-notch text-primary"></i>
                        <p class="text-muted push-15-t">MOVIL EXPERT</p>
                    </div>
                    <!-- END Login Title -->

                    <!-- Login Form -->
                    <!-- jQuery Validation (.js-validation-login class is initialized in js/pages/base_pages_login.js) -->
                    <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                    <form class="js-validation-login form-horizontal push-30-t" action="<?= base_url().'login/new_user'; ?>" method="post">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material form-material-primary floating">
                                    <input class="form-control" type="text" id="username" name="username">
                                    <label for="username">Usuario</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material form-material-primary floating">
                                    <input class="form-control" type="password" id="password" name="password">
                                    <label for="password">Contraseña</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="font-s13 text-right push-5-t">
                                    <a href="<?php echo base_url("login/recuperarPassword"); ?>">Olvidaste tu contraseña?</a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group push-30-t">
                            <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                                <!--<a href="<?php echo base_url("backend/inicio"); ?>" class="btn btn-sm btn-block btn-primary">Iniciar sesión</a>-->
                                <button type="submit" class="btn btn-sm btn-block btn-primary">
                                    Iniciar sesión
                                </button>
                            </div>
                        </div>
                        <?=form_hidden('token',$token)?>
                        <?php 
                            if($this->session->flashdata('usuario_incorrecto'))
                            {
                        ?>
                            <p><?=$this->session->flashdata('usuario_incorrecto')?></p>
                        <?php
                            }
                        ?>

                    </form>
                    <!-- END Login Form -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Contenido login -->