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
                DASHBOARD SUCURSALES
            </h3>
        </div>

        <div class="col-sm-5 text-right hidden-xs">
            <button class="btn btn-rounded btn-round btn-primary" onclick="history.back(-1)">
                <i class="fa fa-arrow-left"></i> Regresar
            </button>
            <button type="button" class="btn btn-rounded btn-success" data-toggle="modal" data-target="#modal-nueva-sucursal">
                <span data-toggle="tooltip" title="Agregar nueva sucursal">
                    <i class="fa fa-home"></i> Nuevo
                </span>
            </button>

        </div>
    </div>

</div>
<!-- END Page Header -->

<!-- Page Content -->
<div class="content">
    <?php 
    if($this->session->flashdata('success')){
        $mensaje = $this->session->flashdata('success');
    ?>
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h3 class="font-w300 push-15"><?= $mensaje ?></h3>
        </div>
    <?php
    }else if($this->session->flashdata('error')){
        $mensaje = $this->session->flashdata('error');
    ?>
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h3 class="font-w300 push-15"><?= $mensaje ?></h3>
        </div>
    <?php
    }
     ?>

    <div class="block">
        <div class="row">
            <?php foreach($row_sucursales as $sucursal): ?>
                <div class="col-md-4">
                    <!-- Sucursales -->
                    <div class="block">
                        <div class="block-content">
                            <div class="row items-push">
                                <div class="font-s12 push-10">
                                    <em class="pull-right">
                                        <button class="btn btn-xs btn-warning">
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
                                                        <?= rand(2, 15) ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Apartados
                                                    </td>
                                                    <td>
                                                        <?= rand(2, 15) ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Por agotar
                                                    </td>
                                                    <td>
                                                        <?= rand(2, 15) ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Agotados
                                                    </td>
                                                    <td>
                                                        <?= rand(2, 15) ?>
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
                                                        <?= rand(2, 15) ?>
                                                    </td>
                                                    <td>
                                                        $ <?= number_format(rand(700, 1500)) ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Apartados
                                                    </td>
                                                    <td>
                                                        <?= rand(2, 15) ?>
                                                    </td>
                                                    <td>
                                                        $ <?= number_format(rand(700, 1500)) ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Telefonos
                                                    </td>
                                                    <td>
                                                        <?= rand(2, 15) ?>
                                                    </td>
                                                    <td>
                                                        $ <?= number_format(rand(700, 1500)) ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Reparaciones
                                                    </td>
                                                    <td>
                                                        <?= rand(2, 15) ?>
                                                    </td>
                                                    <td>
                                                        $ <?= number_format(rand(700, 1500)) ?>
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
                                                        <?= rand(2,7) ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        FINALIZADAS
                                                    </td>
                                                    <td>
                                                        <?= rand(2,7) ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        CANCELADAS
                                                    </td>
                                                    <td>
                                                        <?= rand(0,7) ?>
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
            <?php endforeach; ?>
            
        </div>
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
                        <div class="row text-justify">
                            <!-- Formularios invetario -->
                            <div id="formularios_inventario">
                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <div class="form-material form-material-primary input-group">
                                            <input class="form-control" type="text" id="nombre" name="nombre" placeholder="" required>
                                            <label for="nombre">Nombre de la sucursal</label>
                                            <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-material form-material-primary input-group">
                                            <input class="form-control" type="text" id="telefono" name="telefono" placeholder="" required>
                                            <label for="telefono">Teléfono *</label>
                                            <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material">
                                            <textarea class="form-control" id="direccion" name="direccion" rows="3" placeholder="Ingresa la dirección de la nueva sucursal"></textarea>
                                            <label for="direccion">Dirección de la nueva sucursal</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END Formularios inventario -->
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

<!-- Page JS Plugins -->
<script src="<?php echo base_url(); ?>assets/js/plugins/chartjsv2/Chart.min.js"></script>

<!-- Page JS Code -->
<script src="<?php echo base_url(); ?>assets/js/pages/base_comp_chartjs_v2.js"></script>