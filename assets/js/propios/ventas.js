function consultarVendedor(id, url){
	if(id){
		let respuesta;
		let ruta = url + 'backend/MOD_SERVICIOS/Servicios/vendedor/' + id;
		let nombreVendedor_span = document.getElementById('span-nombre-vendedor');

		var xmlhttp = new XMLHttpRequest();

		xmlhttp.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				respuesta = JSON.parse(this.responseText);

				if(respuesta){
					nombreVendedor_span.innerHTML = '<span style="color:#27ae60;">VENDEDOR: '+respuesta['nombre']+' '+respuesta['ap_paterno']+'</span>';
				}else{
					nombreVendedor_span.innerHTML = '<span style="color:#e74c3c;">Vendedor no encontrado</span>';
				}
			}else{
				nombreVendedor_span.innerHTML = '<span style="color:#e74c3c;">Buscando ...</span>';
			}
		}
		xmlhttp.open("POST", ruta, true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.send();
	}
}

function tipoServicio(tipo){
    let tipoServicio_input = document.getElementById('tipo_servicio');

    tipoServicio_input.value = tipo;
}

function servicioRapido(valor){
    let nuevoServicio_div = document.getElementById('nuevoServicio_div');

    if(valor == 'otro'){
        nuevoServicio_div.style.display = 'block';
    }else{
        nuevoServicio_div.style.display = 'none';
    }
}


function consultarCodigo(codigoBarras, url){
	let precioEstablecido, precioReal, codigoJson, sucursalJson, vista, piezasExistentes;
	let sucursalVenta = document.getElementById('fk_id_sucursal_venta').value;
	let sucursalProducto;
	let ruta = url + 'backend/InformacionProducto';
	let informacionProducto_div = document.getElementById('div_informacion_producto');
	//let codigoBarras = codigoBarras.trim();

	codigoJson = JSON.stringify(codigoBarras);
	sucursalJson = JSON.stringify(sucursalVenta);

	var xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			vista = this.responseText;

			if(vista != 'Articulo no encontrado'){
				informacionProducto_div.innerHTML = vista;
				piezasExistentes = document.getElementById('piezas_existentes').value;
				agregarProducto_btn = document.getElementById('btn_agregar_producto');
				precioEstablecido = document.getElementById('precio_establecido').innerHTML;
				precioReal = document.getElementById('precio_real').value;
				precioUnitarioVenta = document.getElementById('precio_unitario_venta');
				precioRealVenta = document.getElementById('precio_real_venta');

				////////
				document.getElementById('piezas_venta').disabled = false;

				agregarProducto_btn.disabled = false;
				agregarProducto_btn.classList.remove('btn-default');
				agregarProducto_btn.classList.add('btn-success');

				if(piezasExistentes == 0){
					agregarProducto_btn.disabled = true;
					agregarProducto_btn.classList.remove('btn-success');
					agregarProducto_btn.classList.add('btn-default');
				}

				precioUnitarioVenta.disabled = false;
				precioUnitarioVenta.value = precioEstablecido;
				precioRealVenta.value = precioReal;
			}else{
				informacionProducto_div.innerHTML = vista
			}
			
		}else{
			informacionProducto_div.innerHTML = 'Buscando información ...';
		}
	}
	xmlhttp.open("POST", ruta, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("codigo= "+codigoJson+"&sucursal="+sucursalJson);

}

