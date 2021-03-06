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
                DASHBOARD SERVICIOS (<span><?= $num_servicios; ?></span>)
            </h3>
        </div>

        <div class="col-sm-5 text-right hidden-xs">
            <button class="btn btn-rounded btn-round btn-primary" onclick="history.back(-1)">
                <i class="fa fa-arrow-left"></i> Regresar
            </button>
            <button class="btn btn-gray" data-toggle="modal" data-target="#modal-agregar-servicio">
                <i class="fa fa-plus-circle text-success push-5-r"></i> Agregar pago de servicio
            </button>
        </div>
    </div>

</div>
<!-- END Page Header -->

<div class="content">
    <!-- Active Projects -->
    <div class="row">
        <div class="col-lg-12">
            <?php foreach($row_servicios_sucursal as $servicio): ?>
                <div class="col-sm-3">
                    <!-- Project -->
                    <div class="block block-rounded block-themed">
                        <div class="block-header bg-modern">
                            <ul class="block-options">
                                <li class="dropdown">
                                    <button type="button" data-toggle="dropdown"><i class="si si-settings"></i></button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a tabindex="-1" href="javascript:void(0)">
                                                <i class="si si-pencil pull-right"></i>
                                                Edit Project
                                            </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a tabindex="-1" href="javascript:void(0)">
                                                <i class="si si-trash text-danger pull-right"></i>
                                                Delete Project
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <h3 class="h5 font-w600 push-5">
                                <a class="text-white" href="base_pages_projects_view.html">
                                    <?= $servicio->nombre; ?>
                                </a>
                            </h3>
                            <h5 class="h5 text-white-op">
                                <?php 
                                    $periodo = (28*$servicio->periodo).' days';
                                    $dia = $servicio->dia;
                                    $dia_actual = date('d', time());
                                    $mes = date('m', time());
                                    $anio = date('Y', time());

                                    if($dia_actual <= $dia){
                                        $fecha_corte = $dia.'-'.$mes.'-'.$anio;
                                        echo '<p>Fecha limite de pago: <span style="color:#ecf0f1;">'.$fecha_corte.'</span></p>';
                                    }else{
                                        $fecha_servicio = $dia.'-'.$mes.'-'.$anio;

                                        $fecha_corte = date('d-m-Y', strtotime($fecha_servicio . ' + '.$periodo));
                                        echo '<p>Fecha limite de pago: <span style="color:#ecf0f1;">'.$fecha_corte.'</span></p>';
                                    }

                                 ?>
                            </h5>
                        </div>
                        <div class="block-content text-center">
                            <div class="btn-group push">
                                <button class="btn btn-default js-tooltip" title="Registrar pago" data-toggle="modal" data-target="#modal-pagar-servicio<?= $servicio->id_recordatorio_pago; ?>">
                                    <i class="fa fa-check-circle-o"></i> Pagar
                                </button>

                                <!--<a class="btn btn-default js-tooltip" href="javascript:void(0)" title="Comprobante de pago">
                                    <i class="fa fa-files-o"></i>
                                </a>-->
                                <a class="btn btn-default js-tooltip" href="#" title="Historial de pagos" onclick="historialServicios(<?= $servicio->fk_id_sucursal; ?>, <?= $servicio->id_recordatorio_pago; ?>, '<?= base_url(); ?>')">
                                    <i class="fa fa-calendar-o"></i>
                                </a>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Project -->
                </div>

                <!-- Registrar Pago de servicio -->
                <div class="modal fade" id="modal-pagar-servicio<?= $servicio->id_recordatorio_pago; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-dialog-popout">
                        <div class="modal-content">
                            <form enctype="multipart/form-data" class="form-horizontal push-10-t block-content" action="<?= base_url(); ?>/backend/MOD_SERVICIOS/Servicios/realizar_pago" method="post">
                                <div class="block block-themed block-transparent remove-margin-b">
                                    <div class="block-header bg-success">
                                        <ul class="block-options">
                                            <li>
                                                <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                            </li>
                                        </ul>
                                        <h3 class="block-title">
                                            Registrar pago de servicio
                                        </h3>
                                    </div>
                                    <div class="block-content" style="margin-bottom: 4em;">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="fk_id_sucursal">
                                                    Pago de sucusal
                                                </label>
                                                <select name="fk_id_sucursal" id="fk_id_sucursal" required>
                                                    <option value="">
                                                        Listado de sucursales
                                                    </option>

                                                    <?php 
                                                        foreach ($row_sucursales as $sucursal) {
                                                            if($sucursal->id_sucursal == $this->session->userdata('id_sucursal')){
                                                                echo '<option value="'.$sucursal->id_sucursal.'" selected>'.$sucursal->nombre.'</option>';
                                                            }else{
                                                                echo '<option value="'.$sucursal->id_sucursal.'">'.$sucursal->nombre.'</option>';
                                                            }
                                                        }
                                                     ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <p>
                                                    Servicio: <b><?= $servicio->nombre; ?></b>
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <p>
                                                    Fecha de corte: <b><?= $fecha_corte; ?></b>
                                                </p>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="monto_pagado">
                                                    * Monto pagado
                                                </label>
                                                <input type="text" class="form-control" id="monto_pagado" name="monto_pagado" placeholder="$ 000.00">
                                            </div>
                                            <div class="col-md-12">
                                                <label for="comprobante_pago">
                                                    Comprobante de Pago
                                                </label>
                                                <input type="file" class="form-control" id="comprobante_pago" name="comprobante_pago">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="fk_id_catalogo_servicio" value="<?= $servicio->id_catalogo_servicio; ?>">
                                    <input type="hidden" name="fecha_registro" value="<?= time(); ?>">
                                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">
                                        Cerrar
                                    </button>
                                    <button class="btn btn-sm btn-success" type="submit">
                                        Registrar pago
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- END Registrar Pago de servicio -->

            <?php endforeach; ?>
        </div>

        <!--
        <div class="col-sm-6 col-lg-4">

            <div class="block block-rounded block-themed">
                <div class="block-header bg-amethyst">
                    <ul class="block-options">
                        <li class="dropdown">
                            <button type="button" data-toggle="dropdown"><i class="si si-settings"></i></button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a tabindex="-1" href="javascript:void(0)">
                                        <i class="si si-pencil pull-right"></i>
                                        Edit Project
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a tabindex="-1" href="javascript:void(0)">
                                        <i class="si si-trash text-danger pull-right"></i>
                                        Delete Project
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <h3 class="h4 font-w600 push-5">
                        <a class="text-white" href="base_pages_projects_view.html">TalkSocial</a>
                    </h3>
                    <h4 class="h5 text-white-op">Mobile app design</h4>
                </div>
                <div class="block-content text-center">
                    <div class="btn-group push">
                        <a class="btn btn-default js-tooltip" href="javascript:void(0)" title="Tasks">
                            <i class="fa fa-check-circle-o"></i>
                        </a>
                        <a class="btn btn-default js-tooltip" href="javascript:void(0)" title="Team Chat">
                            <i class="fa fa-comments-o"></i>
                        </a>
                        <a class="btn btn-default js-tooltip" href="javascript:void(0)" title="Project Files">
                            <i class="fa fa-files-o"></i>
                        </a>
                        <a class="btn btn-default js-tooltip" href="javascript:void(0)" title="Project Calendar">
                            <i class="fa fa-calendar-o"></i>
                        </a>
                        <a class="btn btn-default js-tooltip" href="javascript:void(0)" title="Invite People">
                            <i class="fa fa-user-plus"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-sm-6 col-lg-4">

            <div class="block block-rounded block-themed">
                <div class="block-header bg-modern">
                    <ul class="block-options">
                        <li class="dropdown">
                            <button type="button" data-toggle="dropdown"><i class="si si-settings"></i></button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a tabindex="-1" href="javascript:void(0)">
                                        <i class="si si-pencil pull-right"></i>
                                        Edit Project
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a tabindex="-1" href="javascript:void(0)">
                                        <i class="si si-trash text-danger pull-right"></i>
                                        Delete Project
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <h3 class="h4 font-w600 push-5">
                        <a class="text-white" href="base_pages_projects_view.html">NextBook</a>
                    </h3>
                    <h4 class="h5 text-white-op">Web app development</h4>
                </div>
                <div class="block-content text-center">
                    <div class="btn-group push">
                        <a class="btn btn-default js-tooltip" href="javascript:void(0)" title="Tasks">
                            <i class="fa fa-check-circle-o"></i>
                        </a>
                        <a class="btn btn-default js-tooltip" href="javascript:void(0)" title="Team Chat">
                            <i class="fa fa-comments-o"></i>
                        </a>
                        <a class="btn btn-default js-tooltip" href="javascript:void(0)" title="Project Files">
                            <i class="fa fa-files-o"></i>
                        </a>
                        <a class="btn btn-default js-tooltip" href="javascript:void(0)" title="Project Calendar">
                            <i class="fa fa-calendar-o"></i>
                        </a>
                        <a class="btn btn-default js-tooltip" href="javascript:void(0)" title="Invite People">
                            <i class="fa fa-user-plus"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- END Active Projects -->
