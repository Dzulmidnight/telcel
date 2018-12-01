<!-- Sidebar -->
<nav id="sidebar">
    <!-- Sidebar Scroll Container -->
    <div id="sidebar-scroll">
        <!-- Sidebar Content -->
        <!-- Adding .sidebar-mini-hide to an element will hide it when the sidebar is in mini mode -->
        <div class="sidebar-content">
            <!-- Side Header -->
            <div class="side-header side-content bg-white-op">
                <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                <button class="btn btn-link text-gray pull-right hidden-md hidden-lg" type="button" data-toggle="layout" data-action="sidebar_close">
                    <i class="fa fa-times"></i>
                </button>
                <!-- Themes functionality initialized in App() -> uiHandleTheme() -->
                <div class="btn-group pull-right">
                    <button class="btn btn-link text-gray dropdown-toggle" data-toggle="dropdown" type="button">
                        <i class="fa fa-phone"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right font-s13 sidebar-mini-hide">
                        <li>
                            <a data-toggle="theme" data-theme="default" tabindex="-1" href="javascript:void(0)">
                                <i class="fa fa-circle text-default pull-right"></i> <span class="font-w600">Default</span>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="theme" data-theme="<?php echo base_url(); ?>assets/css/themes/amethyst.min.css" tabindex="-1" href="javascript:void(0)">
                                <i class="fa fa-circle text-amethyst pull-right"></i> <span class="font-w600">Amethyst</span>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="theme" data-theme="<?php echo base_url(); ?>assets/css/themes/city.min.css" tabindex="-1" href="javascript:void(0)">
                                <i class="fa fa-circle text-city pull-right"></i> <span class="font-w600">City</span>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="theme" data-theme="<?php echo base_url(); ?>assets/css/themes/flat.min.css" tabindex="-1" href="javascript:void(0)">
                                <i class="fa fa-circle text-flat pull-right"></i> <span class="font-w600">Flat</span>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="theme" data-theme="<?php echo base_url(); ?>assets/css/themes/modern.min.css" tabindex="-1" href="javascript:void(0)">
                                <i class="fa fa-circle text-modern pull-right"></i> <span class="font-w600">Modern</span>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="theme" data-theme="<?php echo base_url(); ?>assets/css/themes/smooth.min.css" tabindex="-1" href="javascript:void(0)">
                                <i class="fa fa-circle text-smooth pull-right"></i> <span class="font-w600">Smooth</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <a class="h5 text-white" href="index.html">
                    <i class="fa fa-circle-o-notch text-primary"></i> <span class="h4 font-w600 sidebar-mini-hide">Movil Expert</span>
                </a>
            </div>
            <!-- END Side Header -->

            <!-- Side Content -->
            <div class="side-content side-content-full">
                <ul class="nav-main">
                    <li class="open">
                        <a class="active" href="<?php echo base_url('backend/inicio'); ?>"><i class="si si-speedometer"></i><span class="sidebar-mini-hide">Dashboard</span></a>
                    </li>

                    <li class="nav-main-heading"><span class="sidebar-mini-hide">Modulos</span></li>
                    <li >
                        <a href="#" onclick="modalVentas()"><i class="si si-basket-loaded"></i><span class="sidebar-mini-hide">Ventas</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('backend/MOD_CLIENTES/clientes'); ?>"><i class="fa fa-users"></i><span class="sidebar-mini-hide">Clientes</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('backend/MOD_PERSONAL/personal'); ?>"><i class="si si-lock"></i><span class="sidebar-mini-hide">Personal</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('backend/MOD_PROVEEDORES/proveedores'); ?>"><i class="si si-notebook"></i><span class="sidebar-mini-hide">Proveedores</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('backend/MOD_INVENTARIO/inventario'); ?>"><i class="si si-tag"></i><span class="sidebar-mini-hide">Inventario</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('backend/MOD_FINANZAS/finanzas'); ?>"><i class="fa fa-dollar"></i><span class="sidebar-mini-hide">Finanzas</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('backend/MOD_SUCURSALES/sucursales'); ?>"><i class="si si-home"></i><span class="sidebar-mini-hide">Sucursales</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('backend/MOD_SERV_TECNICO/Serv_tecnico'); ?>"><i class="si si-wrench"></i><span class="sidebar-mini-hide">Reparaciones</span></a>
                    </li>
                </ul>
            </div>
            <!-- END Side Content -->
        </div>
        <!-- Sidebar Content -->
    </div>
    <!-- END Sidebar Scroll Container -->
</nav>
<!-- END Sidebar -->