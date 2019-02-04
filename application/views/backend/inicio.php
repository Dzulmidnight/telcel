<style>
    .fuente11{
        font-size: 11px;
    }
</style>
<!-- Page Content -->
<div class="content">

    <div class="content-grid push-50">
        <div class="row">
            <!--<div class="col-md-3">

                <button class="btn btn-danger" data-toggle="modal" data-target="#modalVenta">
                    <i class="si si-dollar"></i> Venta de productos
                </button>
            </div>-->
            <div class="col-md-7">
                <?= $menu_general; ?>
                <?= $modal_ventas; ?>  
            </div>

            <div class="col-md-5">
                <div class="block block-themed">
                    <div class="block-header bg-city">
                        <!--<ul class="block-options">
                            <li>
                                <button type="button"><i class="si si-settings"></i></button>
                            </li>
                        </ul>-->
                        <h3 class="block-title">Equipos en espera de ser recogidos</h3>
                    </div>
                    <div class="block-content">
                        <table class="table table-condensed" style="font-size: 11px;">
                            <?php foreach($row_entregas as $entregas): ?>
                                <tr>
                                    <td>
                                        <i class="fa fa-circle" style="color:#c0392b;"></i> <?= date('d/m/Y', $entregas->fecha_entrega); ?>
                                    </td>
                                    <td>
                                        <?= $entregas->nombre_cliente.' '.$entregas->ap_paterno; ?>
                                    </td>
                                    <td>
                                        <a href="#" data-toggle="tooltip" title="Consultar ficha de servicio" onclick="modalFichaServicio('<?= base_url(); ?>', <?= $entregas->id_servicio_tecnico; ?>,'div-mostrar-ficha', <?= $entregas->codigo_barras; ?>);">
                                            <i class="si si-briefcase"></i> <?= $entregas->codigo_barras; ?>
                                        </a>
                                        <!--<a href="<?= base_url('backend/MOD_SERV_TECNICO/Serv_tecnico/modal_ficha_servicio/'.$entregas->id_servicio_tecnico.''); ?>" data-toggle="tooltip" title="Consultar ficha de servicio">
                                            <i class="si si-briefcase"></i> <?= $entregas->codigo_barras; ?>
                                        </a>-->
                                    </td>
                                    <td>
                                        <i class="si si-call-in"></i> <?= $entregas->telefono_cliente; ?>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-success" data-toggle="tooltip" title="Marcar como entregado" onclick="entregarEquipo('frm_entregar_equipo','<?= $entregas->id_servicio_tecnico; ?>');">
                                                <i class="fa fa-check"></i>
                                            </button>
                                        <!--<button class="btn btn-xs btn-success" data-toggle="tooltip" title="Entregar">
                                            <i class="fa fa-check"></i>
                                        </button>-->
                                        <!--<button class="btn btn-xs btn-danger" data-toggle="tooltip" title="">
                                            <i class="fa fa-close"></i>
                                        </button>-->
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <form id="frm_entregar_equipo" action="<?= base_url('backend/MOD_SERV_TECNICO/Serv_tecnico/entregar_equipo'); ?>" method="POST">
        <input type="hidden" id="id_frm_servicio_tecnico" name="id_frm_servicio_tecnico" value="">
        <input type="hidden" name="fecha_registro" value="<?= time(); ?>">
    </form>

    <!-- END Modulos -->

</div>

</script>
<div id="div-mostrar-ficha"></div>
<!-- END Page Content -->
<!--<div class="col-md-12">
	<h3>EL CODIGO DE BARRAS</h3>
	<canvas id="barcode"></canvas>

	<button type="button" onclick='otraFuncion();'>
		Generar codigo
	</button>

    <a href="javascript:genPDF()">
        Generar pdf
    </a>

</div>-->

<script src="<?php echo base_url(); ?>assets/js/propios/inventario.js"></script>
<script src="<?php echo base_url(); ?>assets/js/propios/funciones.js"></script>
<script src="<?php echo base_url(); ?>assets/js/propios/barcode.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/jquery.scrollLock.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/jquery.appear.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/jquery.countTo.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/jquery.placeholder.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/js.cookie.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/app.js"></script>

<script>

    function genPDF(){
        var doc = new jsPDF();
        doc.text(20,20,'Algo de texto');
        doc.addPage();
        doc.text(20,20,'Algo de texto3');
        JsBarcode("#barcode", "22342341");    
        var canvas = document.getElementById('barcode');
        //var jpegUrl = $("#barcode").toDataURL("image/jpeg");
        var image = canvas.toDataURL("image/png").replace("image/jpeg", "");
        //var myImage = canvas1.toDataURL("image/png");
        doc.addImage(image, 'JPEG', 0, 0,0,0);
        doc.addImage(image, 'JPEG', 20, 20,20,20);
        doc.addImage(image, 'JPEG', 3, 3,3,2);
        //doc.addImage(image, 'JPEG', 0, 0, 0, 0);
        //doc.addImage(image, 'JPEG', 0, 0, 0, 0);

        doc.save('text.pdf');
    }

</script>