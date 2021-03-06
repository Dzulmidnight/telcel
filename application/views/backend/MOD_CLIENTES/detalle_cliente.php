<!-- Page Header -->
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h3 class="page-heading">
                PERFIL CLIENTE
            </h3>
        </div>

        <div class="col-sm-5 text-right hidden-xs">
            <button class="btn btn-rounded btn-primary" onclick="history.back(-1)">
                <i class="fa fa-arrow-left"></i> Regresar
            </button>
        </div>
    </div>

</div>
<!-- END Page Header -->

<!-- Page Content -->
<div class="content">

    <div class="block">
        <!-- Main Content -->
        <div class="row">
            <div class="col-sm-5 col-sm-push-7 col-lg-4 col-lg-push-8">

                <!-- About -->
                <div class="block">
                    <div class="block-content">
                        <p class="h4 text-city">
                            <span>
                                Nombre del cliente
                            </span>
                        </p>
                        <p>
                            Telefono: <span class="text-primary">951 199 9723</span>
                        </p>
                        <p>
                            Información extra: <span class="text-primary">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum non voluptas earum odit facilis autem iste verita.</span>
                        </p>
                    </div>
                </div>
                <!-- END About -->

                <!-- Products -->
                <div class="block block-opt-refresh-icon6">
                    <div class="block-header">
                        <ul class="block-options">
                            <li>
                                <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                            </li>
                        </ul>
                        <h3 class="block-title"><i class="fa fa-fw fa-briefcase"></i> Compras recientes</h3>
                    </div>
                    <div class="block-content">
                        <ul class="list list-simple list-li-clearfix">
                            <li>
                                <a class="item item-rounded pull-left push-10-r bg-city" href="javascript:void(0)">
                                    <i class="text-white-op si si-handbag"></i>
                                </a>
                                <h5 class="push-10-t">Tipo de producto</h5>
                                <div class="font-s13">Nombre del articulo</div>
                            </li>

                            <li>
                                <a class="item item-rounded pull-left push-10-r bg-city" href="javascript:void(0)">
                                    <i class="text-white-op si si-handbag"></i>
                                </a>
                                <h5 class="push-10-t">Tipo de producto</h5>
                                <div class="font-s13">Nombre del articulo</div>
                            </li>

                            <li>
                                <a class="item item-rounded pull-left push-10-r bg-city" href="javascript:void(0)">
                                    <i class="text-white-op si si-handbag"></i>
                                </a>
                                <h5 class="push-10-t">Tipo de producto</h5>
                                <div class="font-s13">Nombre del articulo</div>
                            </li>

                        </ul>
                        <div class="text-center push">
                            <small><a href="javascript:void(0)">Ver más..</a></small>
                        </div>
                    </div>
                </div>
                <!-- END Products -->

            </div>
            <div class="col-sm-7 col-sm-pull-5 col-lg-8 col-lg-pull-4">
                <!-- Timeline -->
                <div class="block block-opt-refresh-icon6">
                    <div class="block-header">
                        <!--<ul class="block-options">
                            <li>
                                <button type="button" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                            </li>
                            <li>
                                <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                            </li>
                        </ul>-->
                        <h3 class="block-title"><i class="fa fa-newspaper-o"></i> Actualizaciones</h3>
                    </div>
                    <div class="block-content">



                        <!-- Generic Notification -->
                        <div class="block block-transparent pull-r-l">
                            <div class="block-header bg-gray-lighter">
                                <ul class="block-options">
                                    <li>
                                        <span><em class="text-muted">Hace 4 hrs</em></span>
                                    </li>
                                    <li>
                                        <span><i class="fa fa-briefcase text-modern"></i></span>
                                    </li>
                                </ul>
                                <h3 class="block-title">3 Nuevos productos</h3>
                            </div>
                            <div class="block-content block-content-full">
                                <a class="item item-rounded push-10-r bg-info" data-toggle="tooltip" title="Nombre del producto" href="javascript:void(0)">
                                    <i class="si si-rocket text-white-op"></i>
                                </a>
                                <a class="item item-rounded push-10-r bg-amethyst" data-toggle="tooltip" title="Nombre del producto" href="javascript:void(0)">
                                    <i class="si si-handbag"></i>
                                </a>
                                <a class="item item-rounded push-10-r bg-city" data-toggle="tooltip" title="Nombre del producto" href="javascript:void(0)">
                                    <i class="si si-speedometer text-white-op"></i>
                                </a>
                            </div>
                        </div>
                        <!-- END Generic Notification -->


                        <!-- System Notification -->
                        <div class="block block-transparent pull-r-l">
                            <div class="block-header bg-gray-lighter">
                                <ul class="block-options">
                                    <li>
                                        <span><em class="text-muted">Hace 1 sem</em></span>
                                    </li>
                                    <li>
                                        <span><i class="fa fa-cog text-primary-dark"></i></span>
                                    </li>
                                </ul>
                                <h3 class="block-title">Equipo a servicio tecnico</h3>
                            </div>
                            <div class="block-content">
                                <p class="font-s13">Revisar estatus del equipo</p>
                            </div>
                        </div>
                        <!-- END System Notification -->


                      
                    </div>
                </div>
                <!-- END Timeline -->
            </div>
        </div>
        <!-- END Main Content -->
    </div>
</div>


<script src="<?php echo base_url(); ?>assets/js/core/jquery.min.js"></script>
<!-- Page JS Plugins -->
<script src="<?php echo base_url(); ?>assets/js/plugins/chartjsv2/Chart.min.js"></script>
<!-- Page JS Code -->
<script src="<?php echo base_url(); ?>assets/js/pages/base_comp_chartjs_v2.js"></script>