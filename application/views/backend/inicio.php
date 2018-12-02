<!-- Page Content -->
<div class="content">

    <div class="content-grid push-50">
        <div class="row">
            <?= $menu_general ?>
        </div>
    </div>
    <!-- END Modulos -->

</div>
<!-- END Page Content -->
<div class="col-md-12">
	<h3>EL CODIGO DE BARRAS</h3>
	<svg id="barcode"></svg>

	<button type="button" onclick="llamarBar()">
		Generar codigo
	</button>

</div>

<script>
	function llamarbar(){
		JsBarcode("#barcode", "Hi world!",{
			displayValue: true
		});
	}
</script>