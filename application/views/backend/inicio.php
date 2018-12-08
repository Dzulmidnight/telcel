<!-- Page Content -->
<div class="content">

    <div class="content-grid push-50">
        <div class="row">
            <?= $menu_general ?>
        </div>
    </div>
    <!-- END Modulos -->
    <a href="<?php echo base_url('backend/createpdf/'); ?>" class="btn btn-default">
        Generar pdf
    </a>
</div>
<!-- END Page Content -->
<div class="col-md-12">
	<h3>EL CODIGO DE BARRAS</h3>
	<svg id="barcode"></svg>

	<button type="button" onclick='otraFuncion();'>
		Generar codigo
	</button>

</div>
