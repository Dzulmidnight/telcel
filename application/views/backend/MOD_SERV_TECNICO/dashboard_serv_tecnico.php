<!-- Page Header -->
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h3 class="page-heading">
                DASHBOARD SERVICIO TÉCNICO
            </h3>
        </div>

        <div class="col-sm-5 text-right hidden-xs">
            <button class="btn btn-rounded btn-primary" onclick="history.back(-1)">
                <i class="fa fa-arrow-left"></i> Regresar
            </button>
            <button type="button" class="btn btn-rounded btn-success" data-toggle="modal" data-target="#modal-popout2">
                <span data-toggle="tooltip" title="Registrar nuevo servicio tecnico">
                    <i class="fa fa-briefcase"></i> Nuevo Servicio
                </span>
            </button>
        </div>
    </div>


</div>
<!-- END Page Header -->

<!-- Page Content -->
<div class="content">
    <!-- Busqueda de equipo -->
    <div class="bg-gray-lighter">
        <section class="content content-full content-boxed">
            <!-- Section Content -->
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <form action="base_pages_support.html" method="post">
                        <div class="input-group input-group-lg">
                            <input class="form-control" type="text" placeholder="Busqueda de equipo (Telefono, IMEI, ID Soporte)">
                            <div class="input-group-btn">
                                <button class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Section Content -->
        </section>
    </div>
    <!-- END Busqueda de equipo -->
    <!-- Opciones servicio tecnico -->
    <div class="bg-white">
        <div class="row">
            <!-- Sub opciones garantia -->
            <div class="col-sm-12">
                <div class="block">
                    <ul class="nav nav-tabs nav-tabs-alt nav-justified" data-toggle="tabs">
                        <li class="active">
                            <a href="#btabs-alt-static-justified-home"><i class="fa fa-home"></i> En proceso</a>
                        </li>
                        <li class="">
                            <a href="#btabs-alt-static-justified-profile"><i class="fa fa-pencil"></i> Finalizados</a>
                        </li>
                        <li class="">
                            <a href="#btabs-alt-static-justified-settings"><i class="fa fa-cog"></i> Total</a>
                        </li>
                    </ul>
                    <div class="block-content tab-content">
                        <!-- Equipos en proceso de garantia -->
                        <div class="tab-pane active" id="btabs-alt-static-justified-home">
                            <h4 class="font-w300 push-15">En proceso</h4>



                            <table class="js-table-sections table table-condensed table-hover">
                                <thead style="font-size:13px;">
                                    <tr>
                                        <th class="danger">
                                            #ID
                                        </th>
                                        <th>
                                            Sucursal
                                        </th>
                                        <th>
                                            Cliente
                                        </th>
                                        <th style="width:20%;">
                                            Detalle Equipo
                                        </th>
                                        <th>
                                            Técnico
                                        </th>
                                        <th>
                                            Entrega aprox
                                        </th>
                                        <th>
                                            Garantia
                                        </th>
                                        <th>
                                            ...
                                        </th>
                                    </tr>
                                </thead>
                                
                                <tbody class="js-table-sections-header">
                                <!--<tbody class="js-table-sections-header open">-->
                                    <?php foreach($row_servicios as $servicio): ?>
                                        <tr class="font-size:12px;">
                                            <!-- ID general -->
                                            <td>
                                                <i class="fa fa-angle-right"></i> <span class="text-danger"><?= $servicio->id_servicio_tecnico; ?></span>
                                            </td>
                                            <!-- Nombre de la sucursal -->
                                            <td>
                                                <?= $servicio->nombre_sucursal; ?>
                                            </td>
                                            <!-- Información del cliente -->
                                            <td>
                                                Cliente: <a href="#">Nombre del cliente</a>
                                                <br>
                                                Tel: <span class="text-primary">951 199 9723</span>
                                            </td>
                                            <!-- EQUIPO -->
                                            <td>
                                                <a href="#">
                                                    Nombre del equipo
                                                </a>
                                                <p>
                                                    Descripción: <span class="text-city">El equipo presenta falla en la pantalla, necesita ser reemplazada</span>
                                                </p>
                                            </td>
                                            <!-- Nombre del tecnico -->
                                            <td>
                                                Nom Tecnico
                                            </td>
                                            <!-- Fecha de entrega aprox -->
                                            <td>
                                                <span class="text-danger">
                                                    <?= date('d/m/Y', time()) ?>
                                                </span> 
                                            </td>

                                            <!-- FECHA DE INGRESO -->
                                            <td>
                                                <?php 
                                                    $validez = 2.592e+6; // 30 dias
                                                    $fin_garantia = date('d/m/Y', time()+$validez);
                                                 ?>
                                                <?= date('d/m/Y', time()); ?>
                                                -
                                                <?= $fin_garantia ?>
                                            </td>
                                            <!-- Acciones -->
                                            <td>
                                                <button class="btn btn-xs btn-success">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                                <button class="btn btn-xs btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tbody style="font-size:12px;border: 2px solid #ee5253;">
                                    <tr style="margin:0px;padding:0px;">
                                        <td colspan="7" style="padding:0px;padding-top:10px;">
                                            <p class="h4">Historial de acciones</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <b>Fecha</b>
                                        </td>
                                        <td colspan="4">
                                            <b>Actualización</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <?= date('d/m/Y', time()) ?>
                                        </td>
                                        <td colspan="4">
                                            Reemplazo de pieza solicitado
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <?= date('d/m/Y', time()) ?>
                                        </td>
                                        <td colspan="4">
                                            Equipo revisado por el tecnico
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <?= date('d/m/Y', time()) ?>
                                        </td>
                                        <td colspan="4">
                                            En espera de entrar a revisión
                                        </td>
                                    </tr>

                                </tbody>
                               
                            </table>
                        </div>

                        <!-- Equipos finalizados -->
                        <div class="tab-pane" id="btabs-alt-static-justified-profile">
                            <h4 class="font-w300 push-15">Finalizados</h4>
                            <table class="js-table-sections table table-condensed table-hover">
                                <thead style="font-size:13px;">
                                    <tr>
                                        <th class="danger">
                                            #ID
                                        </th>
                                        <th>
                                            Sucursal
                                        </th>
                                        <th>
                                            Cliente
                                        </th>
                                        <th style="width:20%;">
                                            Detalle Equipo
                                        </th>
                                        <th>
                                            Técnico
                                        </th>
                                        <th>
                                            Entrega aprox
                                        </th>
                                        <th>
                                            Garantia
                                        </th>
                                        <th>
                                            ...
                                        </th>
                                    </tr>
                                </thead>
                                
                                <tbody class="js-table-sections-header">
                                <!--<tbody class="js-table-sections-header open">-->
                                    <tr class="font-size:12px;">
                                        <!-- ID general -->
                                        <td>
                                            <i class="fa fa-angle-right"></i> <span class="text-danger">342</span>
                                        </td>
                                        <!-- Nombre de la sucursal -->
                                        <td>
                                            Nom. Sucursal
                                        </td>
                                        <!-- Información del cliente -->
                                        <td>
                                            Cliente: <a href="#">Nombre del cliente</a>
                                            <br>
                                            Tel: <span class="text-primary">951 199 9723</span>
                                        </td>
                                        <!-- EQUIPO -->
                                        <td>
                                            <a href="#">
                                                Nombre del equipo
                                            </a>
                                            <p>
                                                Descripción: <span class="text-city">El equipo presenta falla en la pantalla, necesita ser reemplazada</span>
                                            </p>
                                        </td>
                                        <!-- Nombre del tecnico -->
                                        <td>
                                            Nom Tecnico
                                        </td>
                                        <!-- Fecha de entrega aprox -->
                                        <td>
                                            <span class="text-danger">
                                                <?= date('d/m/Y', time()) ?>
                                            </span> 
                                        </td>

                                        <!-- FECHA DE INGRESO -->
                                        <td>
                                            <?php 
                                                $validez = 2.592e+6; // 30 dias
                                                $fin_garantia = date('d/m/Y', time()+$validez);
                                             ?>
                                            <?= date('d/m/Y', time()); ?>
                                            -
                                            <?= $fin_garantia ?>
                                        </td>
                                        <!-- Acciones -->
                                        <td>
                                            <button class="btn btn-xs btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>

                                    </tr>
                                </tbody>
                                <tbody style="font-size:12px;border: 2px solid #ee5253;">
                                    <tr style="margin:0px;padding:0px;">
                                        <td colspan="7" style="padding:0px;padding-top:10px;">
                                            <p class="h4">Historial de acciones</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <b>Fecha</b>
                                        </td>
                                        <td colspan="4">
                                            <b>Actualización</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <?= date('d/m/Y', time()) ?>
                                        </td>
                                        <td colspan="4">
                                            Reemplazo de pieza solicitado
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <?= date('d/m/Y', time()) ?>
                                        </td>
                                        <td colspan="4">
                                            Equipo revisado por el tecnico
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <?= date('d/m/Y', time()) ?>
                                        </td>
                                        <td colspan="4">
                                            En espera de entrar a revisión
                                        </td>
                                    </tr>

                                </tbody>
                               
                            </table>
                        </div>

                        <!-- Total de equipos -->
                        <div class="tab-pane" id="btabs-alt-static-justified-settings">
                            <h4 class="font-w300 push-15">Listado de equipos</h4>
                            <table class="js-table-sections table table-condensed table-hover">
                                <thead style="font-size:13px;">
                                    <tr>
                                        <th class="danger">
                                            #ID
                                        </th>
                                        <th>
                                            Sucursal
                                        </th>
                                        <th>
                                            Cliente
                                        </th>
                                        <th style="width:20%;">
                                            Detalle Equipo
                                        </th>
                                        <th>
                                            Técnico
                                        </th>
                                        <th>
                                            Entrega aprox
                                        </th>
                                        <th>
                                            Garantia
                                        </th>
                                        <th>
                                            ...
                                        </th>
                                    </tr>
                                </thead>
                                
                                <tbody class="js-table-sections-header">
                                <!--<tbody class="js-table-sections-header open">-->
                                    <tr class="font-size:12px;">
                                        <!-- ID general -->
                                        <td>
                                            <i class="fa fa-angle-right"></i> <span class="text-danger">342</span>
                                        </td>
                                        <!-- Nombre de la sucursal -->
                                        <td>
                                            Nom. Sucursal
                                        </td>
                                        <!-- Información del cliente -->
                                        <td>
                                            Cliente: <a href="#">Nombre del cliente</a>
                                            <br>
                                            Tel: <span class="text-primary">951 199 9723</span>
                                        </td>
                                        <!-- EQUIPO -->
                                        <td>
                                            <a href="#">
                                                Nombre del equipo
                                            </a>
                                            <p>
                                                Descripción: <span class="text-city">El equipo presenta falla en la pantalla, necesita ser reemplazada</span>
                                            </p>
                                        </td>
                                        <!-- Nombre del tecnico -->
                                        <td>
                                            Nom Tecnico
                                        </td>
                                        <!-- Fecha de entrega aprox -->
                                        <td>
                                            <span class="text-danger">
                                                <?= date('d/m/Y', time()) ?>
                                            </span> 
                                        </td>

                                        <!-- FECHA DE INGRESO -->
                                        <td>
                                            <?php 
                                                $validez = 2.592e+6; // 30 dias
                                                $fin_garantia = date('d/m/Y', time()+$validez);
                                             ?>
                                            <?= date('d/m/Y', time()); ?>
                                            -
                                            <?= $fin_garantia ?>
                                        </td>
                                        <!-- Acciones -->
                                        <td>
                                            <button class="btn btn-xs btn-success">
                                                <i class="fa fa-check"></i>
                                            </button>
                                            <button class="btn btn-xs btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>

                                    </tr>
                                </tbody>
                                <tbody style="font-size:12px;border: 2px solid #ee5253;">
                                    <tr style="margin:0px;padding:0px;">
                                        <td colspan="7" style="padding:0px;padding-top:10px;">
                                            <p class="h4">Historial de acciones</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <b>Fecha</b>
                                        </td>
                                        <td colspan="4">
                                            <b>Actualización</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <?= date('d/m/Y', time()) ?>
                                        </td>
                                        <td colspan="4">
                                            Reemplazo de pieza solicitado
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <?= date('d/m/Y', time()) ?>
                                        </td>
                                        <td colspan="4">
                                            Equipo revisado por el tecnico
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <?= date('d/m/Y', time()) ?>
                                        </td>
                                        <td colspan="4">
                                            En espera de entrar a revisión
                                        </td>
                                    </tr>

                                </tbody>
                               
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Sub opciones garantia -->
        </div>
    </div>
    <!-- END Opciones servico tecnico -->

