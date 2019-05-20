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
<div id="contenido_principal" class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h3 class="page-heading">
                DASHBOARD PERSONAL: <span id="spanResultados" class="text-city"><?= $num_resultados ?></span>
            </h3>
        </div>

        <div class="col-sm-5 text-right hidden-xs">
            <button id="btn_nuevo_personal" type="button" class="btn btn-rounded btn-success" data-toggle="modal" data-target="#modal-nuevo-personal">
                <span data-toggle="tooltip" title="Agregar nuevo personal">
                    <i class="fa fa-user"></i> Nuevo
                </span>
            </button>
            <button class="btn btn-rounded btn-round btn-primary" onclick="history.back(-1)">
                <i class="fa fa-arrow-left"></i> Regresar
            </button>
        </div>
    </div>

</div>
<!-- END Page Header -->
<div class="col-md-12">
    <div class="col-xs-3" style="margin-bottom:1em;">
        <select class="js-select2 form-control" id="example-select2-multiple" name="example-select2-multiple" style="width: 100%;" data-placeholder="Filtrar por sucursales" multiple>
            <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
            <?php foreach($row_sucursales as $sucursal): ?>
                <option value="<?= $sucursal->id_sucursal ?>"><?= $sucursal->nombre ?></option>
            <?php endforeach; ?>
        </select>
    </div>

</div>
<!-- Page Content -->
<div class="content">
    <script>
        function prueba3(x){
            console.log(x);
        }
    </script>

    <div id="" class="block">
        <input id="base_url_input" type="hidden" value="<?= base_url(); ?>">
        <div id="tarjetasPersonal" class="row">
            <?php foreach ($row_usuarios as $usuario): ?>
            <?php 
                if($usuario->perfil == 'administrador'){
                    $tipo_usuario = 'bg-danger';
                }else{
                    $tipo_usuario = 'bg-primary';
                }
             ?>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <!-- Contact -->
                    <div class="block block-rounded">
                        <div class="block-header">
                            <ul class="block-options">
                                <!--<li>
                                    <button type="button" onclick="consultaAjax('/listar/users/','<?= $usuario->id_user ?>')">
                                        <i class="si si-pencil"></i>
                                    </button>
                                </li>-->
                                <li>
                                    <button type="button" onclick="editarPersonal(<?= $usuario->id_user; ?>)">
                                        <i class="si si-pencil"></i>
                                    </button>
                                </li>
                                <li>
                                    <!--<form id="frm_eliminar_usuario" style="display:inline" action="<?= base_url(); ?>/backend/MOD_PERSONAL/personal/eliminar/<?= $usuario->id_user?>">
                                        <button class="btn btn-sm btn-default" type="button" data-toggle="tooltip" title="Eliminar usuario" onclick="eliminarDatos('frm_eliminar_usuario');"><i class="si si-trash"></i></button>
                                    </form>-->
                                    <button class="btn btn-sm btn-default" type="button" data-toggle="tooltip" title="Eliminar usuario" onclick="eliminar_informacion('id_personal',<?= $usuario->id_user; ?>, 'frm_eliminar_personal');"><i class="si si-trash"></i></button>
                                    
                                </li>
                            </ul>
                            <div class="block-title">
                                <?= $usuario->nombre.' '.$usuario->ap_paterno ?>
                            </div>
                        </div>
                        <div class="block-content block-content-full <?= $tipo_usuario; ?> text-center">
                            <img class="img-avatar img-avatar-thumb" src="<?php echo base_url(); ?>assets/img/avatars/avatar7.jpg" alt="">
                            <!--<div class="font-s13 push-10-t">Web Designer</div>-->
                        </div>
                        <div class="block-content">

                            <table class="table table-borderless table-striped font-s13">
                                <tbody>
                                    <tr>
                                        <td class="font-w600" style="width: 30%;">Sucursal</td>
                                        <td># <?= $usuario->nombre_sucursal; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-w600" style="width: 30%;">Perfil</td>
                                        <td><?= $usuario->perfil; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-w600">Telefono</td>
                                        <td><?= $usuario->telefono ?></td>
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

            <?php endforeach; ?>

            <div id="div_eliminar_personal">
                <form id="frm_eliminar_personal" action="<?= base_url(); ?>/backend/General/eliminar_user/users/id_personal/id_user" method="POST">
                    <input type="hidden" id="id_personal" name="id_personal">
                </form>
            </div>
        </div>
    </div>


</div>


