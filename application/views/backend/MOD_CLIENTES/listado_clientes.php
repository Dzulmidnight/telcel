<!-- Page Header -->
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h3 class="page-heading">
                CLIENTES GENERAL
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
<div class="content">
    <!-- Modulos -->
    <button class="btn btn-primary" onclick="history.back(-1)">
        <i class="fa fa-arrow-left"></i> Regresar
    </button>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-popout2">
        <span data-toggle="tooltip" title="Agregar nuevo cliente">
            <i class="fa fa-user-plus"></i> Nuevo
        </span>
    </button>
    <div class="content-grid push-50">




        <div class="row">
        	<div class="col-md-12 block">
        		<div class="block-content">
                    <table class="table table-condensed table-striped js-dataTable-full" style="font-size:12px;">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Nombre</th>
                                <th class="hidden-xs">Telefono</th>
                                <th class="hidden-xs">Extra</th>
                                <th class="text-center">...</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td class="">
                                    <span class="text-primary">Nombre</span> ApellidoP ApellidoM
                                </td>
                                <td class="hidden-xs">9511999723</td>
                                <td class="hidden-xs">
                                    <!-- <span class="label label-success">VIP</span> -->
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-primary" data-toggle="tooltip" title="Consultar perfil">
                                            <i class="glyphicon glyphicon-folder-open"></i>
                                        </button>
                                        <button class="btn btn-sm btn-default" type="button" data-toggle="tooltip" title="Editar cliente"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-sm btn-default" type="button" data-toggle="tooltip" title="Eliminar cliente" onclick="eliminar()"><i class="fa fa-times"></i></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
        	</div>

		</div>
	</div>
</div>

