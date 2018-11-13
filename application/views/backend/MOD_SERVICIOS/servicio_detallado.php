<!-- Page Header -->
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h3 class="page-heading">
                Servicio Detallado
            </h3>
        </div>
        <div class="col-sm-5 text-right hidden-xs">
            <button class="btn btn-primary" onclick="history.back(-1)">
                <i class="fa fa-arrow-left"></i> Regresar
            </button>
        </div>
    </div>
</div>
<!-- END Page Header -->

<!-- Page Content -->
<div class="content">
    <div class="content-grid push-50">
        <div class="row">

            <!-- Registrar nuevo cliente -->
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
                                <input class="form-control" type="text" id="example-input1-group2" name="example-input1-group2" placeholder="Nombre y apellido, Nº Telefono">
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
            <!-- END Registrar nuevo cliente -->

            <!-- Bloques servicio detallado -->
            <div class="col-md-6 block">
                <form id="frm_servicio_detallado" class="form-horizontal push-10-t block-content " action="base_forms_elements.html" method="post" onsubmit="return false;">
                    <h3 class="">
                        Registrar Servicio Detallado
                    </h3>
                    <hr style="margin-bottom: 2em;">
                    <div class="form-group">
                        <div class="col-xs-6">
                            <div class="form-material">
                                <select class="form-control" id="material-select" name="material-select" size="1" required="" onchange="tipoServicio(this.value)">
                                    <option>...</option>
                                    <option value="1">Venta de accesorios</option>
                                    <option value="2">Venta de equipo telefonico</option>
                                    <option value="3">Servicio Tecnico</option>
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
                    <div id="contenedor_bloques">               
                        <!-- Div venta_accesorios -->
                        <div id="div_venta_accesorios" style="display:none">
                            <h3 style="margin-bottom: 1em">
                                Venta de Accesorios
                            </h3>

                            <div class="form-group">
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-material form-material-primary">
                                        <input class="form-control" type="number" min="0" id="material-color-primary" name="material-color-primary" placeholder="Codigo del accesorio" required>
                                        <label for="material-color-primary">CODIGO *</label>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-material form-material-primary">
                                        <input class="form-control" type="number" step="0.01" min="0" id="material-color-primary" name="material-color-primary" placeholder="Ej: 150.50" required>
                                        <label for="material-color-primary">Costo *</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row" style="margin-bottom:1em;">
                                <div class="col-md-12">
                                    <h4>Información del accesorio</h4>
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
                        </div>
                        <!-- END Div venta_accesorios -->

                        <!-- Div venta_telefono -->
                        <div id="div_venta_telefono" style="display:none">
                            <h3 style="margin-bottom: 1em">
                                Venta de Equipo
                            </h3>

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
                        </div>
                        <!-- END Div venta_telefono -->

                        <!-- Div servicio_tecnico -->
                        <div id="div_servicio_tecnico" style="display:none">
                            <h3 style="margin-bottom: 1em">
                                Servicio Técnico
                            </h3>

                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="fecha_ingreso">FECHA DE INGRESO</label>
                                    <input type="date" class="form-control" id="fecha_ingreso" value="<?= date('Y-m-d', time()) ?>" readonly>
                                </div>
                                <div class="col-sm-6">
                                    <label for="fecha_entrega">FECHA ESTIMADA DE ENTREGA *</label>
                                    <input type="date" class="form-control" id="fecha_entrega" value="">
                                </div>
                            </div>
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

                            <div class="form-group">
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-material form-material-primary">
                                        <input class="form-control" type="number" min="0" id="material-color-primary" name="material-color-primary" placeholder="IMEI del equipo" required>
                                        <label for="material-color-primary">Marca *</label>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-material form-material-primary">
                                        <input class="form-control" type="number" min="0" id="material-color-primary" name="material-color-primary" placeholder="Telefono" required>
                                        <label for="material-color-primary">Modelo *</label>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="material-select">Estado fisico del equipo *</label>
                                    <select class="form-control" id="material-select" name="material-select" size="1" required="" onchange="tipoServicio()">
                                        <option>...</option>
                                        <option value="1">Venta de equipo telefonico</option>
                                        <option value="2">Servicio Tecnico</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-material">
                                        <textarea class="form-control" id="material-textarea-small" name="material-textarea-small" rows="2" placeholder="Opcional: detalles del servicio"></textarea>
                                        <label for="material-textarea-small">Falla reportada por el usuario *</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-6">
                                    <div class="form-material">
                                        <label for="evidencias">Evidencias</label>
                                        <input type="file" class="form-control" id="evidencias" name="evidencias">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-material">
                                        <textarea class="form-control" id="material-textarea-small" name="material-textarea-small" rows="3" placeholder="Opcional: detalles del servicio"></textarea>
                                        <label for="material-textarea-small">Detalles Extra</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label class="css-input css-checkbox css-checkbox-success">
                                        <input type="checkbox"><span></span> <b>Patron de bloqueo</b>
                                    </label>
                                </div>
                            </div>

                        </div>
                        <!-- END Div servicio_tecnico -->     

                    </div>

                    <div id="acciones_servicio" class="col-md-12" style="display:none">
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

                </form>
            </div>
            <!-- END Bloques servicio detallado -->
		</div>
	</div>
</div>


 ?>
<script>
    function tipoServicio(tipo){
        var hijos = document.querySelectorAll("div#contenedor_bloques > div");
        
        tipo = tipo - 1;
        
        for (var i = 0; i < hijos.length; i++) {
            var div_id = hijos[i].id;

            if(tipo == i ){
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