function carritoCompras(id_frm){
	let idSucursalProducto, idProductoVenta, tablaDetalleCompra, producto_span, numFilas, filaActual, productos, marca_span, precio, cantidad, total, totalReal, indice;
	let formulario = document.forms[id_frm];
	let numElementos = formulario.elements.length;
	let idVendedor = document.getElementById("id_vendedor_venta").value;
	let realizarVenta_btn = document.getElementById("btn_realizar_venta");
	if(idVendedor == ''){
		alert("Debes ingresar el ID de vendedor");
		document.getElementById("id_vendedor_venta").focus();
	}else{
		for(let i = 0; i < numElementos; i++){
			if(formulario[i].required){
				if(formulario[i].type == 'select-one'){
					indice = document.getElementById(formulario[i].id).selectedIndex;
					if(indice == null || indice == 0){
						document.getElementById(formulario[i].id).focus();
					}
				}else{
					if(!formulario[i].value){
						alert("Debes completas el campo");
						document.getElementById(formulario[i].id).focus();
						break;
					}
				}
			}else{
				tablaDetalleCompra = document.getElementById('tablaDetalleCompra');
				idProductoVenta = document.getElementById('id_producto').value;
				producto_span = document.getElementById('spanProducto').innerHTML;
				marca_span = document.getElementById("spanMarca").innerHTML;
				precio = document.getElementById("precio_unitario_venta").value;
				precioRealVenta = document.getElementById("precio_real_venta").value;
				cantidad = document.getElementById("piezas_venta").value;

				idSucursalProducto = document.getElementById('fk_id_sucursal_producto').value;

				
				// activamos el boton de venta
				realizarVenta_btn.disabled = false;
				numFilas = tablaDetalleCompra.rows.length;
				filaActual = numFilas - 1;
				total = precio * cantidad;
				totalReal = precioRealVenta * cantidad;

				let row = tablaDetalleCompra.insertRow(filaActual);
	            let celda1 = row.insertCell(0);
	            let celda2 = row.insertCell(1);
	            let celda3 = row.insertCell(2);
	            let celda4 = row.insertCell(3);
	            let celda5 = row.insertCell(4);
	            let celda6 = row.insertCell(5);
	            let celda7 = row.insertCell(6);
	                
	            celda1.innerHTML = "<button type='button' onclick='eliminarFila(this)' class='btn btn-xs btn-danger'><i class='fa fa-close'></i></button>";
	            celda2.innerHTML = idProductoVenta+"<input type='hidden' name='id_producto_carrito' value='"+idProductoVenta+"' readonly>";
	            celda3.innerHTML = producto_span;
	            celda4.innerHTML = marca_span;
	            celda5.innerHTML = "$ "+precio+"<input type='hidden' name='precio_carrito' value='"+precio+"' readonly><input type='hidden' name='precio_real_carrito' value='"+precioRealVenta+"'>";;
	            celda6.innerHTML = cantidad+"<input type='hidden' name='cantidad_carrito' value='"+cantidad+"' readonly>";;
	            celda7.innerHTML = '$ '+total.toFixed(2)+"<input type='hidden' name='total_carrito' value='"+total.toFixed(2)+"' readonly><input type='hidden' name='total_real_carrito' value='"+totalReal+"'><input type='hidden' name='id_sucursal_producto' value='"+idSucursalProducto+"'>";
	                
	            // limpiamos los campos despues de agregar el producto
	            document.getElementById('codigoCapturado').value = '';

	            document.getElementById('piezas_venta').value = '';
	            document.getElementById('precio_unitario_venta').value = '';

	            //habilitamos el boton de venta
	            document.getElementById('btn_realizar_venta').classList.remove('btn-default');
	            document.getElementById('btn_realizar_venta').classList.add('btn-success');

	            break;
			}
		}
	}
}

/// funcón para eliminar filas de una tabla
function upTo(elemento, tagName){
	tagName = tagName.toLowerCase();
	while(elemento && elemento.parentNode){
		elemento = elemento.parentNode;
		if(elemento.tagName && elemento.tagName.toLowerCase() == tagName){
			return elemento;
		}
	}
	return null;
}

function crearTicket(url, id){
	let ruta = url + "backend/PdfTicket/index/" + id;
	/* abrir en otra ventana
		window.location.assign(ruta);
	*/
	document.getElementById("frame_pdf").src = ruta;
	$("#modalPdf").modal("show");

}

