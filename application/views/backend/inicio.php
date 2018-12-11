<style>
    .fuente11{
        font-size: 11px;
    }
</style>
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
    <div class="modal-dialog modal-lg modal-dialog-popout">
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
                                <div class="col-md-4">
                                    <label for="codigoCapturado">Codigo del producto</label>
                                    <input type="text" class="form-control" id="codigoCapturado" name="codigoCapturado" onkeyup="consultarCodigo(this.value, '<?= base_url(); ?>')" placeholder="Introduce el codigo del producto" value="">
                                </div>
                                <div class="col-md-2">
                                    <label for="piezas_venta">Nº Piezas</label>
                                    <input type="number" class="form-control" disabled id="piezas_venta" name="piezas_venta" placeholder="Nº de piezas">
                                </div>
                                <div class="col-md-3">
                                    <label for="precio_unitario_venta">Precio de venta</label>
                                    <input type="number" class="form-control" disabled id="precio_unitario_venta" name="precio_unitario_venta" placeholder="Precio">
                                </div>
                                <div class="col-md-3">
                                    <button type="button" style="margin-top:2em;" class="btn btn-sm btn-info" disabled id="btn_agregar_producto" name="btn_agregar_producto" onclick="carritoCompras()">
                                        Agregar <i class="fa fa-shopping-bag"></i>
                                    </button>
                                    <button style="margin-top:2em;" class="btn btn-sm btn-default" type="button" onclick="limpiar();">
                                        Limpiar <i class="glyphicon glyphicon-erase"></i>
                                    </button>
                                </div>

                                <!-- Div Información del producto -->
                                <div style="margin-top:2em;" class="col-md-6" id="div_informacion_producto">
                                </div>
                                <!-- END Div información del producto -->

                                <!-- Div carro de compras -->
                                <div style="margin-top:2em;" class="col-md-6 well" id="div_carro_compras">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th colspan="6">Resumen compra</th>
                                            </tr>
                                            <tr >
                                                <th></th>
                                                <th style="font-size:11px;">Producto</th>
                                                <th style="font-size:11px;">Marca</th>
                                                <th style="font-size:11px;">Precio</th>
                                                <th style="font-size:11px;">Cantidad</th>
                                                <th style="font-size:11px;">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tablaDetalleCompra" style="font-size: 11px !important;">
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    
                                    <div class="text-right">
                                        <button class="btn btn-sm btn-default">
                                            Cancelar
                                        </button>
                                        <button class="btn btn-sm btn-primary">
                                            <i class="fa fa-save"></i> Guardar
                                        </button>
                                    </div>
                                </div>
                                <!-- END Div carro de compras -->
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