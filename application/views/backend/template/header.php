<!-- Header -->
<header id="header-navbar" class="content-mini content-mini-full">
    <!-- Header Navigation Right -->
    <ul class="nav-header pull-right">
        <li>

            <div class="btn-group">
                <button class="btn btn-default btn-image dropdown-toggle" data-toggle="dropdown" type="button">
                    <img src="<?php echo base_url(); ?>assets/img/avatars/avatar10.jpg" alt="Avatar">
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li class="dropdown-header">Perfil: <?= $this->session->userdata('username'); ?> </li>
                    <!--<li>
                        <a tabindex="-1" href="base_pages_inbox.html">
                            <i class="si si-envelope-open pull-right"></i>
                            <span class="badge badge-primary pull-right">3</span>Inbox
                        </a>
                    </li>
                    <li>
                        <a tabindex="-1" href="base_pages_profile.html">
                            <i class="si si-user pull-right"></i>
                            <span class="badge badge-success pull-right">1</span>Profile
                        </a>
                    </li>
                    <li>
                        <a tabindex="-1" href="javascript:void(0)">
                            <i class="si si-settings pull-right"></i>Settings
                        </a>
                    </li>-->
                    <!--<li>
                        <a tabindex="-1" href="base_pages_lock.html">
                            <i class="si si-lock pull-right"></i>Lock Account
                        </a>
                    </li>-->
                    <li>

                        <a tabindex="-1" href="<?= base_url('login/logout_ci'); ?>">
                            <i class="si si-logout pull-right"></i>Cerrar sesión
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li>
            <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
            <button class="btn btn-default" data-toggle="layout" data-action="side_overlay_toggle" type="button">
                <i class="fa fa-tasks"></i>
            </button>
        </li>
        <li>
            
            <div class="btn-group">
                <a class="btn btn-danger" tabindex="-1" href="<?= base_url('login/logout_ci'); ?>" data-toggle="tooltip" data-placement="bottom" title="Cerrar sesión">
                    <i class="si si-logout pull-right"></i>
                </a>
            </div>
        </li>
    </ul>
    <!-- END Header Navigation Right -->

    <!-- Header Navigation Left -->
    <ul class="nav-header pull-left">
        <li class="hidden-md hidden-lg">
            <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
            <button class="btn btn-default" data-toggle="layout" data-action="sidebar_toggle" type="button">
                <i class="fa fa-navicon"></i>
            </button>
        </li>
        <li class="hidden-xs hidden-sm">
            <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
            <button class="btn btn-default" data-toggle="layout" data-action="sidebar_mini_toggle" type="button">
                <i class="fa fa-ellipsis-v"></i>
            </button>
        </li>
        <li>
            <!-- Opens the Apps modal found at the bottom of the page, before including JS code -->
            <button class="btn btn-default pull-right" data-toggle="modal" data-target="#apps-modal" type="button">
                <i class="si si-grid"></i>
            </button>
        </li>
        <li class="visible-xs">
            <!-- Toggle class helper (for .js-header-search below), functionality initialized in App() -> uiToggleClass() -->
            <button class="btn btn-default" data-toggle="class-toggle" data-target=".js-header-search" data-class="header-search-xs-visible" type="button">
                <i class="fa fa-search"></i>
            </button>
        </li>
        <li class="js-header-search header-search">
            <form class="form-horizontal" action="base_pages_search.html" method="post">
                <div class="form-material form-material-primary input-group remove-margin-t remove-margin-b">
                    <input class="form-control" type="text" id="base-material-text" name="base-material-text" placeholder="Buscar ...">
                    <span class="input-group-addon"><i class="si si-magnifier"></i></span>
                </div>
            </form>
        </li>
    </ul>
    <!-- END Header Navigation Left -->
</header>
<!-- END Header -->

<!-- Main Container -->
<main id="main-container">

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