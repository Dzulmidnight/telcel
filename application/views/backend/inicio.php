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
            <div class="col-md-9">
                <?= $menu_general; ?>
                <?= $modal_ventas; ?>  
            </div>
            
        </div>
    </div>
    <!-- END Modulos -->

</div>

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