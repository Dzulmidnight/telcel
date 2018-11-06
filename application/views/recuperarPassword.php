<!-- Reminder Content -->
<div class="bg-white pulldown">
    <div class="content content-boxed overflow-hidden">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
                <div class="push-30-t push-20 animated fadeIn">
                    <!-- Reminder Title -->
                    <div class="text-center">
                        <i class="fa fa-2x fa-circle-o-notch text-primary"></i>
                        <p class="text-muted push-15-t">Te enviaremos la información de tu usuario.</p>
                    </div>
                    <!-- END Reminder Title -->

                    <!-- Reminder Form -->
                    <!-- jQuery Validation (.js-validation-reminder class is initialized in js/pages/base_pages_reminder.js) -->
                    <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                    <form class="js-validation-reminder form-horizontal push-30-t" action="base_pages_reminder_v2.html" method="post">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material form-material-primary floating">
                                    <input class="form-control" type="email" id="reminder-email" name="reminder-email">
                                    <label for="reminder-email">Ingresa tu correo electronico</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                                <button class="btn btn-sm btn-block btn-primary" type="submit">Recuperar contraseña</button>
                            </div>
                        </div>
                    </form>
                    <!-- END Reminder Form -->

                    <!-- Extra Links -->
                    <div class="text-center push-50-t">
                        <a href="<?php echo base_url('login'); ?>">Iniciar sesión?</a>
                    </div>
                    <!-- END Extra Links -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Reminder Content -->