</div>


<!-- Historial pagos realizados -->
<div class="modal fade" id="modal-historial-pagos" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-popout">
        <div class="modal-content">
            <form class="form-horizontal push-10-t block-content" action="<?= base_url(); ?>/backend/MOD_SERVICIOS/Servicios/agregar_servicio" method="post">
                <div class="block block-themed block-transparent remove-margin-b">
                    <div class="block-header bg-primary-dark">
                        <ul class="block-options">
                            <li>
                                <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                            </li>
                        </ul>
                        <h3 class="block-title">Historial de pagos realizados</h3>
                    </div>
                    <div class="block-content" style="margin-bottom: 4em;">
                        <div id="div-historial-pagos" class="">

                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END Historial pagos realizados -->



<!-- Registrar Catalogo Servicio -->
<div class="modal fade" id="modal-agregar-servicio" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-popout">
        <div class="modal-content">
            <form class="form-horizontal push-10-t block-content" action="<?= base_url(); ?>/backend/MOD_SERVICIOS/Servicios/agregar_servicio" method="post">
                <div class="block block-themed block-transparent remove-margin-b">
                    <div class="block-header bg-primary-dark">
                        <ul class="block-options">
                            <li>
                                <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                            </li>
                        </ul>
                        <h3 class="block-title">Registrar nuevo servicio</h3>
                    </div>
                    <div class="block-content" style="margin-bottom: 4em;">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="id_servicio">Servicios frecuentes</label>
                                <select class="form-control" name="id_servicio" id="id_servicio" onchange="listadoServicios(this.value);">
                                    <option value="">...</option>
                                    <option value="nuevo_servicio">Otro Servicio</option>
                                    <?php foreach($row_catalogo_servicio as $servicio): ?>
                                        <option value="<?= $servicio->id_catalogo_servicio; ?>"><?= $servicio->nombre; ?></option>
                                    <?php endforeach; ?>
                                </select> 
                            </div>
                        </div>

                        <div id="div-nuevo-servicio" class="row text-justify" style="margin-top:1em;padding-bottom:1em; display:none; border-top: 2px solid #27ae60; border-bottom: 2px solid #27ae60;">
                            <div class="col-md-12">
                                <label for="nombre_servicio">Servicio</label>
                                <input type="text" class="form-control" id="nombre_servicio" name="nombre_servicio" placeholder="Nombre del servicio">
                                <br>

                                <label for="descripcion_servicio">Descripción del servicio</label>
                                <textarea class="form-control" name="descripcion_servicio" id="descripcion_servicio" rows="2"></textarea>
                                <!-- END Formulario de registro de Catalogo Servicio -->
                            </div>
                        </div>

                        <div class="row" style="margin-top:1em;">
                            <div class="col-md-12">
                                <p>
                                    <b>Recordatios de pago</b>
                                    <br>
                                    <small>
                                        Agregar información para notificar los recordatorios de pago.
                                    </small>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <label for="dia_pago">Fecha de corte *</label>
                                <input type="number" class="form-control" id="dia_pago" name="dia_pago" placeholder="Ej: 12" required>
                                <small>
                                    Día que se debe realizar el pago.
                                </small>
                            </div>
                            <div class="col-md-6">
                                <label for="periodo_pago">
                                    Periodo de pago *
                                </label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="periodo_pago" name="periodo_pago" placeholder="Ej: 1" required>
                                    <span class="input-group-addon" id="basic-addon2">Mes</span>
                                </div>
                                <small>
                                    Ej: 1 = mensualmente, 2 = bimestral, 3 = trimestral, etc ...
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="fecha_registro" value="<?= time(); ?>">
                    <input type="hidden" name="id_sucursal" value="<?= $this->session->userdata('id_sucursal'); ?>">

                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Cerrar</button>
                    <button class="btn btn-sm btn-success" type="submit">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END Registrar Catalogo Servicio -->

<script>
    function listadoServicios(servicio){
        if(servicio == 'nuevo_servicio'){
            document.getElementById('div-nuevo-servicio').style.display = 'block';
        }else{
            document.getElementById('div-nuevo-servicio').style.display = 'none';
        }
    }
    function cargarPago(){
        console.log('asdfasdf');
    }
</script>

<!-- OneUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock, Appear, CountTo, Placeholder, Cookie and App.js -->
<script src="<?php echo base_url(); ?>assets/js/propios/servicio.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/bootstrap.min.js"></script>