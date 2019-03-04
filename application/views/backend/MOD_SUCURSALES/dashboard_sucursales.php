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

<style>
    .margen-top{
        margin-top: 1.5em; 
    }
</style>

<!-- Page Header -->
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h3 class="page-heading">
                DASHBOARD SUCURSALES
            </h3>
        </div>

        <div class="col-sm-5 text-right hidden-xs">
            <button type="button" class="btn btn-rounded btn-success" data-toggle="modal" data-target="#modal-nueva-sucursal">
                <span data-toggle="tooltip" title="Agregar nueva sucursal">
                    <i class="fa fa-home"></i> Nuevo
                </span>
            </button>
            <button class="btn btn-rounded btn-round btn-primary" onclick="history.back(-1)">
                <i class="fa fa-arrow-left"></i> Regresar
            </button>
        </div>
    </div>

</div>
<!-- END Page Header -->

<!-- Page Content -->
<div class="content">
    <div class="row">
        <?php foreach($row_sucursales as $sucursal): ?>
            <div class="col-md-4">
                <!-- Sucursales -->
                <div class="block">
                    <div class="block-content">
                        <div class="row items-push">
                            <div class="font-s12 push-10">
                                <em class="pull-right">
                                    <button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-editar-sucursal<?= $sucursal->id_sucursal; ?>">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button class="btn btn-xs btn-danger" data-toggle="tooltip" title="Eliminar sucursal" onclick="eliminar()">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </em>
                                Creada: <?= date('d/m/Y', $sucursal->fecha_registro) ?>
                            </div>
                            <h4 class="text-uppercase push-10"><a class="text-primary-dark" href="base_pages_blog_story.html">Sucursal: <?= $sucursal->nombre ?></a></h4>
                            <em>
                                Dirección: <span class="text-primary"><?= $sucursal->direccion ?></span>
                            </em>
                            <div class="row" style="margin-top:2em;">
                                <div class="col-xs-12">
                                    <table class="table table-condensed table-bordered">
                                        <thead>
                                            <tr class="bg-success text-white">
                                                <td colspan="2">
                                                    INVENTARIO
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    Stock
                                                </td>
                                                <td>
                                                    0
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Apartados
                                                </td>
                                                <td>
                                                    0
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Por agotar
                                                </td>
                                                <td>
                                                    0
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Agotados
                                                </td>
                                                <td>
                                                    0
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-xs-12">
                                    <table class="table table-condensed table-bordered">
                                        <thead>
                                            <tr class="bg-city text-white">
                                                <td colspan="3">
                                                    SERVICIOS
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    Ventas
                                                </td>
                                                <td>
                                                    0
                                                </td>
                                                <td>
                                                    $ 0
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Apartados
                                                </td>
                                                <td>
                                                    0
                                                </td>
                                                <td>
                                                    $ 0
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Telefonos
                                                </td>
                                                <td>
                                                    0
                                                </td>
                                                <td>
                                                    $ 0
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Reparaciones
                                                </td>
                                                <td>
                                                    0
                                                </td>
                                                <td>
                                                    $ 0
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-xs-12">
                                    <table class="table table-condensed table-bordered">
                                        <thead>
                                            <tr class="bg-gray-darker text-white">
                                                <td colspan="2">
                                                    REPARACIONES
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    EN PROCESO
                                                </td>
                                                <td>
                                                    0
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    FINALIZADAS
                                                </td>
                                                <td>
                                                    0
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    CANCELADAS
                                                </td>
                                                <td>
                                                    0
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Sucursales -->
            </div>
            
            <!-- Modal Editar sucursal -->
            <div class="modal fade" id="modal-editar-sucursal<?= $sucursal->id_sucursal; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-md modal-dialog-popout">
                    <div class="modal-content">
                        <?php 
                        $atributos = array('class="form-horizontal push-10-t block-content"');
                        echo form_open('backend/MOD_SUCURSALES/sucursales/editar', $atributos);
                         ?>
                            <div class="block block-themed block-transparent remove-margin-b">
                                <div class="block-header bg-primary">
                                    <ul class="block-options">
                                        <li>
                                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                        </li>
                                    </ul>
                                    <h3 class="block-title">Editar información de sucursal</h3>
                                </div>
                                <div class="block-content" style="">
                                    <div class="row">
                                        <div class="col-md-6 margen-top">
                                            <label for="usuario_sucursal">* Usuario</label>
                                            <input type="text" class="form-control" id="usuario_sucursal" name="usuario_sucursal" value="<?= $sucursal->usuario; ?>" required>
                                        </div>
                                        <div class="col-md-6 margen-top">
                                            <label for="password_sucursal">* Contraseña</label>
                                            <input type="text" class="form-control" id="password_sucursal" name="password_sucursal" value="<?= $sucursal->password; ?>" required>
                                        </div>
                                        <div class="col-md-6 margen-top">
                                            <label for="nombre">* Nombre de la sucursal</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $sucursal->nombre; ?>" required>
                                        </div>
                                        <div class="col-md-6 margen-top">
                                            <label for="telefono">* Teléfono</label>
                                            <input type="text" class="form-control" id="telefono" name="telefono" value="<?= $sucursal->telefono; ?>" required>
                                        </div>
                                        <div class="col-md-12 margen-top">
                                            <label for="direccion">* Dirección de la sucursal</label>
                                            <textarea class="form-control" name="direccion" id="direccion" required><?= $sucursal->direccion; ?></textarea>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="id_sucursal" value="<?= $sucursal->id_sucursal; ?>">
                                <input type="hidden" name="fecha_registro" value="<?= time() ?>">
                                <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Cerrar</button>
                                <button id="btn_guardar" class="btn btn-sm btn-warning" type="submit" >
                                    <i class="fa fa-check"></i> Actualizar información
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- END Modal Editar sucursal -->

        <?php endforeach; ?>
        
    </div>
</div>

<!-- Modal crear sucursal -->
<div class="modal fade" id="modal-nueva-sucursal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-popout">
        <div class="modal-content">
            <?php 
            $atributos = array('class="form-horizontal push-10-t block-content"');
            echo form_open('backend/MOD_SUCURSALES/sucursales/agregar', $atributos);
             ?>
                <div class="block block-themed block-transparent remove-margin-b">
                    <div class="block-header bg-primary-dark">
                        <ul class="block-options">
                            <li>
                                <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                            </li>
                        </ul>
                        <h3 class="block-title">Registrar Nueva sucursal</h3>
                    </div>
                    <div class="block-content" style="">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="usuario_sucursal">* Usuario</label>
                                <input type="text" class="form-control" id="usuario_sucursal" name="usuario_sucursal" required>
                            </div>
                            <div class="col-md-6">
                                <label for="password_sucursal">* Contraseña</label>
                                <input type="text" class="form-control" id="password_sucursal" name="password_sucursal" required>
                            </div>
                            <div class="col-md-6">
                                <label for="nombre">* Nombre de la sucursal</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                            <div class="col-md-6">
                                <label for="telefono">* Teléfono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" required>
                            </div>
                            <div class="col-md-12">
                                <label for="direccion">* Dirección de la sucursal</label>
                                <textarea class="form-control" name="direccion" id="direccion" required></textarea>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="fecha_registro" value="<?= time() ?>">
                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Cerrar</button>
                    <button id="btn_guardar" class="btn btn-sm btn-success" type="submit" >
                        <i class="fa fa-check"></i> Registrar datos
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END Modal crear sucursal -->

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