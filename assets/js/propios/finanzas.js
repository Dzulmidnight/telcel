function ventasPorSucursal(sucursal, url){
	var xmlhttp = new XMLHttpRequest();
	var ruta = url + 'backend/MOD_FINANZAS/Finanzas/tabla_ventas/' + sucursal;
	var div_respuesta = document.getElementById('div-tabla-ventas');

	xmlhttp.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			div_respuesta.innerHTML = this.responseText;
		}
	}
	xmlhttp.open("POST", ruta, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send();
}