function realizarVenta(url, id_frm){
	let id_vendedor = document.getElementById("id_vendedor_venta").value;
	let id_sucursal_venta = document.getElementById("fk_id_sucursal_venta").value;
	let array_id_producto = document.getElementsByName("id_producto_carrito");
	let array_de_precio = document.getElementsByName("precio_carrito");
	let array_precio_real_carrito = document.getElementsByName("precio_real_carrito");
	let array_de_cantidad = document.getElementsByName("cantidad_carrito");
	let array_total_carrito = document.getElementsByName("total_carrito");
	let array_total_real_carrito = document.getElementsByName("total_real_carrito");
	let array_id_sucursal_producto = document.getElementsByName("id_sucursal_producto");
	let ruta = url + "backend/MOD_SERVICIOS/Servicios/venta";
	let array_general = [];
	let array_json, info_extra_json, id_vendedor_json, id_sucursal_producto_json, fk_id_ticket;

    for (var i = 0; i < array_de_precio.length; i++) {

        array_general.push(
            {	
            	id_sucursal_producto: array_id_sucursal_producto[i].value,
                id_producto_carrito: array_id_producto[i].value, 
                precio_carrito: array_de_precio[i].value, 
                precio_real_carrito: array_precio_real_carrito[i].value,
                cantidad_carrito: array_de_cantidad[i].value,
                total_carrito: array_total_carrito[i].value,
                total_real_carrito: array_total_real_carrito[i].value
            }
        );
    };

    array_json = JSON.stringify(array_general);
    id_vendedor_json = JSON.stringify(id_vendedor);

    let xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function(){
    	if(this.readyState == 4 && this.status == 200){
    		fk_id_ticket = this.responseText;

    		// limpiamos la vista
    		//document.getElementById("div_carro_compras").innerHTML = '';
    		document.getElementById("tablaDetalleCompra").innerHTML = '';
    		document.getElementById("div_informacion_producto").innerHTML = '';
    		document.getElementById("id_vendedor_venta").value = '';
    		document.getElementById("span-nombre-vendedor").innerHTML = '';
    		document.getElementById("btn_agregar_producto").disabled = true;
    		$("#modalVenta").modal("toggle");
            swal({
                title: "Ticket",
                text: "¿Desea generar Ticket?",
                icon: "info",
                buttons: true,
                dangerMode: true,
                closeOnClickOutside: false,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Se ha generado el ticket", {
                      icon: "success",
                    });
                    crearTicket(url, fk_id_ticket);
                    //document.getElementById(frm).submit();
                } 
            });

    	}
    }
    xmlhttp.open("POST", ruta, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("parametros=" + array_json + "&id_vendedor=" + id_vendedor_json + "&id_sucursal_venta=" + id_sucursal_venta);

}

function ventaRapida(url){
	let ruta = url + 'backend/MOD_SERVICIOS/Servicios/venta_rapida/'
	let selectServicio = $('#nombre_servicio').val();
	let pagoServicio = document.getElementById('pago_servicio').value;
	let sucursal = document.getElementById('fk_id_sucursal_venta').value;
	let idVendedor = document.getElementById('id_vendedor_venta').value;
	console.log(selectServicio);
	let objetoJson;
	let nuevoServicio_input;
	let validacion = true;
	

	if(idVendedor == ''){
		validacion = false;
		document.getElementById('id_vendedor_venta').focus();
		alert('Debes ingresar tu número de vendedor');

	}else if(pagoServicio == 0){
		validacion = false;
		document.getElementById('pago_servicio').focus();
		alert('Debes ingresar el monto pagado');
	}else if(selectServicio == 0){
		validacion = false;
		alert('Debes seleccionar un servicio');
		document.getElementById('nombre_servicio').focus();
	}else if(selectServicio == 'otro'){
		let nombreNuevoServicio = document.getElementById('nombre_nuevo_servicio');
		if(nombreNuevoServicio.value == ''){
			validacion = false;
			alert('Debe completar el nombre del servicio');
			nombreNuevoServicio.focus();
		}else{
			nuevoServicio_input = nombreNuevoServicio.value;
			console.log(nombreNuevoServicio.value);
		}
	}


	if(validacion){
		let arrayRespuestas = {idServicio: selectServicio, nuevoServicio: nuevoServicio_input, pago: pagoServicio, idSucursal: sucursal, idVendedor: idVendedor};
		objetoJson = JSON.stringify(arrayRespuestas);

		console.log(objetoJson);

		var xmlhttp = new XMLHttpRequest();

	    xmlhttp.onreadystatechange = function(){
	    	if(this.readyState == 4 && this.status == 200){
	    		console.log(this.responseText);

	    		// limpiamos la vista
	    		//document.getElementById("pago_servicio").value = '';
	    		document.getElementById("id_vendedor_venta").value = '';
	    		document.getElementById("pago_servicio").value = '';
	    		document.getElementById("nombre_servicio").value = '';
	    		document.getElementById("span-nombre-vendedor").innerHTML = '';
	    		$("#modalVenta").modal("toggle");
	    		swal("Venta registrada", "", "success");

	    	}
	    }
	    xmlhttp.open("POST", ruta, true);
	    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	    xmlhttp.send("parametros=" + objetoJson);
	}
}












