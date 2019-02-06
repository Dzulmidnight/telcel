function consultarRepuestos(busqueda, ruta){
	ruta = ruta+'backend/MOD_SERV_TECNICO/Serv_tecnico/repuestos/'+busqueda;

	var xmlhttp = new XMLHttpRequest();
	if(busqueda){
		xmlhttp.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				console.log(this.responseText);
				document.getElementById('tabla-repuestos').innerHTML = this.responseText;
			}
		}

		xmlhttp.open("POST", ruta, true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.send("x=1");
	}

}


function modalFichaServicio(ruta, id, div, codigoBarras){
    ruta = ruta+'backend/MOD_SERV_TECNICO/Serv_tecnico/modal_ficha_servicio/'+id;

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText);
            document.getElementById(div).innerHTML = this.responseText;
            $('#modal-detalle-ficha').modal('show');
            JsBarcode("#barcode_ficha", codigoBarras, {
                height: 70
            });

        }
    }
    xmlhttp.open("POST", ruta, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("x=1");
}