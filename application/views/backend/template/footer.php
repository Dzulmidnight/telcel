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
                                <div class="col-xs-6">
                                    <a class="block block-link-hover2 text-center" href="#" data-toggle="modal" data-target="#modal-popout">
                                        <div class="block-content block-content-full bg-primary">
                                            <i class="si si-shuffle fa-4x text-white"></i>
                                            <div class="font-w600 text-white-op push-15-t">Servicios</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xs-6">
                                    <a class="block block-link-hover2 text-center" href="<?php echo base_url('backend/MOD_CLIENTES/clientes'); ?>">
                                        <div class="block-content block-content-full bg-success">
                                            <i class="si si-calculator fa-4x text-white"></i>
                                            <div class="font-w600 text-white-op push-15-t">Clientes</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xs-6">
                                    <a class="block block-link-hover2 text-center" href="javascript:void(0)">
                                        <div class="block-content block-content-full bg-primary-dark">
                                            <i class="si si-film fa-4x text-white"></i>
                                            <div class="font-w600 text-white-op push-15-t">Personal</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xs-6">
                                    <a class="block block-link-hover2 text-center" href="javascript:void(0)">
                                        <div class="block-content block-content-full bg-modern">
                                            <i class="si si-crop fa-4x text-white"></i>
                                            <div class="font-w600 text-white-op push-15-t">Proveedores</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xs-6">
                                    <a class="block block-link-hover2 text-center" href="<?php echo base_url('backend/MOD_INVENTARIO/inventario'); ?>">
                                        <div class="block-content block-content-full bg-amethyst">
                                            <i class="si si-settings fa-4x text-white"></i>
                                            <div class="font-w600 text-white-op push-15-t">Inventario</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xs-6">
                                    <a class="block block-link-hover2 text-center" href="javascript:void(0)">
                                        <div class="block-content block-content-full bg-city">
                                            <i class="si si-game-controller fa-4x text-white"></i>
                                            <div class="font-w600 text-white-op push-15-t">Garantia</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xs-6">
                                    <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                                        <div class="block-content block-content-full">
                                            <i class="si si-support fa-4x text-muted"></i>
                                            <div class="font-w600 push-15-t">Finanzas</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xs-6">
                                    <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                                        <div class="block-content block-content-full">
                                            <i class="si si-speedometer fa-4x text-danger"></i>
                                            <div class="font-w600 push-15-t">Sucursales</div>
                                        </div>
                                    </a>
                                </div>



                            </div>
                        </div>
                    </div>
                    <!-- END Apps Block -->
                </div>
            </div>
        </div>
        <!-- END Apps Modal -->

<script>
    function eliminar(){
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
                App.initHelpers(['slick','datepicker', 'datetimepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider', 'tags-inputs', 'autonumeric']);
            });
        </script>


    </body>
</html>