<!-- Page Content -->
<div class="content">

    <div class="content-grid push-50">
        <div class="row">
            <div class="col-md-3">

                <button class="btn btn-danger" data-toggle="modal" data-target="#modalVenta">
                    <i class="si si-dollar"></i> Venta de productos
                </button>
            </div>
            <div class="col-md-9">
                <?= $menu_general ?>    
            </div>
            
        </div>
    </div>
    <!-- END Modulos -->

</div>


<!-- Modal mostrar codigo de barras -->
<div class="modal fade" id="modalVenta" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-popout">
        <div class="modal-content">
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header bg-primary-dark">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Venta de productos</h3>
                </div>
                <div class="block-content" style="margin-bottom: 4em;">
                    <div class="row text-justify">
                        <!-- Formulario de registro de usuario -->
                        <form class="form-horizontal push-10-t block-content" action="base_forms_elements.html" method="post" onsubmit="return false;">

                            <!-- Formularios invetario -->
                            <div id="formularios_inventario">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="codigoCapturado" name="codigoCapturado" onkeyup="consultarCodigo(this.value, '<?= base_url(); ?>')" placeholder="Introduce el codigo del producto" value="">
                                </div>
                                <div class="col-md-12" id="div_informacion_producto">
                                    
                                </div>
                            </div>
                            <!-- END Formularios inventario -->

                        </form>
                        <!-- END Formulario de registro de cliente -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- END Modal mostrar codigo de barras -->
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

<script src="<?= base_url('assets/js/propios/funciones.js'); ?>"></script>

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