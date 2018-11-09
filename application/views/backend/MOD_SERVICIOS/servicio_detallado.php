<!-- Page Header -->
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h3 class="page-heading">
                Servicio Detallado
            </h3>
        </div>
        <!--<div class="col-sm-5 text-right hidden-xs">
            <ol class="breadcrumb push-10-t">
                <li>UI Elements</li>
                <li><a class="link-effect" href="">Tiles</a></li>
            </ol>
        </div>-->
    </div>
</div>
<!-- END Page Header -->

<!-- Page Content -->
<div class="content content-narrow">
    <!-- Modulos -->
    <button class="btn btn-primary" onclick="history.back(-1)">
        <i class="fa fa-arrow-left"></i> Regresar
    </button>
    <div class="content-grid push-50">
        <div class="row">
        	<div class="col-md-6 block">
                <form class="form-horizontal push-10-t block-content" action="base_forms_elements.html" method="post" onsubmit="return false;">
                    <h3 class="">
                        Información del cliente
                    </h3>
                    <hr>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <b class="text-success">Buscar cliente</b>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <button class="btn btn-info" type="button"><i class="fa fa-search"></i> Buscar</button>
                                </span>
                                <input class="form-control" type="text" id="example-input1-group2" name="example-input1-group2" placeholder="Nombre y apellido">
                            </div>
                        </div>
                    </div>
                    <hr>

                    <h4 style="margin-bottom: 1em;">Nuevo cliente</h4>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <div class="form-material form-material-primary">
                                <input class="form-control" type="text" id="material-color-primary" name="material-color-primary" placeholder="" required>
                                <label for="material-color-primary">Nombre *</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-material form-material-primary">
                                <input class="form-control" type="text" id="material-color-primary" name="material-color-primary" placeholder="" required>
                                <label for="material-color-primary">Nº Telefono *</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <div class="form-material form-material-primary">
                                <input class="form-control" type="text" id="material-color-primary" name="material-color-primary" placeholder="" required>
                                <label for="material-color-primary">Apellido Paterno *</label>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-material form-material-primary">
                                <input class="form-control" type="text" id="material-color-primary" name="material-color-primary" placeholder="" required>
                                <label for="material-color-primary">Apellido Materno *</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material">
                                <textarea class="form-control" id="material-textarea-small" name="material-textarea-small" rows="3" placeholder="Opcional: detalles del servicio"></textarea>
                                <label for="material-textarea-small">Información extra</label>
                            </div>
                        </div>
                    </div>
                </form>

        	</div>

            <div class="col-md-6 block">
                <form id="frm_servicio_detallado" class="form-horizontal push-10-t block-content " action="base_forms_elements.html" method="post" onsubmit="return false;">
                    <h3 class="">
                        Registrar Servicio Detallado
                    </h3>
                    <hr style="margin-bottom: 2em;">
                    <div class="form-group">
                        <div class="col-xs-6">
                            <div class="form-material">
                                <select class="form-control" id="material-select" name="material-select" size="1" required="" onchange="tipoServicio()">
                                    <option>...</option>
                                    <option value="1">Venta de equipo telefonico</option>
                                    <option value="2">Servicio Tecnico</option>
                                </select>
                                <label for="material-select">Servicios recurrentes *</label>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-material form-material-primary">
                                <input class="form-control" type="text" id="material-color-primary" name="material-color-primary" placeholder="Nuevo servicio">
                                <label for="material-color-primary">Otro servicio</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <hr>
                    </div>
                    
                    <!-- Div venta_telefono -->
                    <div id="div_venta_telefono">
                        <div class="form-group">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-material form-material-primary">
                                    <input class="form-control" type="number" min="0" id="material-color-primary" name="material-color-primary" placeholder="IMEI del equipo" required>
                                    <label for="material-color-primary">IMEI *</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-material form-material-primary">
                                    <input class="form-control" type="number" min="0" id="material-color-primary" name="material-color-primary" placeholder="Telefono" required>
                                    <label for="material-color-primary">Nº Telefono *</label>
                                </div>
                            </div>

                        </div>



                    </div>
                    <!-- END Div venta_telefono -->

                    <div class="form-group">
                        <div class="col-sm-6">
                            <div class="form-material form-material-primary">
                                <input class="form-control" type="number" step="0.01" min="0" id="material-color-primary" name="material-color-primary" placeholder="Ej: 150.50" required>
                                <label for="material-color-primary">Costo del equipo *</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row" style="margin-bottom:1em;">
                        <div class="col-md-12">
                            <h4>Información del equipo</h4>
                        </div>
                        
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <tr>
                                    <td>Costo</td>
                                    <td class="text-primary">$ 21,000 MXN</td>

                                    <td>Marca</td>
                                    <td class="text-primary">Samsung</td>
                                </tr>
                                <tr>
                                    <td>Modelo</td>
                                    <td class="text-primary">Galaxy S10</td>

                                    <td>Color</td>
                                    <td class="text-primary">Azul</td>
                                </tr>
                                <tr>
                                    <td>IMEI</td>
                                    <td class="text-primary">232423423</td>

                                    <td>ICCID</td>
                                    <td class="text-primary">SDAA3341342</td>
                                </tr>
                            </table>
                        </div>

                    </div>



                </form>

            </div>

            <div class="col-md-12">
                <div class="form-group text-right">
                    <div class="col-sm-12">
                        <button type="button" class="btn btn-default" onclick="mostrarServicio('cancelar', 'servicio_interno')">
                            Cancelar
                        </button>
                        <button class="btn btn-success" onclick="registrarServicio()">
                            Registrar servicio
                        </button>  
                    </div>
                </div>
            </div>

		</div>
	</div>
</div>

<script>
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