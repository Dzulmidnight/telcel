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
                DASHBOARD SERVICIOS
            </h3>
        </div>

        <div class="col-sm-2 text-right hidden-xs">
            <button class="btn btn-rounded btn-round btn-primary" onclick="history.back(-1)">
                <i class="fa fa-arrow-left"></i> Regresar
            </button>
            <a class="btn btn-default" href="base_pages_projects_create.html">
                <i class="fa fa-plus-circle text-success push-5-r"></i> New Project
            </a>
        </div>
    </div>

</div>
<!-- END Page Header -->

<div class="content">
    <!-- Active Projects -->
    <h2 class="content-heading">Activos (3)</h2>
    <div class="row">
        <div class="col-sm-6 col-lg-4">
            <!-- Project -->
            <div class="block block-rounded block-themed">
                <div class="block-header bg-primary">
                    <ul class="block-options">
                        <li>
                            <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                        </li>
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
                        <a class="text-white" href="base_pages_projects_view.html">
                            Nombre servicio
                        </a>
                    </h3>
                    <h4 class="h5 text-white-op">Fecha de pago</h4>
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
            <!-- END Project -->
        </div>
        <div class="col-sm-6 col-lg-4">
            <!-- Project -->
            <div class="block block-rounded block-themed">
                <div class="block-header bg-amethyst">
                    <ul class="block-options">
                        <li>
                            <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                        </li>
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
            <!-- END Project -->
        </div>
        <div class="col-sm-6 col-lg-4">
            <!-- Project -->
            <div class="block block-rounded block-themed">
                <div class="block-header bg-modern">
                    <ul class="block-options">
                        <li>
                            <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                        </li>
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
            <!-- END Project -->
        </div>
    </div>
    <!-- END Active Projects -->
</div>


<!-- OneUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock, Appear, CountTo, Placeholder, Cookie and App.js -->
<script src="<?php echo base_url(); ?>assets/js/core/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/bootstrap.min.js"></script>

<!-- Page JS Plugins -->
<script src="<?php echo base_url(); ?>assets/js/plugins/chartjsv2/Chart.min.js"></script>

<!-- Page JS Code -->
<script src="<?php echo base_url(); ?>assets/js/pages/base_comp_chartjs_v2.js"></script>