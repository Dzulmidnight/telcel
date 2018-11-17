<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker3.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/select2/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/select2/select2-bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/jquery-auto-complete/jquery.auto-complete.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/ion-rangeslider/css/ion.rangeSlider.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/ion-rangeslider/css/ion.rangeSlider.skinHTML5.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/dropzonejs/dropzone.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.css">


<!-- Page Header -->
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h3 class="page-heading">
                DASHBOARD PERSONAL: <span class="text-city">7</span>
            </h3>
        </div>

        <div class="col-sm-5 text-right hidden-xs">
            <button class="btn btn-rounded btn-round btn-primary" onclick="history.back(-1)">
                <i class="fa fa-arrow-left"></i> Regresar
            </button>
            <button type="button" class="btn btn-rounded btn-success" data-toggle="modal" data-target="#modal-nuevo-personal">
                <span data-toggle="tooltip" title="Agregar nuevo personal">
                    <i class="fa fa-user"></i> Nuevo
                </span>
            </button>

        </div>
    </div>

</div>
<!-- END Page Header -->
<div class="col-md-12">
    <div class="col-xs-3" style="margin-bottom:1em;">
        <select class="js-select2 form-control" id="example-select2-multiple" name="example-select2-multiple" style="width: 100%;" data-placeholder="Filtrar por sucursales" multiple>
            <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
            <option value="1">Sucursal 1</option>
            <option value="2">Sucursal 2</option>
            <option value="3">Sucursal 3</option>
        </select>
    </div>

</div>
<!-- Page Content -->
<div class="content">


    <div class="block">
        <div class="row">
            <?php 
            for ($i=1; $i <= 7 ; $i++) { 
            ?>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <!-- Contact -->
                    <div class="block block-rounded">
                        <div class="block-header">
                            <ul class="block-options">
                                <li>
                                    <button type="button" data-toggle="modal" data-target="#modal-editar-contacto">
                                        <i class="si si-pencil"></i>
                                    </button>
                                </li>
                            </ul>
                            <div class="block-title">Nombre de la persona</div>
                        </div>
                        <div class="block-content block-content-full bg-primary text-center">
                            <img class="img-avatar img-avatar-thumb" src="<?php echo base_url(); ?>assets/img/avatars/avatar7.jpg" alt="">
                            <!--<div class="font-s13 push-10-t">Web Designer</div>-->
                        </div>
                        <div class="block-content">

                            <table class="table table-borderless table-striped font-s13">
                                <tbody>
                                    <tr>
                                        <td class="font-w600" style="width: 30%;">Sucursal</td>
                                        <td>Nom. Sucursal #<?= $i ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-w600">Telefono</td>
                                        <td>951 19932347</td>
                                    </tr>
                                    <!--<tr>
                                        <td class="font-w600">Email</td>
                                        <td>user1@one.ui</td>
                                    </tr>-->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END Contact -->
                </div>

            <?php
            }
             ?>
        </div>
    </div>


</div>


<!-- Nuevo Contacto -->
<div class="modal fade" id="modal-nuevo-personal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-popout">
        <div class="modal-content">
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header bg-success">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title"><i class="fa fa-user-circle push-5-r"></i> Nuevo Personal</h3>
                </div>
                <div class="block-content">
                    <form class="form-horizontal push-10-t push-10" action="base_pages_contacts.html" method="post" onsubmit="return false;">
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2">
                                <div class="push">
                                    <img class="img-avatar" src="<?php echo base_url(); ?>assets/img/avatars/avatar15.jpg" alt="">
                                </div>
                                <label for="contact-avatar">Selecciona una imagen</label>
                                <input type="file" id="contact-avatar" name="contact-avatar">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2">
                                <div class="form-material">
                                    <select class="form-control" id="material-select" name="material-select" size="1">
                                        <option>...</option>
                                        <option value="1">Sucursal #1</option>
                                        <option value="2">Sucursal #2</option>
                                        <option value="3">Sucursal #3</option>
                                    </select>
                                    <label for="material-select">Asignar sucursal</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group push-50-t">
                            <div class="col-sm-8 col-sm-offset-2">
                                <div class="form-material form-material-primary floating input-group">
                                    <input class="form-control" type="text" id="contact-name" name="contact-name" value="">
                                    <label for="contact-name">Nombre</label>
                                    <span class="input-group-addon"><i class="si si-user"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2">
                                <div class="form-material form-material-primary floating input-group">
                                    <input class="form-control" type="text" id="contact-email" name="contact-email" value="">
                                    <label for="contact-email">Apellido Paterno</label>
                                    <span class="input-group-addon"><i class="si si-plus"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2">
                                <div class="form-material form-material-primary floating input-group">
                                    <input class="form-control" type="text" id="contact-email" name="contact-email" value="">
                                    <label for="contact-email">Apellido Materno</label>
                                    <span class="input-group-addon"><i class="si si-plus"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2">
                                <div class="form-material form-material-primary floating input-group">
                                    <input class="form-control" type="text" id="contact-phone" name="contact-phone" value="">
                                    <label for="contact-phone">Teléfono</label>
                                    <span class="input-group-addon"><i class="si si-screen-smartphone"></i></span>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2">
                                <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-check push-5-r"></i> Crear usuario</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Nuevo Contacto -->

