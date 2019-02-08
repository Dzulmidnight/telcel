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

function agregarPieza(id, pieza, modelo, color, precio){
    var tabla, pieza, modelo, color, precio;

    tabla = document.getElementById('piezas-utilizadas');
    /*pieza = document.getElementById('nombre-pieza').innerHTML;
    modelo = document.getElementById('modelo-pieza').innerHTML;
    color = document.getElementById('color-pieza').innerHTML;
    precio = document.getElementById('precio-pieza').innerHTML;*/
    idPieza = id;

    var row = tabla.insertRow(0);
    var celda1 = row.insertCell(0);
    var celda2 = row.insertCell(1);
    var celda3 = row.insertCell(2);
    var celda4 = row.insertCell(3);

    celda1.innerHTML = '<button class="btn btn-xs btn-danger" onclick="eliminarFila(this)"><i class="fa fa-trash"></i></button> '+pieza;
    celda2.innerHTML = modelo;
    celda3.innerHTML = color;
    celda4.innerHTML = '$ '+precio+'<input type="text" name="precio_pieza_repuesto[]" value="'+precio+'"><input type="text" name="id_pieza_repuesto[]" value="'+idPieza+'">';




    /*celda1.innerHTML = "<button type='button' onclick='eliminarFila(this)' class='btn btn-xs btn-danger'><i class='fa fa-close'></i></button>";
    celda2.innerHTML = idProductoVenta+"<input type='hidden' name='id_producto_carrito' value='"+idProductoVenta+"' readonly>";
    celda3.innerHTML = producto;
    celda4.innerHTML = marca;
    celda5.innerHTML = "$ "+precio+"<input type='hidden' name='precio_carrito' value='"+precio+"' readonly><input type='hidden' name='precio_real_carrito' value='"+precioRealVenta+"'>";;
    celda6.innerHTML = cantidad+"<input type='hidden' name='cantidad_carrito' value='"+cantidad+"' readonly>";;
    celda7.innerHTML = '$ '+total.toFixed(2)+"<input type='hidden' name='total_carrito' value='"+total.toFixed(2)+"' readonly><input type='hidden' name='total_real_carrito' value='"+totalReal+"'>";*/

    // limpiamos los campos despues de agregar el producto
    /*document.getElementById('codigoCapturado').value = '';

    document.getElementById('piezas_venta').value = '';
    document.getElementById('precio_unitario_venta').value = '';*/

}