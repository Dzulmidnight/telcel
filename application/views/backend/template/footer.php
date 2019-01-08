            </main>
            <!-- END Main Container -->

            <!-- Footer -->
            <footer id="page-footer" class="content-mini content-mini-full font-s12 bg-gray-lighter clearfix">
                <div class="pull-left">
                    <a class="font-w600" href="http://goo.gl/6LF10W" target="_blank">Developed by Inforganic Technologies</a>
                </div>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->

        <!-- Apps Modal -->
        <!-- Opens from the button in the header -->
        <div class="modal fade" id="apps-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-md modal-dialog modal-dialog-top">
                <div class="modal-content">
                    <!-- Apps Block -->
                    <div class="block block-themed block-transparent">
                        <div class="block-header bg-primary-dark">
                            <ul class="block-options">
                                <li>
                                    <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                </li>
                            </ul>
                            <h3 class="block-title">Modulos</h3>
                        </div>
                        <div class="block-content">
                            <div class="row text-center">

                                <div class="col-xs-12">
                                    <a class="block block-link-hover2 text-center" href="<?php echo base_url('backend/inicio'); ?>">
                                        <div class="block-content block-content-full bg-success">
                                            <i class="si si-calculator fa-4x text-white"></i>
                                            <div class="font-w600 text-white-op push-15-t">Dashboard</div>
                                        </div>
                                    </a>
                                </div>
                                <?= $menu_general ?>

                            </div>
                        </div>
                    </div>
                    <!-- END Apps Block -->
                </div>
            </div>
        </div>
        <!-- END Apps Modal -->



<!-- Modal servicios -->
<div class="modal fade" id="modal-servicios" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-popout">
        <div class="modal-content">
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header bg-primary-dark">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Servicios</h3>
                </div>
                <div class="block-content" style="margin-bottom: 4em;">
                    <div class="row text-justify">
                        <div class="col-md-12">
                            <h3>
                                Tipos de servicios
                            </h3>
                            <p>
                                Por favor seleccione un tipo de servicio.
                            </p>
                        </div>


                        <!--
                        <div id="div_servicio_express" class="col-md-3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <a class="block block-link-hover3 text-center" href="#" onclick="mostrarServicio('mostrar', 'servicio_express');">
                                        <div class="block-content block-content-full">
                                            <div class="h1 font-w700 text-success"><i class="fa fa-plus"></i></div>
                                        </div>
                                        <div class="block-content block-content-full block-content-mini bg-gray-lighter text-success font-w600">Venta</div>
                                    </a>                                    
                                </div>
                                <div class="col-xs-12 explicacion">
                                    <div class="block block-rounded">
                                        <div class="block-header bg-gray-lighter">
                                            <h4 class="block-title">Venta</h4>
                                        </div>
                                        <div class="block-content">
                                            <p>
                                                Servicios que no necesitan registrar información del cliente.   
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    -->
                        <div id="div_servicio" class="col-md-4">
                            <div class="row">
                                <div class="col-xs-12">
                                    <a class="block block-link-hover3 text-center" href="<?php echo base_url("backend/MOD_SERVICIOS/servicios/index/detallado"); ?>">
                                        <div class="block-content block-content-full">
                                            <div class="h1 font-w700 text-success"><i class="fa fa-plus"></i></div>
                                        </div>
                                        <div class="block-content block-content-full block-content-mini bg-gray-lighter text-success font-w600">Venta</div>
                                    </a>                                    
                                </div>
                                <div class="col-xs-12 explicacion">
                                    <div class="block block-rounded">
                                        <div class="block-header bg-gray-lighter">
                                            <h4 class="block-title">Venta</h4>
                                        </div>
                                        <div class="block-content">
                                            <p>
                                                Opción para ingresar ventas y reparaciones
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div id="div_servicio_interno" class="col-md-4">
                            <div class="row">
                                <div class="col-xs-12">
                                    <a class="block block-link-hover3 text-center" href="#" onclick="mostrarServicio('mostrar', 'servicio_interno');">
                                        <div class="block-content block-content-full">
                                            <div class="h1 font-w700 text-warning"><i class="fa fa-plus"></i></div>
                                        </div>
                                        <div class="block-content block-content-full block-content-mini bg-gray-lighter text-warning font-w600">Pago Interno</div>
                                    </a>                                    
                                </div>

                                <div class="col-xs-12 explicacion">
                                    <div class="block block-rounded">
                                        <div class="block-header bg-gray-lighter">
                                            <h4 class="block-title">Pago Interno</h4>
                                        </div>
                                        <div class="block-content">
                                            <p>
                                                Servicios relacionados al pago de sucursal (luz, internet, renta)
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="div_listado_servicios" class="col-md-4">
                            <div class="row">
                                <div class="col-xs-12">
                                    <a class="block block-link-hover3 text-center" href="<?php echo base_url('backend/MOD_SERVICIOS/servicios/listado'); ?>">
                                        <div class="block-content block-content-full">
                                            <div class="h1 font-w700 text-info"><i class="fa fa-search"></i></div>
                                        </div>
                                        <div class="block-content block-content-full block-content-mini bg-gray-lighter text-info font-w600">Listado</div>
                                    </a>                                    
                                </div>
                                <div class="col-xs-12 explicacion">
                                    <div class="block block-rounded">
                                        
                                        <div class="block-content">
                                            <p>
                                                Consultar listado de servicios realizados
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Div servicio_interno -->
                        <div class="col-md-8" id="frm_servicio_interno" style="display: none">
                            <form class="form-horizontal push-10-t" action="base_forms_elements.html" method="post" onsubmit="return false;">
                                <h3 class="text-warning">
                                    Registrar Servicio Interno
                                </h3>
                                <hr>
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <div class="form-material">
                                            <select class="form-control" id="material-select" name="material-select" size="1" required="">
                                                <option>...</option>
                                                <option value="1">Pago Luz</option>
                                                <option value="2">Pago Internet</option>
                                                <option value="3">Pago Local</option>
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

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <div class="form-material form-material-primary">
                                            <input class="form-control" type="number" step="0.01" id="material-color-primary" name="material-color-primary" placeholder="Ej: 150.50" required>
                                            <label for="material-color-primary">Monto del servicio *</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <div class="form-material">
                                            <textarea class="form-control" id="material-textarea-small" name="material-textarea-small" rows="3" placeholder="Opcional: detalles del servicio"></textarea>
                                            <label for="material-textarea-small">Detalles del servicio</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-material">
                                            <input type="file" class="form-control" id="comprobante_pago" name="comprobante_pago">
                                            <label for="comprobante_pago">Comprobante de pago</label>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group text-right">
                                    <div class="col-sm-12">
                                        <button type="button" class="btn btn-default" onclick="mostrarServicio('cancelar', 'servicio_interno')">
                                            Cancelar
                                        </button>
                                        <button class="btn btn-success">
                                            Registrar servicio
                                        </button>  
                                    </div>
                                </div>

                            </form>
                        </div>
                        <!-- End Div servicio_interno -->

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- END Modal servicios -->


