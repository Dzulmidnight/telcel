function entregarEquipo(id_frm, id){
    document.getElementById('id_frm_servicio_tecnico').value = id;
    swal({
        title: "Entregar",
        text: "¿Realizar entrega del equipo?",
        icon: "info",
        buttons: true,
        dangerMode: true,
        content: {
            element: "input",
            attributes: {
                placeholder: "Monto pagado por el cliente"
            }
        } 
    })
    .then((value) => {
        if (value) {
            document.getElementById('id_frm_servicio_tecnico').value = id;
            document.getElementById('monto_pagado').value = value;
            document.getElementById(id_frm).submit();
            
           console.log(value);

            //console.log(this.form);
            //console.log(id);
        }else{
            console.log('Debes ingresar un monto');
            swal({
                text: "Debes ingresar el monto pagado",
                icon: "warning"
            });
        } /*else {
            swal("Your imaginary file is safe!");
        }*/
    });
}

function historialServicios(idSucursal, idServicio, url){
    var xmlhttp = new XMLHttpRequest;
    var ruta = url + 'backend/MOD_SERVICIOS/Servicios/historial_pagos/' + idSucursal+ '/' +idServicio;

    xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById('div-historial-pagos').innerHTML = this.responseText;
        }
    }
    xmlhttp.open("POST", ruta, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send();
    
    $('#modal-historial-pagos').modal('show');
}


function limpiarCampo(id){
    document.getElementById(id).value = '';
    document.getElementById('div-notificaciones').style.display = 'block';
    document.getElementById('div-servicios').innerHTML = '';
}

function buscarServicio(codigo, url){
    if(codigo){
        var ruta, objeto;
        ruta = url+'backend/MOD_SERV_TECNICO/Serv_tecnico/consultar_servicio_tecnico/'+codigo;

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                if(this.responseText != 0){
                    //objeto = JSON.parse(this.responseText);
                    console.log(this.responseText);
                    document.getElementById('div-servicios').style.display = 'block';
                    document.getElementById('div-servicios').innerHTML = this.responseText;
                    document.getElementById('div-notificaciones').style.display = 'none';
                }else{
                    document.getElementById('div-servicios').innerHTML = '';
                    //document.getElementById('div-servicios').innerHTML = 'Servicio no encontrado';
                    document.getElementById('div-notificaciones').style.display = 'block';
                }

            }else{
                document.getElementById('div-servicios').innerHTML = 'Buscando información ...';
            }
        }
        xmlhttp.open("POST", ruta, true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send();
    }else{
        document.getElementById('div-servicios').style.display = 'none';
        document.getElementById('div-notificaciones').style.display = 'block';
    }
}

function consultarRepuestos(busqueda, ruta){
	ruta = ruta+'backend/MOD_SERV_TECNICO/Serv_tecnico/repuestos/'+busqueda;

	var xmlhttp = new XMLHttpRequest();
	if(busqueda){
		xmlhttp.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				console.log(this.responseText);
                document.getElementById('tabla-repuestos').style.display = 'block';
				document.getElementById('tabla-repuestos').innerHTML = this.responseText;
			}
		}

		xmlhttp.open("POST", ruta, true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.send("x=1");
	}

}

function agregarConsultaPieza(){
    let pieza = document.getElementById("consultarNombrePieza").value;
    let modelo = document.getElementById("consultarModeloPieza").value;
    let color = document.getElementById("consultarColorPieza").value;
    let tabla = document.getElementById('piezas-utilizadas');

    idPieza = 6;

    var row = tabla.insertRow(0);
    var celda1 = row.insertCell(0);
    var celda2 = row.insertCell(1);
    var celda3 = row.insertCell(2);
    var celda4 = row.insertCell(3);

    celda1.innerHTML = '<button class="btn btn-xs btn-danger" onclick="eliminarFila(this)"><i class="fa fa-trash"></i></button> '+pieza+'<input type="hidden" name="nombre_pieza_repuesto[]" value="'+pieza+'">';
    celda2.innerHTML = modelo+'<input type="hidden" name="modelo_pieza_repuesto[]" value="'+modelo+'">';
    celda3.innerHTML = color+'<input type="hidden" name="color_pieza_repuesto[]" value="'+color+'">';
    celda4.innerHTML = '$ PENDIENTE<input type="hidden" name="precio_pieza_repuesto[]" value="PENDIENTE"><input type="hidden" name="id_pieza_repuesto[]" value="PENDIENTE">';
}