<!-- Contact Edit Modal -->
<div class="modal fade" id="modal-editar-contacto" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-popout">
        <div class="modal-content">
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header bg-warning">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title"><i class="fa fa-user-circle push-5-r"></i> Editar Personal</h3>
                </div>
                <div class="block-content">
                    <form class="form-horizontal push-10-t push-10" action="base_pages_contacts.html" method="post" onsubmit="return false;">
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2">
                                <div class="push">
                                    <img class="img-avatar" src="<?php echo base_url(); ?>assets/img/avatars/avatar15.jpg" alt="">
                                </div>
                                <label for="contact-avatar">Selecciona nueva imagen</label>
                                <input type="file" id="contact-avatar" name="contact-avatar">
                            </div>
                        </div>
                        <div class="form-group push-50-t">
                            <div class="col-sm-8 col-sm-offset-2">
                                <div class="form-material form-material-primary floating input-group">
                                    <input class="form-control" type="text" id="contact-name" name="contact-name" value="Nombre">
                                    <label for="contact-name">Nombre</label>
                                    <span class="input-group-addon"><i class="si si-user"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2">
                                <div class="form-material form-material-primary floating input-group">
                                    <input class="form-control" type="text" id="contact-email" name="contact-email" value="Apellido Paterno">
                                    <label for="contact-email">Apellido Paterno</label>
                                    <span class="input-group-addon"><i class="si si-plus"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2">
                                <div class="form-material form-material-primary floating input-group">
                                    <input class="form-control" type="text" id="contact-email" name="contact-email" value="Apellido Materno">
                                    <label for="contact-email">Apellido Materno</label>
                                    <span class="input-group-addon"><i class="si si-plus"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2">
                                <div class="form-material form-material-primary floating input-group">
                                    <input class="form-control" type="text" id="contact-phone" name="contact-phone" value="951 9923493">
                                    <label for="contact-phone">Teléfono</label>
                                    <span class="input-group-addon"><i class="si si-screen-smartphone"></i></span>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2">
                                <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-check push-5-r"></i> Actualizar contacto</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Contact Edit Modal -->

<script>
    function nuevoServicio(id_btn, valor){
        if(valor == 'mostrar'){
            document.getElementById('frm_nuevo_servicio').style.display = 'block';
            document.getElementById(id_btn).value = 'cancelar';
            document.getElementById(id_btn).innerHTML = 'Cancelar';
        }else{
            document.getElementById('frm_nuevo_servicio').style.display = 'none';
            document.getElementById(id_btn).value = 'mostrar';
            document.getElementById(id_btn).innerHTML = 'Nuevo';
        }
    }


    function eliminar(){
        swal({
            title: "¿Estas seguro?",
            text: "Una vez eliminado, no podras recuperar la información",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                swal("Cliente eliminado", {
                icon: "success",
            });
            } else {
                //swal("Your imaginary file is safe!");
            }
        });
    }

    function registrarServicio(){
        swal({
            title: "Operacion exitosa",
            text: "Se ha registrado la información correctamente",
            icon: "success",
            buttons:{
                imprimir:{
                    text: "Imprimir nota",
                },
                nuevo:{
                    text: "Nuevo registro",
                },
                confirm: true,
            },

        })
        .then((value) => {
            switch(value){
                case "imprimir":
                    swal('Mandaste a imprimir');
                    break;
                case "nuevo":
                    swal('Nuevo registro');
                    break;
            }    
        })
        ;

    }
    function apartar(id, elemento){
        if(document.getElementById(id).checked == true){
            document.getElementById(elemento).innerHTML = "Deposito en garantia *";
        }else{
            document.getElementById(elemento).innerHTML = 'Costo *';
        }
    }

    function tipoServicio(tipo){
        var hijos = document.querySelectorAll("div#contenedor_bloques > div");
        
        tipo = tipo - 1;
        
        for (var i = 0; i < hijos.length; i++) {
            var div_id = hijos[i].id;

            if(tipo == i ){
                if(i != 0){
                    document.getElementById('frm_cliente').style.display = 'block';
                }else{
                    document.getElementById('frm_cliente').style.display = 'none';
                }
                document.getElementById(div_id).style.display = 'block';
            }else{

                document.getElementById(div_id).style.display = 'none';
            }
       
        };
        document.getElementById('acciones_servicio').style.display = 'block';
    }
    
    function registrarServicio(){
        swal({
            title: "Operacion exitosa",
            text: "Se ha registrado la información correctamente",
            icon: "success",
            buttons:{
                imprimir:{
                    text: "Imprimir nota",
                },
                nuevo:{
                    text: "Nuevo registro",
                },
                confirm: true,
            },

        })
        .then((value) => {
            switch(value){
                case "imprimir":
                    swal('Mandaste a imprimir');
                    break;
                case "nuevo":
                    swal('Nuevo registro');
                    break;
            }    
        })
        ;

    }
</script>
<style>
    .swal-button--imprimir {
        background-color: #7f8c8d;
    }
    .swal-button--nuevo{
        background-color: #7f8c8d;
    }
</style>

<!-- OneUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock, Appear, CountTo, Placeholder, Cookie and App.js -->
<script src="<?php echo base_url(); ?>assets/js/core/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/bootstrap.min.js"></script>

<!-- Page JS Plugins -->
<script src="<?php echo base_url(); ?>assets/js/plugins/chartjsv2/Chart.min.js"></script>

<!-- Page JS Code -->
<script src="<?php echo base_url(); ?>assets/js/pages/base_comp_chartjs_v2.js"></script>