<script>
    function otraFuncion(){
        JsBarcode("#barcode", "1233213123",{
            displayValue: true
        });
    }

    function mostrarServicio(accion, servicio){
        var frm = 'frm_'+servicio;
        var div = '';


        if(accion == 'mostrar'){
            document.getElementById('div_servicio').style.display = 'none';
            document.getElementById('div_listado_servicios').style.display = 'none';
            document.getElementById(frm).style.display = 'block';
        }else if(accion == 'cancelar'){
            frm = 'frm_'+servicio;

            document.getElementById('div_servicio').style.display = 'block';
            document.getElementById('div_listado_servicios').style.display = 'block';
            document.getElementById(frm).style.display = 'none';
        }

    }
</script>


<script>
    function modalVentas(){
        $('#modal-servicios').modal('show');
    }

    function eliminar(id, frm){
        document.getElementById('id_eliminar').value = id;
        
        swal({
            title: "Eliminar",
            text: "¿Desear eliminar la información?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                swal("La información ha sido eliminada", {
                  icon: "success",
                });
                    document.getElementById(frm).submit();
            } /*else {
                swal("Your imaginary file is safe!");
            }*/
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
</script>
        <script src="<?php echo base_url(); ?>assets/js/propios/barcode.js"></script>
        <!-- OneUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock, Appear, CountTo, Placeholder, Cookie and App.js -->
        <script src="<?php echo base_url(); ?>assets/js/core/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/core/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/core/jquery.slimscroll.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/core/jquery.scrollLock.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/core/jquery.appear.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/core/jquery.countTo.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/core/jquery.placeholder.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/core/js.cookie.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/app.js"></script>

        <!-- Page JS Plugins -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/datatables/jquery.dataTables.min.js"></script>

        <!-- Page JS Code -->
        <script src="<?php echo base_url(); ?>assets/js/pages/base_tables_datatables.js"></script>

        <!-- Page JS Plugins -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-datetimepicker/moment.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/select2/select2.full.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/masked-inputs/jquery.maskedinput.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/jquery-auto-complete/jquery.auto-complete.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/dropzonejs/dropzone.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/autonumeric/autoNumeric.min.js"></script>


        <script src="<?php echo base_url(); ?>assets/js/pages/base_forms_pickers_more.js"></script>
        <!-- Page Plugins -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/slick/slick.min.js"></script>

        <script>
            jQuery(function () {
                // Init page helpers (BS Datepicker + BS Datetimepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Input + Range Sliders + Tags Inputs + AutoNumeric plugins)
                App.initHelpers(['slick','datepicker', 'datetimepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider', 'tags-inputs', 'autonumeric', 'notify']);
            });
        </script>



    </body>
</html>