/*function modalFichaServicio(ruta, id, div, codigoBarras){
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
}*/
function modalFichaServicio2(url, id, cotizacion){
    let ruta = url + "backend/Generar_pdf/pdf_ficha_servicio/" + id + "/" + cotizacion;
    /* abrir en otra ventana
        window.location.assign(ruta);
    */
    document.getElementById("framePdfFichaServicio").src = ruta;
    $("#modalPdfFicha").modal("show");
}

function modalCotizacion(ruta, id, div){
    ruta = ruta+'backend/MOD_SERV_TECNICO/Serv_tecnico/modal_detalle_cotizacion/'+id;

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText);
            document.getElementById(div).innerHTML = this.responseText;
            $('#modal-detalle-cotizacion').modal('show');
            /*JsBarcode("#barcode_ficha", codigoBarras, {
                height: 70
            });*/

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

    celda1.innerHTML = '<button class="btn btn-xs btn-danger" onclick="eliminarFila(this)"><i class="fa fa-trash"></i></button> '+pieza+'<input type="hidden" name="nombre_pieza_repuesto[]" value="'+pieza+'">';
    celda2.innerHTML = modelo+'<input type="hidden" name="modelo_pieza_repuesto[]" value="'+modelo+'">';
    celda3.innerHTML = color+'<input type="hidden" name="color_pieza_repuesto[]" value="'+color+'">';
    celda4.innerHTML = '$ '+precio+'<input type="hidden" name="precio_pieza_repuesto[]" value="'+precio+'"><input type="hidden" name="id_pieza_repuesto[]" value="'+idPieza+'">';

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

function aceptarCotizacion(id_frm, idCotizacion){
    document.getElementById('estatus_cotizacion_servicio'+idCotizacion).value = 'ACEPTADA';
    swal({
        title: "Aceptar",
        text: "¿El cliente ha aceptado el servicio?",
        icon: "info",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            document.getElementById('estatus_cotizacion_servicio'+idCotizacion).value = 'EN PROCESO';
            //console.log(this.form);
            document.getElementById(id_frm+idCotizacion).submit();
            //console.log(id);
        } /*else {
            swal("Your imaginary file is safe!");
        }*/
    });
}

function rechazarCotizacion(id_frm, idCotizacion){
    document.getElementById('estatus_cotizacion_servicio'+idCotizacion).value = 'RECHAZADO';
    swal({
        title: "Rechazar",
        text: "¿Desea cancelar el servicio?",
        icon: "info",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            document.getElementById('estatus_cotizacion_servicio'+idCotizacion).value = 'RECHAZADO';
            //console.log(this.form);
            document.getElementById(id_frm+idCotizacion).submit();
            //console.log(id);
        } /*else {
            swal("Your imaginary file is safe!");
        }*/
    });
}

function obtenerPatron(){
    let valor = lock.getPattern();
    console.log('EL PATRON: '+lock.getPattern());
    return valor;
}

function validarCampos(id_frm, url){
    let ruta = url + 'backend/MOD_SERV_TECNICO/Serv_tecnico/agregar';
    var formulario = document.forms[id_frm];
    var numElementos = formulario.elements.length;
    var totalRequeridos = 0;
    //console.log(formulario);
    //console.log(numElementos);
    let patronBloqueo = obtenerPatron();

    if(patronBloqueo){
        document.getElementById('patron_bloqueo').value = patronBloqueo;
    }


    for(var i = 0; i < numElementos; i++){
        //console.log(formulario[i].required);
        if(formulario[i].required){
            totalRequeridos++
            if(formulario[i].type == 'select-one'){
                indice = document.getElementById(formulario[i].id).selectedIndex;
                if( indice == null || indice == 0 ) {
                    document.getElementById(formulario[i].id).focus();
                    alert('Debes completar el campo');
                    break;
                }
            }else{
                if(!formulario[i].value){
                    alert('Debes completar el campo');
                    document.getElementById(formulario[i].id).focus();
                    console.log('falta este: '+formulario[i].id);
                    break;
                    
                    //console.log('tipo: '+formulario[i].type);
                }
            }

        }
    }

    if(totalRequeridos == 9){
        let servicioTecnico_frm = document.getElementById(id_frm);

        servicioTecnico_frm.target = '_blank';
        servicioTecnico_frm.action = ruta;
        document.getElementById(id_frm).submit();
        $('#modal-nuevo-ingreso').modal('toggle');
        $('.modal-backdrop').remove();

        document.getElementById(id_frm).reset();

    /* abrir en otra ventana
        window.location.assign(ruta);
    */
        location.reload();
    }
    //console.log('El num de requeridos es: '+totalRequeridos);
}