function busquedaFinanzas(url){
	let ruta = url + 'backend/MOD_FINANZAS/Finanzas/tabla_ventas/';
	let inicioVentas = document.getElementById('inicio_ventas').value;
	let finVentas = document.getElementById('fin_ventas').value;
	let listaSucursales = document.getElementById('listado_sucursales').selectedOptions;
	let objetoJson;
	let arrayRespuestas;
	var sucursales = [];
	let xmlhttp = new XMLHttpRequest();
	var div_respuesta = document.getElementById('tablaVentas_div');
	
	console.log('FECHA_INICIO: ' + inicioVentas);
	console.log('FECHA FIN: ' + finVentas);
	for(let i=0; i<listaSucursales.length; i++){
		console.log(listaSucursales[i].value);
		sucursales.push(listaSucursales[i].value);
	}

	arrayRespuestas = [inicioVentas, finVentas, sucursales];
	objetoJson = JSON.stringify(arrayRespuestas);
	console.log(objetoJson);

	xmlhttp.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			//console.log(this.responseText);
			div_respuesta.innerHTML = this.responseText;
		}
	}

	xmlhttp.open("POST", ruta, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("objeto="+objetoJson);

}


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

function ventaSucursal(sucursal, url){
	var xmlhttp = new XMLHttpRequest();
	var ruta = url + 'backend/MOD_FINANZAS/Finanzas/tabla_ventas/' + sucursal;
	var div_respuesta = document.getElementById('tablaVentas_div');

	xmlhttp.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			div_respuesta.innerHTML = this.responseText;
			actualizarCifras();
		}
	}
	xmlhttp.open("POST", ruta, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send();
}

function actualizarCifras(){
	var arrayMonto = document.querySelectorAll('td.monto-venta > b');
	var arrayCantidad = document.querySelectorAll('td.cantidad-venta > b');
	var numPiezas = 0, montoTotal = 0, i = 0;
	let = montoVentas_div = document.getElementById('montoVentas_div');
	let = productosVendidos_div = document.getElementById('productosVendidos_div');

	arrayMonto.forEach( 
		function(valor) {
			//console.log("este valor: " + valor.innerHTML);
			montoTotal += parseFloat(valor.innerHTML);
		}
	);
	arrayCantidad.forEach( 
		function(cantidad) {
			//console.log("este cantidad: " + cantidad.innerHTML);
			numPiezas += parseFloat(cantidad.innerHTML);
		}
	);

	montoVentas_div.innerHTML = '$ ' + montoTotal.toLocaleString('en-IN');
	productosVendidos_div.innerHTML = numPiezas.toLocaleString('en-IN');


}