</div>
<!-- FRM Registrar Proveedor -->
<div class="modal fade" id="modal-popout2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-popout">
        <div class="modal-content">
            <?php 
            $atributos = array('class="form-horizontal push-10-t block-content"');
            echo form_open_multipart('backend/MOD_SERV_TECNICO/Serv_tecnico/agregar'); 
            ?>
                <div class="block block-themed block-transparent remove-margin-b">
                    <div class="block-header bg-primary-dark">
                        <ul class="block-options">
                            <li>
                                <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                            </li>
                        </ul>
                        <h3 class="block-title">Registrar nuevo ingreso</h3>
                    </div>
                    <div class="block-content">
                        <div class="row text-justify">

                            <!-- Registrar nuevo cliente -->
                            <div class="col-md-5">
                                   <h3 class="h4">
                                        Información del cliente
                                    </h3>
                                    <hr>
                                    <div class="form-group">
                                        <div class="">
                                            <b class="text-success" style="margin-bottom:1em;">Buscar cliente</b>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-info" type="button"><i class="fa fa-search"></i> Buscar</button>
                                                </span>
                                                <input class="form-control" type="text" id="" name="" placeholder="Nombre y apellido, Nº Telefono" onkeyup="buscarCliente('this.value');">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row well">
                                        <div class="col-sm-12">
                                           <h4 style="margin-bottom: 1em;">Nuevo cliente</h4> 
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="nombre">* Nombre</label>
                                            <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente">
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="ap_paterno">Apellido Paterno</label>
                                            <input type="text" id="ap_paterno" name="ap_paterno" class="form-control">
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="ap_materno">Apellido Materno</label>
                                            <input type="text" id="ap_materno" name="ap_materno" class="form-control">
                                        </div>

                                        <div class="col-sm-12">
                                            <label for="num_telefono">* Nº Teléfono</label>
                                            <input type="text" id="num_telefono" name="num_telefono" class="form-control">
                                        </div>

                                        <div class="col-sm-12">
                                            <label for="informacion_extra">Información Extra</label>
                                            <textarea class="form-control" name="informacion_extra" id="informacion_extra"></textarea>
                                        </div>
                                    </div>
                            </div>
                            <!-- END Registrar nuevo cliente -->
                            <div class="col-md-7">
                                <!-- Div servicio_tecnico -->
                                <div id="div_servicio_tecnico">
                                    <p class="text-danger h3" >
                                        Servicio Técnico
                                    </p>

                                    <div class="row well" style="border-left: 3px solid #E77715;margin:10px;">
                                        <div class="col-sm-6">
                                            <label for="fecha_ingreso">FECHA DE INGRESO</label>
                                            <input type="date" class="form-control" id="fecha_ingreso" value="<?= date('Y-m-d', time()) ?>" readonly>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="fecha_entrega">* FECHA ESTIMADA DE ENTREGA</label>
                                            <input type="date" class="form-control" id="fecha_entrega" value="">
                                        </div>

                                        <div class="col-sm-6">
                                            <label for="imei">* IMEI</label>
                                            <input type="text" class="form-control" id="imei" name="imei">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="num_telefono_equipo">* Número de telefono</label>
                                            <input type="text" class="form-control" id="num_telefono_equipo" name="num_telefono_equipo">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="marca">* Marca</label>
                                            <input type="text" class="form-control" id="marca" name="marca">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="modelo">* Modelo</label>
                                            <input type="text" class="form-control" id="modelo" name="modelo">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="estado_fisico">* Estado fisico del equipo</label>
                                            <select class="form-control" name="estado_fisico" id="estado_fisico">
                                                <option>...</option>
                                                <option value="1">Excenlente</option>
                                                <option value="2">Bueno</option>
                                                <option value="3">Regular</option>
                                                <option value="4">Malo</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="evidencias">Evidencias</label>
                                            <input type="file" class="form-control" id="evidencias" name="evidencias">
                                        </div>

                                        <div class="col-sm-12" style="margin-top:2em;">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <label for="falla_reportada">* Falla reportada por el usuario</label>
                                                    <textarea class="form-control" name="falla_reportada" id="falla_reportada" rows="5"></textarea>
                                                </div>

                                                <div class="col-xs-6">
                                                    <label for="detalle_extra">Detalles Extra</label>
                                                    <textarea class="form-control" name="detalle_extra" id="detalle_extra" rows="5"></textarea>
                                                </div> 
                                            </div> 
                                        </div>

                                        <div class="col-sm-12" style="margin-top:2em;">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <label class="css-input css-radio css-radio-success">
                                                        <input name="tipo_bloqueo" type="radio" onclick="mostrarBloqueo('patron');" value="1"><span></span> <b>Patron de bloqueo</b>
                                                    </label>
                                                </div>
                                                <div class="col-xs-6">
                                                    <label class="css-input css-radio css-radio-success">
                                                        <input name="tipo_bloqueo" type="radio" onclick="mostrarBloqueo('codigo');" value="1"><span></span> <b>Codigo de bloqueo</b>
                                                    </label>
                                                </div> 
                                            </div>   
                                        </div>

                                        <div class="col-md-12">
                                            <div id="div-padron-bloqueo" style="display:none">
                                                <table class="table table-bordered" style="background:#fff;">
                                                    <tr class="text-center">
                                                        <td style="" colspan="3">
                                                            <h5 style="color:#e74c3c;">
                                                                Selecciona los cuadros para grabar el patron
                                                            </h5>
                                                        </td>
                                                    </tr>
                                                    <tr style="color:#000; border: 2px solid #52BE80;" class="text-center">
                                                        <td style="border: 2px solid #52BE80;" id="casilla1" onclick="mostrarSeleccion(this.id);">*</td>
                                                        <td style="border: 2px solid #52BE80;" id="casilla2" onclick="mostrarSeleccion(this.id);">*</td>
                                                        <td style="border: 2px solid #52BE80;" id="casilla3" onclick="mostrarSeleccion(this.id);">*</td>
                                                    </tr>
                                                    <tr style="color:#000; border: 2px solid #52BE80;" class="text-center">
                                                        <td style="border: 2px solid #52BE80;" id="casilla4" onclick="mostrarSeleccion(this.id);">*</td>
                                                        <td style="border: 2px solid #52BE80;" id="casilla5" onclick="mostrarSeleccion(this.id);">*</td>
                                                        <td style="border: 2px solid #52BE80;" id="casilla6" onclick="mostrarSeleccion(this.id);">*</td>
                                                    </tr>
                                                    <tr style="color:#000; border: 2px solid #52BE80;" class="text-center">
                                                        <td style="border: 2px solid #52BE80;" id="casilla7" onclick="mostrarSeleccion(this.id);">*</td>
                                                        <td style="border: 2px solid #52BE80;" id="casilla8" onclick="mostrarSeleccion(this.id);">*</td>
                                                        <td style="border: 2px solid #52BE80;" id="casilla9" onclick="mostrarSeleccion(this.id);">*</td>
                                                    </tr>
                                                </table>                                            
                                            </div>
                                            <div id="div-codigo-bloqueo" style="display:none">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td>
                                                            <h5 style="color:#e74c3c;">
                                                                Escribe el código de bloqueo
                                                            </h5>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="number" class="form-control" id="codigo_bloqueo" name="codigo_bloqueo" placeholder="Código de bloqueo">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <!-- END Div servicio_tecnico -->  
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="tipo-bloqueo" name="tipo_bloqueo" value="">
                    <input type="hidden" id="casilla_seleccionada" name="casilla_seleccionada">
                    <input type="hidden" id="numero-inicial-patron" value="0">
                    <button class="btn btn-default" type="button" data-dismiss="modal">Cerrar</button>
                    <button class="btn btn-success" type="submit">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END FRM Registrar Proveedor -->
