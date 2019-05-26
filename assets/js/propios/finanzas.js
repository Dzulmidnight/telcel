function cambiarContenido(seccion, url){
	let tipoSeccion_input = document.getElementById('tipo_seccion');
	let ruta = url + 'backend/MOD_FINANZAS/Finanzas/tabla/'+seccion;
	let productos_li = document.getElementById('productos_li');
	let servicios_li = document.getElementById('servicios_li');
	let reparaciones_li = document.getElementById('reparaciones_li');
	let contenidoGeneral_row = document.getElementById('contenidoGeneral_row');
	let montoVentas_div = document.getElementById('montoVentas_div');
	let productosVendidos_div = document.getElementById('productosVendidos_div');

	let xmlhttp = new XMLHttpRequest();
	
	switch(seccion){
		case 'productos':
			productos_li.classList.add('active');
			servicios_li.classList.remove('active');
			reparaciones_li.classList.remove('active');
			break;
		case 'servicios':
			productos_li.classList.remove('active');
			servicios_li.classList.add('active');
			reparaciones_li.classList.remove('active');
			break;
		case 'reparaciones':
			productos_li.classList.remove('active');
			servicios_li.classList.remove('active');
			reparaciones_li.classList.add('active');
			break;
		default:
			productos_li.classList.add('active');
			servicios_li.classList.remove('active');
			reparaciones_li.classList.remove('active');
			break;
	}
	tipoSeccion_input.value = seccion;


	xmlhttp.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			contenidoGeneral_row.innerHTML = this.responseText;
			actualizarCifras(seccion);
			document.getElementById('inicio_ventas').value = '';
			document.getElementById('fin_ventas').value = '';

		}else{
			contenidoGeneral_row.innerHTML = `
				<div class="col-lg-12 text-center" style="margin-top:4em; margin-bottom:4em;">
                    <i class="fa fa-3x fa-spinner fa-spin text-primary"></i>
            	</div>
            `;
		}
	}

	xmlhttp.open("POST", ruta, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send();
}

function busquedaFinanzas(accion, url){

	if(accion == 'limpiar'){
		document.getElementById('filtrarBusqueda_frm').reset();
	}
	let ruta, inicioPeriodo, finPeriodo;
	let tipoSeccion_input = document.getElementById('tipo_seccion').value;

	switch(tipoSeccion_input){
		case 'productos':
			ruta = url + 'backend/MOD_FINANZAS/Finanzas/tabla_ventas/';
			inicioPeriodo = document.getElementById('inicioPeriodo_span');
			finPeriodo = document.getElementById('finPeriodo_span');
			break;
		case 'servicios':
			ruta = url + 'backend/MOD_FINANZAS/Finanzas/tabla_servicios/';
			inicioPeriodo = document.getElementById('inicioPeriodo_span');
			finPeriodo = document.getElementById('finPeriodo_span');
			break;
		case 'reparaciones':
			ruta = url + 'backend/MOD_FINANZAS/Finanzas/tabla_reparaciones/';
			inicioPeriodo = document.getElementById('inicioEntregaReparaciones_span');
			finPeriodo = document.getElementById('finEntregaReparaciones_span');

			break;
		default:
			ruta = url + 'backend/MOD_FINANZAS/Finanzas/tabla_ventas/';
			lawea = document.getElementById('inicioPeriodo_span');
			finPeriodo = document.getElementById('finPeriodo_span');
			break;
	}
	let inicioVentas = document.getElementById('inicio_ventas').value;
	let finVentas = document.getElementById('fin_ventas').value;
	let listaSucursales = document.getElementById('listado_sucursales').selectedOptions;
	let objetoJson;
	let arrayRespuestas;
	var sucursales = [];
	let xmlhttp = new XMLHttpRequest();
	var div_respuesta = document.getElementById('contenidoGeneral_row');
	
	for(let i=0; i<listaSucursales.length; i++){
		sucursales.push(listaSucursales[i].value);
	}

	arrayRespuestas = [inicioVentas, finVentas, sucursales];
	objetoJson = JSON.stringify(arrayRespuestas);

	xmlhttp.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			//console.log(this.responseText);
			div_respuesta.innerHTML = this.responseText;
			actualizarCifras();


			switch(tipoSeccion_input){
				case 'productos':
					inicioPeriodo = document.getElementById('inicioPeriodo_span');
					finPeriodo = document.getElementById('finPeriodo_span');
					break;
				case 'servicios':
					break;
				case 'reparaciones':
					inicioPeriodo = document.getElementById('inicioEntregaReparaciones_span');
					finPeriodo = document.getElementById('finEntregaReparaciones_span');
					break;
				default:
					ruta = url + 'backend/MOD_FINANZAS/Finanzas/tabla_ventas/';
					inicioPeriodo = document.getElementById('inicioPeriodo_span');
					finPeriodo = document.getElementById('finPeriodo_span');
					break;
			}


			if(inicioVentas != null && finVentas != null){
				//inicioPeriodo.innerHTML = ''+inicioVentas;
				//finPeriodo.innerHTML = ''+finVentas;
			}

		}else{
			div_respuesta.innerHTML = `
				<div class="col-lg-12 text-center" style="margin-top:4em; margin-bottom:4em;">
                    <i class="fa fa-3x fa-spinner fa-spin text-primary"></i>
            	</div>
			`;
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

function actualizarCifras(seccion){
	var arrayMonto = document.querySelectorAll('td.monto-venta > b');
	var arrayCantidad = document.querySelectorAll('td.cantidad-venta > b');
		if(arrayCantidad.length == 0){
			//console.log('no se encontro la otra');
			arrayCantidad = document.querySelectorAll('span.cantidad-reparaciones');
			//console.log('la cantidad '+arrayCantidad.length);
		}
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
			if(isNaN(parseFloat(cantidad.innerHTML))){
				numPiezas += 0;
			}else{
				numPiezas += parseFloat(cantidad.innerHTML);
			}
		}
	);

	montoVentas_div.innerHTML = '$ ' + montoTotal.toLocaleString('en-IN');
	productosVendidos_div.innerHTML = numPiezas.toLocaleString('en-IN');


}