<!-- Page Header -->
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h3 class="page-heading">
                Clientes
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
        	<div class="col-md-12 block">
        		<div class="block-content">
                            <table class="table table-bordered table-striped js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Nombre</th>
                                        <th class="hidden-xs">Telefono</th>
                                        <th class="hidden-xs" style="width: 15%;">Estatus</th>
                                        <th class="text-center" style="width: 10%;">...</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="font-w600">Nombre ApellidoP ApellidoM</td>
                                        <td class="hidden-xs">9511999723</td>
                                        <td class="hidden-xs">
                                            <span class="label label-success">VIP</span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button class="btn btn-sm btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
                                                <button class="btn btn-sm btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
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