<script>
    var contadorPatron = document.getElementById('numero-inicial-patron').value;
    var ultimoId;
    var casillaSeleccionada = '';
    function mostrarBloqueo(tipo){
        if(tipo == 'patron'){
            document.getElementById('div-padron-bloqueo').style.display = 'block';
            document.getElementById('div-codigo-bloqueo').style.display = 'none';
            document.getElementById('tipo-bloqueo').value = tipo;
        }else if(tipo == 'codigo'){
            document.getElementById('div-padron-bloqueo').style.display = 'none';
            document.getElementById('div-codigo-bloqueo').style.display = 'block';
            document.getElementById('tipo-bloqueo').value = tipo;
        }
    }

    function mostrarSeleccion(id){
        contadorPatron++;

        document.getElementById(id).style = 'background:#2ecc71;color:#fff;';
        document.getElementById(id).innerHTML = contadorPatron;

        casillaSeleccionada += id+',';

        document.getElementById('casilla_seleccionada').value = casillaSeleccionada;
    }
</script>
<!-- OneUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock, Appear, CountTo, Placeholder, Cookie and App.js -->
<script src="<?= base_url('assets/js/propios/funciones.js') ?>"></script>
<script src="<?php echo base_url(); ?>assets/js/core/jquery.min.js"></script>

<!-- Page JS Code -->
<script>
    jQuery(function () {
        // Init page helpers (Table Tools helper)
        App.initHelpers('table-tools');
    });
</script>