<!-- Nuevo Contacto -->
<div class="modal" id="modal-nuevo-personal" tabindex="-1" role="dialog" aria-hidden="true">
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
                    <form id="frm-nuevo-personal" class="form-horizontal push-10-t push-10" action="<?php echo base_url(); ?>backend/MOD_PERSONAL/personal/agregar" method="POST">
                        <!--<div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2">
                                <div class="push">
                                    <img class="img-avatar" src="<?php echo base_url(); ?>assets/img/avatars/avatar15.jpg" alt="">
                                </div>
                            </div>
                        </div>-->

                        <div class="form-group">
                            <div class="col-sm-6">
                                <div class="form-material">
                                    <select class="form-control" id="id_sucursal" name="id_sucursal" size="1" style="margin-top: 1.5em;">
                                        <option>...</option>
                                        <?php foreach($row_sucursales as $sucursal): ?>
                                            <option value="<?= $sucursal->id_sucursal ?>"><?= $sucursal->nombre ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <label for="id_sucursal">Asignar sucursal</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-material">
                                    <select class="form-control" id="perfil" name="perfil" size="1" style="margin-top: 1.5em;" onchange="tipoUsuario(this.value);">
                                        <option>Lista de perfiles</option>
                                        <option value="administrador">Administrador</option>
                                        <option value="tecnico">Técnico</option>
                                        <option value="usuario">Usuario</option>
                                    </select>
                                    <label for="perfil">Perfil de usuario</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-6">
                                <label for="username">Usuario</label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Escribe aquí">

                            </div>
                            <div class="col-sm-6">
                                <label for="password">Contraseña</label>
                                <input type="text" class="form-control" name="password" id="password" placeholder="Escribe aquí">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Escribe aquí">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label for="ap_paterno">Apellido Paterno</label>
                                <input type="text" class="form-control" name="ap_paterno" id="ap_paterno" placeholder="Escribe aquí">
                            </div>
                            <div class="col-sm-6">
                                <label for="ap_materno">Apellido Materno</label>
                                <input type="text" class="form-control" name="ap_materno" id="ap_materno" placeholder="Escribe aquí">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-6">
                                <label for="telefono">Telefono</label>
                                <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Escribe aquí">
                            </div>
                            <div class="col-sm-6">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Escribe aquí">
                            </div>
                        </div>
                        <div id="div_visibilidad_sucursal" class="col-md-12" style="display:none;">
                            <hr>
                            <h4>Configuración de cuenta</h4>
                            <p>
                                Visualizar solo información de las siguiente Sucursales:
                            </p>
                            <?php foreach($row_sucursales as $sucursal): ?>
                                <label class="css-input css-checkbox css-checkbox-lg css-checkbox-default">
                                    <input type="checkbox" name="ver_sucursal[]" value="<?= $sucursal->id_sucursal; ?>"><span></span> <?= $sucursal->nombre; ?>
                                </label>
                                <br>
                            <?php endforeach; ?>
                        </div>


                        <div class="form-group text-right">
                            <div class="col-sm-12" style="margin-top:2em;">
                                <input type="hidden" name="fecha_registro" value="<?= time() ?>">
                                <button type="submit" class="btn btn-sm btn-primary">
                                    <i class="fa fa-check"></i> Crear usuario
                                </button>
                                <!--<button id="btn-nuevo-personal" class="btn btn-sm btn-primary" type="button" onclick="insertAjax('frm-nuevo-personal','<?php echo base_url(); ?>backend/MOD_PERSONAL/personal/agregar', funcionMostrar)"><i class="fa fa-check push-5-r"></i> Crear usuario</button>-->
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
<div id="div-editar-contenido"></div>
<!-- END Contact Edit Modal -->



<!-- Contact Edit Modal -->
<div class="modal" id="modal-editar-personal2" tabindex="-1" role="dialog" aria-hidden="true">
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
                    <form id="frm-editar-personal" class="form-horizontal push-10-t push-10">
                        <input type="hidden" id="editar_id_usuario" name="id_user" value="">
                        <!--<div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2">
                                <div class="push">
                                    <img class="img-avatar" src="<?php echo base_url(); ?>assets/img/avatars/avatar15.jpg" alt="">
                                </div>
                                <label for="contact-avatar">Selecciona una imagen</label>
                                <input type="file" id="contact-avatar" name="contact-avatar">
                            </div>
                        </div>-->

                        <div class="form-group">
                            <div class="col-sm-6">
                                <div class="form-material">
                                    <select class="form-control" id="editar_sucursal" name="id_sucursal" size="1" style="margin-top: 1.5em;">
                                        <option>...</option>
                                        <?php foreach($row_sucursales as $sucursal): ?>
                                            <option value="<?= $sucursal->id_sucursal ?>"><?= $sucursal->nombre ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <label for="editar_sucursal">Asignar sucursal</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="editar_nombre" placeholder="Escribe aquí">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-6">
                                <label for="usuario">Usuario</label>
                                <input type="text" class="form-control" name="usuario" id="editar_usuario" placeholder="Escribe aquí">
                            </div>
                            <div class="col-sm-6">
                                <label for="password">Contraseña</label>
                                <input type="text" class="form-control" name="password" id="editar_password" placeholder="Escribe aquí">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="ap_paterno">Apellido Paterno</label>
                                <input type="text" class="form-control" name="ap_paterno" id="editar_ap_paterno" placeholder="Escribe aquí">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="ap_materno">Apellido Materno</label>
                                <input type="text" class="form-control" name="ap_materno" id="editar_ap_materno" placeholder="Escribe aquí">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="telefono">Telefono</label>
                                <input type="text" class="form-control" name="telefono" id="editar_telefono" placeholder="Escribe aquí">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email" id="editar_email" placeholder="Escribe aquí">
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="hidden" name="fecha_actualizacion" value="<?= time() ?>">
                                <button id="btn-editar-personal" class="btn btn-sm btn-primary" type="button" onclick="actualizarAjax('frm-editar-personal','<?php echo base_url(); ?>backend/MOD_PERSONAL/personal/actualizar', funcionMostrar)"><i class="fa fa-check push-5-r"></i> Actualizar usuario</button>
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
    function tipoUsuario(perfil)
    {
        if(perfil == 'administrador'){
            document.getElementById('div_visibilidad_sucursal').style.display = 'block';
        }else{
            document.getElementById('div_visibilidad_sucursal').style.display = 'none';
        }
    }

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

<script src="<?= base_url('assets/js/propios/funciones.js') ?>"></script>
<script src="<?= base_url('assets/js/propios/personal.js') ?>"></script>
<!-- OneUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock, Appear, CountTo, Placeholder, Cookie and App.js -->
<script src="<?php echo base_url(); ?>assets/js/core/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/bootstrap.min.js"></script>