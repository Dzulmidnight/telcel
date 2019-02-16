
<!-- Side Overlay-->
<aside id="side-overlay">
    <!-- Side Overlay Scroll Container -->
    <div id="side-overlay-scroll">
        <!-- Side Header -->
        <div class="side-header side-content">
            <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
            <button class="btn btn-default pull-right" type="button" data-toggle="layout" data-action="side_overlay_close">
                <i class="fa fa-times"></i>
            </button>
            <span>
                <img class="img-avatar img-avatar32" src="<?php echo base_url(); ?>assets/img/avatars/avatar10.jpg" alt="">
                <span class="font-w600 push-10-l">Nombre administrador</span>
            </span>
        </div>
        <!-- END Side Header -->

        <!-- Side Content -->
        <div class="side-content remove-padding-t">
            <!-- Side Overlay Tabs -->
            <div class="block pull-r-l border-t">
                <ul class="nav nav-tabs nav-tabs-alt nav-justified" data-toggle="tabs">
                    <li class="active">
                        <a href="#tabs-side-overlay-overview"><i class="fa fa-fw fa-line-chart"></i> Finanzas</a>
                    </li>
                    <li>
                        <a href="#tabs-side-overlay-sales"><i class="fa fa-fw fa-line-chart"></i> Sales</a>
                    </li>
                </ul>
                <div class="block-content tab-content">
                    <!-- Tab Finanzas -->
                    <div class="tab-pane fade fade-right in active" id="tabs-side-overlay-overview">
                        <div class="block pull-r-l">
                            <!-- Stats -->
                            <div class="block-content pull-t">
                                <div class="row items-push">
                                    <div class="col-xs-6">
                                        <div class="font-w700 text-gray-darker text-uppercase">Ventas</div>
                                        <a class="h3 font-w300 text-primary" href="javascript:void(0)">22030</a>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="font-w700 text-gray-darker text-uppercase">Balance</div>
                                        <a class="h3 font-w300 text-primary" href="javascript:void(0)">$ 4.589,00</a>
                                    </div>
                                </div>
                            </div>
                            <!-- END Stats -->

                            <!-- Today -->
                            <div class="block-content block-content-full block-content-mini bg-gray-lighter">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <span class="font-w600 font-s13 text-gray-darker text-uppercase">Hoy</span>
                                    </div>
                                    <div class="col-xs-6 text-right">
                                        <span class="font-s13 text-muted">$996</span>
                                    </div>
                                </div>
                            </div>
                            <div class="block-content">
                                <ul class="list list-activity pull-r-l">
                                    <li>
                                        <i class="fa fa-circle text-success"></i>
                                        <div class="font-w600">Nuevo servico! + $249</div>
                                        <div><small class="text-muted">hace 3 min</small></div>
                                    </li>
                                    <li>
                                        <i class="fa fa-circle text-success"></i>
                                        <div class="font-w600">Nuevo servico! + $129</div>
                                        <div><small class="text-muted">hace  50 min</small></div>
                                    </li>
                                    <li>
                                        <i class="fa fa-circle text-success"></i>
                                        <div class="font-w600">Nuevo servico! + $119</div>
                                        <div><small class="text-muted">hace 2 hours</small></div>
                                    </li>
                                    <li>
                                        <i class="fa fa-circle text-success"></i>
                                        <div class="font-w600">Nuevo servico! + $499</div>
                                        <div><small class="text-muted">hace 3 hours</small></div>
                                    </li>
                                </ul>
                            </div>
                            <!-- END Today -->

                            <!-- Yesterday -->
                            <div class="block-content block-content-full block-content-mini bg-gray-lighter">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <span class="font-w600 font-s13 text-gray-darker text-uppercase">Ayer</span>
                                    </div>
                                    <div class="col-xs-6 text-right">
                                        <span class="font-s13 text-muted">$765</span>
                                    </div>
                                </div>
                            </div>
                            <div class="block-content">
                                <ul class="list list-activity pull-r-l">
                                    <li>
                                        <i class="fa fa-circle text-success"></i>
                                        <div class="font-w600">Nueva venta! + $249</div>
                                        <div><small class="text-muted">hace 26 hours</small></div>
                                    </li>
                                    <li>
                                        <i class="fa fa-circle text-danger"></i>
                                        <div class="font-w600">Compra de producto - $50</div>
                                        <div><small class="text-muted">hace 28 hours</small></div>
                                    </li>
                                    <li>
                                        <i class="fa fa-circle text-success"></i>
                                        <div class="font-w600">Nueva venta! + $119</div>
                                        <div><small class="text-muted">hace 29 hours</small></div>
                                    </li>
                                    <li>
                                        <i class="fa fa-circle text-danger"></i>
                                        <div class="font-w600">Pago de servicio - $300</div>
                                        <div><small class="text-muted">hace 37 hours</small></div>
                                    </li>
                                    <li>
                                        <i class="fa fa-circle text-success"></i>
                                        <div class="font-w600">Nueva venta! + $129</div>
                                        <div><small class="text-muted">hace 39 hours</small></div>
                                    </li>
                                    <li>
                                        <i class="fa fa-circle text-success"></i>
                                        <div class="font-w600">Nueva venta! + $119</div>
                                        <div><small class="text-muted">hace 45 hours</small></div>
                                    </li>
                                    <li>
                                        <i class="fa fa-circle text-success"></i>
                                        <div class="font-w600">Nueva venta! + $499</div>
                                        <div><small class="text-muted">hace 46 hours</small></div>
                                    </li>
                                </ul>
                            </div>
                            <!-- END Yesterday -->

                            <!-- More -->
                            <div class="text-center">
                                <small><a href="javascript:void(0)">Load More..</a></small>
                            </div>
                            <!-- END More -->
                        </div>
                    </div>
                    <!-- END Tab Finanzas -->

                </div>
            </div>
            <!-- END Side Overlay Tabs -->
        </div>
        <!-- END Side Content -->
    </div>
    <!-- END Side Overlay Scroll Container -->
</aside>
<!-- END Side Overlay -->