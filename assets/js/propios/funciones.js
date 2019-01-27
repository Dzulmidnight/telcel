var base_url = window.location.href;

function buscarCliente(datos){
    console.log('datos');
}
function modalFichaServicio(ruta, id, div){
    ruta = ruta+'backend/MOD_SERV_TECNICO/Serv_tecnico/modal_ficha_servicio/'+id;

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText);
            document.getElementById(div).innerHTML = this.responseText;
            $('#modal-detalle-ficha').modal('show');
        }
    }
    xmlhttp.open("POST", ruta, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("x=1");
}
function modalDetalleCotizacion(ruta, id, div){
    ruta = ruta+'backend/MOD_SERV_TECNICO/Serv_tecnico/modal_detalle_cotizacion/'+id;

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText);
            document.getElementById(div).innerHTML = this.responseText;
            $('#modal-detalle-cotizacion').modal('show');
        }
    }
    xmlhttp.open("POST", ruta, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("x=1");
}

function modalDetalleCliente(ruta, id, div){
    ruta = ruta+'backend/MOD_CLIENTES/Clientes/modal_detalle_cliente/'+id;

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText);
            document.getElementById(div).innerHTML = this.responseText;
            $('#modal-detalle-cliente').modal('show');
        }
    }
    xmlhttp.open("POST", ruta, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("x=1");

}

function historialAcciones(ruta, id, div){

   // var parametros = '', ruta = ruta+id;
    ruta = ruta+'backend/MOD_SERV_TECNICO/Serv_tecnico/historialAcciones/'+id;
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            //console.log(this.responseText);

            //var objetoJson = JSON.parse(this.responseText);
      

//            console.log(objetoJson);

            console.log(this.responseText);
            document.getElementById(div).innerHTML = this.responseText;

            /*document.getElementById('edit_nombre').value = objetoJson.nombre;
            document.getElementById('edit_telefono').value = objetoJson.telefono;
            document.getElementById('edit_ap_paterno').value = objetoJson.ap_paterno;
            document.getElementById('edit_ap_materno').value = objetoJson.ap_materno;
            document.getElementById('edit_email').value = objetoJson.email;
            document.getElementById('edit_informacion_extra').value = objetoJson.informacion_extra;
            document.getElementById('id_cliente').value = objetoJson.id_cliente;
            /*document.getElementById('editar_nombre_contacto').value = objetoJson[0].ap_paterno;
            document.getElementById('editar_ap_paterno').value = objetoJson[0].ap_materno;
            document.getElementById('editar_ap_materno').value = objetoJson[0].telefono;
            document.getElementById('editar_telefono_contacto').value = objetoJson[0].email;
            document.getElementById('editar_email_contacto').value = objetoJson[0].id_usuario;*/

           

        }
    }
    xmlhttp.open("POST", ruta, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("x=1");
}


function eliminar_informacion(nombre_id, valor_id, frm){
    document.getElementById(nombre_id).value = valor_id;
    
    swal({
        title: "Eliminar",
        text: "¿Desear eliminar la información?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            swal("La información ha sido eliminada", {
              icon: "success",
            });
            document.getElementById(frm).submit();
        } /*else {
            swal("Your imaginary file is safe!");
        }*/
    });
}
 function editarCliente(ruta, id){
    console.log(ruta);
    console.log(id);

    var parametros = '', ruta = ruta+id;
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            //console.log(this.responseText);

            var objetoJson = JSON.parse(this.responseText);
      

            console.log(objetoJson);

            document.getElementById('edit_nombre').value = objetoJson.nombre;
            document.getElementById('edit_telefono').value = objetoJson.telefono;
            document.getElementById('edit_ap_paterno').value = objetoJson.ap_paterno;
            document.getElementById('edit_ap_materno').value = objetoJson.ap_materno;
            document.getElementById('edit_email').value = objetoJson.email;
            document.getElementById('edit_informacion_extra').value = objetoJson.informacion_extra;
            document.getElementById('id_cliente').value = objetoJson.id_cliente;
            /*document.getElementById('editar_nombre_contacto').value = objetoJson[0].ap_paterno;
            document.getElementById('editar_ap_paterno').value = objetoJson[0].ap_materno;
            document.getElementById('editar_ap_materno').value = objetoJson[0].telefono;
            document.getElementById('editar_telefono_contacto').value = objetoJson[0].email;
            document.getElementById('editar_email_contacto').value = objetoJson[0].id_usuario;*/

           

        }
    }
    xmlhttp.open("POST", ruta, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("x=" + parametros);
 }

function generarCodigo(){
    JSBarcode('#barcode', '23423423434');
}

function mostrarCodigo(direccion, codigo){
    var codigo = codigo;
    console.log(codigo);


    console.log(direccion);
    ruta = direccion+'backend/InformacionProducto';
    codigoBarras = codigo;

    objetoJson = JSON.stringify(codigoBarras);
    var xmlhttp = new XMLHttpRequest();


    xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            //console.log(this.responseText);
            var vista = this.responseText;
      
            document.getElementById('div_informacion_producto').innerHTML = vista;
            if(this.responseText == 'Articulo no encontrado'){
                console.log('no se muestra tabla');
            }

        }
    }

    xmlhttp.open("POST", ruta, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("codigo="+objetoJson);
    


    $('#modalCodigoBarras').modal('show');
    JsBarcode("#barcode2", codigo,{
        displayValue: true
    });
    document.getElementById('codigoBarras').value = codigo;
    document.getElementById('linkPdf').href = direccion+'backend/createPdf/index/1/'+codigo;



}
function guardarImg(ruta){
    var cantidad, ruta, codigo;
    var xmlhttp = new XMLHttpRequest();
    
    codigo = document.getElementById('codigoBarras').value;

    console.log(codigo);



    var canvas = document.getElementById('barcode2');
    var context = canvas.getContext('2d');



    var dataURL = canvas.toDataURL('image/png');

    var objetoJson = JSON.stringify(dataURL);

    //console.log(objetoJson);
    xmlhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200){

            //var otra = JSON.parse(this.responseText);

            console.log(this.responseText);

        }
    }


    ruta = ruta+'backend/GuardarImg/index';

    xmlhttp.open("POST", ruta, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("x="+objetoJson);
}

function consultarCodigo(valor, ruta){
    console.log(valor);
    var codigoBarras, objetoJson, ruta, precio_establecido;

    console.log(ruta);
    ruta = ruta+'backend/InformacionProducto';
    codigoBarras = valor;

    objetoJson = JSON.stringify(codigoBarras);
    var xmlhttp = new XMLHttpRequest();


    xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            //console.log(this.responseText);
            var vista = this.responseText;
            console.log(this.response);
            document.getElementById('div_informacion_producto').innerHTML = vista;
            if(this.responseText == 'Articulo no encontrado'){
                console.log('no se muestra tabla');
            }else{
                document.getElementById('piezas_venta').disabled = false;
                document.getElementById('btn_agregar_producto').disabled = false;

                precio_establecido = document.getElementById('precio_establecido').innerHTML;
                precio_real = document.getElementById('precio_real').value;
                document.getElementById('precio_unitario_venta').disabled = false;
                document.getElementById('precio_unitario_venta').value = precio_establecido;
                document.getElementById('precio_real_venta').value = precio_real;
            }

        }
    }

    xmlhttp.open("POST", ruta, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("codigo="+objetoJson);
}

function carritoCompras(){
    var tabla, numFilas, filaActual, producto, marca, precio, cantidad, total, totalReal;


    tabla = document.getElementById("tablaDetalleCompra");
    idProductoVenta = document.getElementById('id_producto').value;
    producto = document.getElementById('spanProducto').innerHTML;
    marca = document.getElementById('spanMarca').innerHTML;
    precio = document.getElementById('precio_unitario_venta').value;
    precioRealVenta = document.getElementById('precio_real_venta').value;
    cantidad = document.getElementById('piezas_venta').value;
    
    numFilas = tabla.rows.length;
    filaActual = numFilas - 1;
 
    total = precio * cantidad;
    totalReal = precioRealVenta * cantidad;

    var row = tabla.insertRow(filaActual);
    var celda1 = row.insertCell(0);
    var celda2 = row.insertCell(1);
    var celda3 = row.insertCell(2);
    var celda4 = row.insertCell(3);
    var celda5 = row.insertCell(4);
    var celda6 = row.insertCell(5);
    var celda7 = row.insertCell(6);

    celda1.innerHTML = "<button type='button' onclick='eliminarFila(this)' class='btn btn-xs btn-danger'><i class='fa fa-close'></i></button>";
    celda2.innerHTML = idProductoVenta+"<input type='hidden' name='id_producto_carrito' value='"+idProductoVenta+"' readonly>";
    celda3.innerHTML = producto;
    celda4.innerHTML = marca;
    celda5.innerHTML = "$ "+precio+"<input type='hidden' name='precio_carrito' value='"+precio+"' readonly><input type='hidden' name='precio_real_carrito' value='"+precioRealVenta+"'>";;
    celda6.innerHTML = cantidad+"<input type='hidden' name='cantidad_carrito' value='"+cantidad+"' readonly>";;
    celda7.innerHTML = '$ '+total.toFixed(2)+"<input type='hidden' name='total_carrito' value='"+total.toFixed(2)+"' readonly><input type='hidden' name='total_real_carrito' value='"+totalReal+"'>";

    // limpiamos los campos despues de agregar el producto
    document.getElementById('codigoCapturado').value = '';
    document.getElementById('piezas_venta').value = '';
    document.getElementById('precio_unitario_venta').value = '';
}



function upTo(elemento, tagName) {
  tagName = tagName.toLowerCase();

  while (elemento && elemento.parentNode) {
    elemento = elemento.parentNode;
    if (elemento.tagName && elemento.tagName.toLowerCase() == tagName) {
      return elemento;
    }
  }
  return null;
} 


function eliminarFila(fila){
    var row = upTo(fila, 'tr')
    if (row) row.parentNode.removeChild(row);
}

function limpiar(){
    document.getElementById('codigoCapturado').value = '';
    document.getElementById('piezas_venta').value = '';
    document.getElementById('precio_unitario_venta').value = '';
}

/*function descargarPdf(id, direccion){
    var cantidad, ruta, codigo;
    var xmlhttp = new XMLHttpRequest();
    
    cantidad = document.getElementById(id).value;
    codigo = document.getElementById('codigoBarras').value;
    console.log(cantidad);

    xmlhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200){

            var otra = JSON.parse(this.responseText);

            console.log();

        }
    }


    ruta = direccion+cantidad+'/'+codigo;

    xmlhttp.open("POST", ruta, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("codigo="+codigo+"&cantidad="+cantidad);
}*/

function descargarPdf(id, direccion, cantidad){
    //document.getElementById('btnCodigo').innerHTML = 'LOASDFASF';
    var cantidad, codigo;

    cantidad = document.getElementById(id).value;
    codigo = document.getElementById('codigoBarras').value;


    document.getElementById('linkPdf').href = direccion+'backend/Createpdf/index/'+cantidad+'/'+codigo+'';
}

function reemplazar(){
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            var vista = this.responseText;
            document.getElementById('listadoProveedores').innerHTML = vista;
        }
    }
    xmlhttp.open("POST", base_url+'/listado', true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send();
    //var vista = '$this->load->view("backend/MOD_PROVEEDORES/listadoProveedores", ,TRUE)';
}


function entregarEquipo(id_frm, id){
    document.getElementById('id_frm_servicio_tecnico').value = id;
    swal({
        title: "Entregar",
        text: "¿Realizar entrega del equipo?",
        icon: "info",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            document.getElementById('id_frm_servicio_tecnico').value = id;
            //console.log(this.form);
            document.getElementById(id_frm).submit();
            //console.log(id);
        } /*else {
            swal("Your imaginary file is safe!");
        }*/
    });
}

function eliminarDatos(id){
    swal({
        title: "Eliminar",
        text: "¿Desear eliminar la información?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            //console.log(this.form);
            document.getElementById(id).submit();
            //console.log(id);
        } /*else {
            swal("Your imaginary file is safe!");
        }*/
    });
}


function insertAjax(frm, direccion, cFunction)
{
    var x = 0, i = 0, datos = [], parametros = '', formulario = '', objetoJson, respuesta, numRows, contenido = '';

    // acceder a los datos del formulario
    formulario = document.getElementById(frm).elements;

    for(i = 0; i < formulario.length; i++){
        if(formulario[i].type !== 'button' && formulario[i].type !== 'file'){
            console.log(formulario[i].type);
            datos[x] = formulario[i].name+' : '+formulario[i].value;
            x++;
        }
    }

    var objetoJson = JSON.stringify(datos);


    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200){

            if(cFunction !== ''){
                cFunction(JSON.parse(this.responseText));
            }else{
                JSON.parse(this.responseText);
            }

            $('#modal-nuevo-personal').modal('toggle');
            $('.modal-backdrop').remove();

            document.getElementById(frm).reset();

            swal({
                text: "Registrado corectamente",
                icon: "success",
                buttons: true,
            });
        }
    }

    ruta = direccion;

    xmlhttp.open("POST", ruta, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("x=" + objetoJson);
}


function actualizarAjax(frm, direccion, cFunction)
{
    var x = 0, i = 0, datos = [], parametros = '', formulario = '', objetoJson, respuesta, numRows, contenido = '';

    // acceder a los datos del formulario
    formulario = document.getElementById(frm).elements;

    for(i = 0; i < formulario.length; i++){
        if(formulario[i].type !== 'button' && formulario[i].type !== 'file'){
            console.log(formulario[i].type);
            datos[x] = formulario[i].name+' : '+formulario[i].value;
            x++;
        }
    }

    var objetoJson = JSON.stringify(datos);
    console.log(objetoJson);

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200){

            console.log(this.responseText);

            if(this.responseText != 0){
                console.log('VERDAD');
                cFunction(JSON.parse(this.responseText));
    
                console.log(this.responseText);
                $('#modal-editar-personal2').modal('toggle');
                //$('.modal-backdrop').remove();

                document.getElementById(frm).reset();

                swal({
                    text: "Actualizado corectamente",
                    icon: "success",
                    buttons: true,
                })
                .then((value) => {
                    swal('The returned value is: ${value}');
                });



            }else{
                console.log('FALSE');
            }
            console.log(this.responseText);

            //$('.modal-backdrop').remove();

            swal({
                text: "Registrado corectamente",
                icon: "success",
                buttons: true,
            })
            .then((value) => {
                $('#modal-editar-personal2').modal('toggle');
                document.getElementById(frm).reset();
                console.log('se deberia cerrar');
            });
        }
    }

    var objetoJson = JSON.stringify(datos);

    ruta = direccion;

    xmlhttp.open("POST", ruta, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("x=" + objetoJson);
}


function consultaAjax(ruta, id){

    var parametros = '', ruta = base_url+ruta+id;
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            //console.log(this.responseText);
            var objetoJson = JSON.parse(this.responseText);
      

            document.getElementById('editar_sucursal').value = objetoJson[0].id_sucursal;
            document.getElementById('editar_usuario').value = objetoJson[0].username;
            document.getElementById('editar_password').value = objetoJson[0].password;
            document.getElementById('editar_nombre').value = objetoJson[0].nombre;
            document.getElementById('editar_ap_paterno').value = objetoJson[0].ap_paterno;
            document.getElementById('editar_ap_materno').value = objetoJson[0].ap_materno;
            document.getElementById('editar_telefono').value = objetoJson[0].telefono;
            document.getElementById('editar_email').value = objetoJson[0].email;
            document.getElementById('editar_id_usuario').value = objetoJson[0].id_user;

            $('#modal-editar-personal2').modal('show');

        }
    }
    xmlhttp.open("POST", ruta, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("x=" + parametros);
}

function consultarProveedor(ruta, id){

    var parametros = '', ruta = base_url+ruta+id;
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            //console.log(this.responseText);
            var objetoJson = JSON.parse(this.responseText);
      

            console.log(objetoJson);

            document.getElementById('editar_nombre_proveedor').value = objetoJson[0].nombre;
            document.getElementById('editar_telefono_proveedor').value = objetoJson[0].telefono;
            document.getElementById('editar_direccion').value = objetoJson[0].direccion;
            document.getElementById('editar_informacion_extra').value = objetoJson[0].informacion_extra;

            /*document.getElementById('editar_nombre_contacto').value = objetoJson[0].ap_paterno;
            document.getElementById('editar_ap_paterno').value = objetoJson[0].ap_materno;
            document.getElementById('editar_ap_materno').value = objetoJson[0].telefono;
            document.getElementById('editar_telefono_contacto').value = objetoJson[0].email;
            document.getElementById('editar_email_contacto').value = objetoJson[0].id_usuario;*/

            $('#modal-editar-proveedor').modal('show');

        }
    }
    xmlhttp.open("POST", ruta, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("x=" + parametros);
}


function consultaAjax_back(ruta){

    var parametros = '';
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            //console.log(this.responseText);
            var objetoJson = JSON.parse(this.responseText);
            console.log(objetoJson);
        }
    }
    xmlhttp.open("POST", ruta, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("x=" + parametros);
}

function funcionMostrar(xhttp){
    var contenido = '', total = 0;
    console.log(xhttp);

    total = xhttp.length;

    console.log('EL TOTAL ES: '+total);
    document.getElementById('spanResultados').innerHTML = total;


    for(x in xhttp){
        contenido += "<div class='col-sm-6 col-md-4 col-lg-3'>";
            contenido += "<div class='block block-rounded'>";
                contenido += "<div class='block-header'>";
                    contenido += "<ul class='block-options'>";
                        contenido += "<li>";
                            contenido += "<button type='button' onclick='consultaAjax("+'"/listar/usuarios/"'+","+xhttp[x].id_usuario+")'>";
                                contenido += "<i class='si si-pencil'></i>";
                            contenido += "</button>";
                        contenido += "</li>";
                    contenido += "</ul>";
                    contenido += "<div class='block-title'>"+xhttp[x].nombre+" "+xhttp[x].ap_paterno+"</div>";
                contenido += "</div>";
                contenido += "<div class='block-content block-content-full bg-primary text-center'>";
                    contenido += "<img class='img-avatar img-avatar-thumb' src='' alt=''>";
                contenido += "</div>";

                contenido += "</div>";
                contenido += "<div class='block-content block-content-full bg-primary text-center'>";
                    contenido += "imagen";
                contenido += "</div>";
                contenido += "<div class='block-content'>";

                    contenido += "<table class='table table-borderless table-striped font-s13'>";
                        contenido += "<tbody>";
                            contenido += "<tr>";
                                contenido += "<td class='font-w600' style='width: 30%;'>Sucursal</td>";
                                contenido += "<td>Nom. Sucursal: "+xhttp[x].sucursal+" </td>";
                            contenido += "</tr>";
                            contenido += "<tr>";
                                contenido += "<td class='font-w600'>Telefono</td>";
                                contenido += "<td>"+xhttp[x].telefono+"</td>";
                            contenido += "</tr>";
                        contenido += "</tbody>";
                    contenido += "</table>";
                contenido += "</div>";
            contenido += "</div>";
        contenido += "</div>";
    }
    document.getElementById('tarjetasPersonal').innerHTML = contenido;

}

function editarInformacion(id){
    var ruta = base_url+'backend/MOD_PERSONAL/personal/listar/usuarios/'+id;
    var otra_ruta = window.location.href;
    var nueva_ruta = otra_ruta+'/listar/usuarios/'+id;

    console.log('EL ID ES: '+id);
    console.log('VARIABLE GLOBAL: '+base_url);
    console.log(ruta);

    var parametros = '';
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            //console.log(this.responseText);
            var objetoJson = JSON.parse(this.responseText);
            console.log(objetoJson);
        }
    }
    xmlhttp.open("POST", nueva_ruta, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("x=" + parametros);

}

function cargarContenido(direccion){
	var contenido = '', ruta = '', parametros = 'usuario';

	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if(this.readyState == 4 && this.status == 200){

			//document.getElementById('mostrarSalida').innerHTML = 'asdf';
			console.log(this.responseText);
			respuesta = JSON.parse(this.responseText);


			for(x in respuesta){
				console.log('EL NOMBRE ES: '+respuesta[x].nombre);


                contenido += "<div class='col-sm-6 col-md-4 col-lg-3'>";
                    contenido += "<div class='block block-rounded'>";
                        contenido += "<div class='block-header'>";
                            contenido += "<ul class='block-options'>";
                                contenido += "<li>";
                                    contenido += "<button type='button' data-toggle='modal' data-target='#modal-editar-contacto'>";
                                        contenido += "<i class='si si-pencil'></i>";
                                    contenido += "</button>";
                                contenido += "</li>";
                            contenido += "</ul>";
                            contenido += "<div class='block-title'>"+respuesta[x].nombre+" "+respuesta[x].ap_paterno+"</div>";
                        contenido += "</div>";
                        contenido += "<div class='block-content block-content-full bg-primary text-center'>";
                            contenido += "imagen";
                        contenido += "</div>";
                        contenido += "<div class='block-content'>";

                            contenido += "<table class='table table-borderless table-striped font-s13'>";
                                contenido += "<tbody>";
                                    contenido += "<tr>";
                                        contenido += "<td class='font-w600' style='width: 30%;'>Sucursal</td>";
                                        contenido += "<td>Nom. Sucursal </td>";
                                    contenido += "</tr>";
                                    contenido += "<tr>";
                                        contenido += "<td class='font-w600'>Telefono</td>";
                                        contenido += "<td>"+respuesta[x].telefono+"</td>";
                                    contenido += "</tr>";
                                contenido += "</tbody>";
                            contenido += "</table>";
                        contenido += "</div>";
                    contenido += "</div>";
                contenido += "</div>";

			}

			document.getElementById('cargar_contenido').innerHTML = contenido;
			/*
			numRows = respuesta.length;*/
			//console.log('LA RESPUESTA PHP ES: '+respuesta);



		}
	}



	ruta = direccion+"backend/MOD_PERSONAL/personal/listar";

	xmlhttp.open("POST", ruta, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("x=" + parametros);
}

function editarProveedor(id){
    var ruta = base_url+'backend/MOD_PROVEEDORES/proveedores/editar/'+id;

    var infoProveedor = {};
    var infoContacto = {};
    var jsonProveedor = '', jsonContacto = '';

    infoProveedor = {
        nombre : document.getElementById("editar_nombre_proveedor").value,
        telefono : document.getElementById("editar_telefono_proveedor").value,
        direccion : document.getElementById("editar_direccion").value,
        informacion_extra : document.getElementById("editar_informacion_extra").value
    }
    infoContacto = {
        nombre : document.getElementById("editar_nombre_contacto").value,
        ap_paterno : document.getElementById("editar_ap_paterno").value,
        ap_materno : document.getElementById("editar_ap_materno").value,
        telefono : document.getElementById("editar_telefono_contacto").value,
        email : document.getElementById("editar_email_contacto").value
    }


    jsonProveedor = JSON.stringify(infoProveedor);
    jsonContacto = JSON.stringify(infoContacto);

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){

        }
    }
    xlmhttp.open("POST", ruta, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("proveedor=" + jsonProveedor +"&contacto=" + jsonContacto);

    console.log(infoProveedor);
    console.log(objetoJson);


}
function editarArticulo(id, url){
    $('#modal-editar-articulo').modal('show');

    var ruta, objetoJson;
    var xmlhttp = new XMLHttpRequest();

    ruta = url+'backend/MOD_INVENTARIO/inventario/consultar';
    objetoJson = JSON.stringify(id);

    xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText);
            var respuesta = JSON.parse(this.responseText);

            document.getElementById('edit_img_actual').src = url+respuesta.imagen;
            document.getElementById('edit_id_producto').value = respuesta.id_producto;
            document.getElementById('edit_precio_publico').value = respuesta.precio_publico;
            document.getElementById('edit_precio_proveedor').value = respuesta.precio_interno;
            document.getElementById('edit_nombre').value = respuesta.nombre;
            document.getElementById('edit_marca').value = respuesta.marca;
            document.getElementById('edit_modelo').value = respuesta.modelo;
            document.getElementById('edit_capacidad').value = respuesta.capacidad;
            /*
            console.log(respuesta.marca);
            document.getElementById('id_producto_actualizar').value = respuesta.id_producto;
            document.getElementById('spanTipoArticulo').innerHTML = respuesta.nombre_categoria_producto;
            document.getElementById('spanArticulo').innerHTML = respuesta.nombre_sub_producto;
            document.getElementById('spanProductoActualizar').innerHTML = respuesta.nombre;
            document.getElementById('spanActualizarCantidad').value = respuesta.piezas;
            document.getElementById('cantidad_actual_actualizar').value = respuesta.piezas;
            document.getElementById('precio_publico_actualizar').value = respuesta.precio_publico;
            document.getElementById('precio_interno_actualizar').value = respuesta.precio_interno;*/

        }
    }
    xmlhttp.open("POST", ruta, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("codigo="+objetoJson);


}

function actualizarCantidad(codigo, url){
    $('#modal-actualizar-cantidad').modal('show');
    $('#id_formulario_inventario')[0].reset();
    var ruta, objetoJson;
    var xmlhttp = new XMLHttpRequest();

    ruta = url+'backend/MOD_INVENTARIO/inventario/consultar';
    objetoJson = JSON.stringify(codigo);

    xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText);
            var respuesta = JSON.parse(this.responseText);

            console.log(respuesta.marca);
            document.getElementById('id_producto_actualizar').value = respuesta.id_producto;
            document.getElementById('spanTipoArticulo').innerHTML = respuesta.nombre_categoria_producto;
            document.getElementById('spanArticulo').innerHTML = respuesta.nombre_sub_producto;
            document.getElementById('spanProductoActualizar').innerHTML = respuesta.nombre;
            document.getElementById('spanActualizarCantidad').value = respuesta.piezas;
            document.getElementById('cantidad_actual_actualizar').value = respuesta.piezas;
            document.getElementById('precio_publico_actualizar').value = respuesta.precio_publico;
            document.getElementById('precio_interno_actualizar').value = respuesta.precio_interno;

        }
    }
    xmlhttp.open("POST", ruta, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("codigo="+objetoJson);


}

function consultarCantidad(codigo, url){
    $('#modal-actualizar-cantidad').modal('show');
    var ruta, objetoJson;
    var xmlhttp = new XMLHttpRequest();

    ruta = url+'backend/MOD_INVENTARIO/inventario/consultar';
    objetoJson = JSON.stringify(codigo);

    xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText);
            var respuesta = JSON.parse(this.responseText);

            console.log(respuesta.marca);
            document.getElementById('id_producto_actualizar').value = respuesta.id_producto;
            document.getElementById('spanTipoArticulo').innerHTML = respuesta.nombre_categoria_producto;
            document.getElementById('spanArticulo').innerHTML = respuesta.nombre_sub_producto;
            document.getElementById('spanProductoActualizar').innerHTML = respuesta.nombre;
            document.getElementById('spanActualizarCantidad').value = respuesta.piezas;
            document.getElementById('cantidad_actual_actualizar').value = respuesta.piezas;
        }
    }
    xmlhttp.open("POST", ruta, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("codigo="+objetoJson);


}


function sucursalOrigen(url, nuevo){
    var idProducto, idSucursal, objetoJson;

    ruta = url+'backend/MOD_SUCURSALES/sucursales/consultar'
    idProducto = document.getElementById('id_producto_actualizar').value;
    if(nuevo == 'si'){
        idSucursal = document.getElementById('id_sucursal').value;
    }else{
        idSucursal = document.getElementById('id_sucursal_origen').value;
    }
    
    objetoJson = JSON.stringify(idProducto);
    jsonIdSucursal = JSON.stringify(idSucursal);

    console.log('clic en traspasar'+idProducto);
    console.log('La sucursal'+idSucursal);

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            var respuesta = JSON.parse(this.responseText);

            if(nuevo == 'si'){
                document.getElementById('producto_en_sucursal_original').value = respuesta.piezas;
                document.getElementById('producto_en_sucursal').value = respuesta.piezas;
                //document.getElementById('total_piezas_origen').value = respuesta.piezas;
                document.getElementById('id_sucursal_producto_origen').value = respuesta.id_sucursal_producto;
            }else{
                document.getElementById('piezas_sucursal_origen').value = respuesta.piezas;
                document.getElementById('total_piezas_origen').value = respuesta.piezas;
                document.getElementById('id_sucursal_producto_origen').value = respuesta.id_sucursal_producto;
                console.log(respuesta.piezas);
                console.log(respuesta);
            }
        }
    }

    xmlhttp.open("POST", ruta, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("id="+objetoJson+"&id_sucursal="+jsonIdSucursal);

}

function sucursalDestino(url){
    var idProducto, idSucursal, objetoJson;

    ruta = url+'backend/MOD_SUCURSALES/sucursales/consultar'
    idProducto = document.getElementById('id_producto_actualizar').value;
    idSucursal = document.getElementById('id_sucursal_destino').value;
    objetoJson = JSON.stringify(idProducto);
    jsonIdSucursal = JSON.stringify(idSucursal);

    console.log('clic en traspasar'+idProducto);
    console.log('La sucursal'+idSucursal);

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            var respuesta = JSON.parse(this.responseText);

            //document.getElementById('piezas_sucursal_origen').value = respuesta.piezas;
            document.getElementById('nueva_cantidad_destino').value = respuesta.piezas;
            document.getElementById('input_cantidad_sucursal_destino').value = respuesta.piezas;
            document.getElementById('id_sucursal_producto_destino').value = respuesta.id_sucursal_producto;
            console.log(respuesta.piezas);
            console.log(respuesta);
        }
    }

    xmlhttp.open("POST", ruta, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("id="+objetoJson+"&id_sucursal="+jsonIdSucursal);

}




    function actualizarPiezas(valor){
        console.log('actualizarPiezas');
        var cantidadActual = document.getElementById('cantidad_actual_actualizar').value;
        var cantidadActualSucursal = document.getElementById('producto_en_sucursal_original').value;
        if(valor == ''){
            valor = 0;
        }
        var nuevaCantidad = valor;
        var suma = parseInt(cantidadActual) + parseInt(nuevaCantidad);
        var suma2 = parseInt(cantidadActualSucursal) + parseInt(nuevaCantidad);
        document.getElementById('spanActualizarCantidad').value = suma;
        document.getElementById('producto_en_sucursal').value = suma2;
    }
    function actualizarCantidadTraspaso(){
        console.log('actualizarCantidadTraspaso');
        var totalOrigen, cantidadOrigen, cantidadTraspaso, cantidadEnDestino, resta, total;


        cantidadEnDestino = document.getElementById('input_cantidad_sucursal_destino').value;
        totalOrigen = document.getElementById('total_piezas_origen').value;

        document.getElementById('piezas_sucursal_origen').value = totalOrigen;


        totalOrigen = parseInt(document.getElementById('total_piezas_origen').value);

        cantidadOrigen = parseInt(document.getElementById('piezas_sucursal_origen').value);
        cantidadTraspaso = parseInt(document.getElementById('num_piezas_traspasar').value);


        resta = cantidadOrigen - cantidadTraspaso;

        if(cantidadTraspaso > cantidadOrigen){
            console.log('se paso');
            document.getElementById('piezas_sucursal_origen').value = totalOrigen;
        }else{
            console.log(resta);
            if(Number.isInteger(resta)){
                document.getElementById('piezas_sucursal_origen').value = resta;
            }else{
                document.getElementById('piezas_sucursal_origen').value = totalOrigen;
            }
            total = parseInt(cantidadEnDestino)+parseInt(cantidadTraspaso);
            if(isNaN(total)){
                document.getElementById('nueva_cantidad_destino').value = cantidadEnDestino; 
            }else{
                document.getElementById('nueva_cantidad_destino').value = total;
            }
               
        
        }
        

        console.log('La cantidad destino: '+total);
        //total = cantidadTraspaso
        //document.getElementById('nueva_cantidad_destino').innerHTML = ;
    }

    function cancelarVenta(){
        console.log('cancelar venta');
        document.getElementById('tablaDetalleCompra').innerHTML = '';
    }

    function realizarVenta(url){
        console.log('Boton realizar venta');
        var array_id_producto = document.getElementsByName('id_producto_carrito');
        var array_de_precio = document.getElementsByName('precio_carrito');
        var array_precio_real_carrito = document.getElementsByName('precio_real_carrito');
        var array_de_cantidad = document.getElementsByName('cantidad_carrito');
        var array_total_carrito = document.getElementsByName('total_carrito');
        var array_total_real_carrito = document.getElementsByName('total_real_carrito');
        var ruta = url+'backend/MOD_SERVICIOS/Servicios/venta';

        var array_general = [];

        for (var i = 0; i < array_de_precio.length; i++) {

            array_general.push(
                {
                    id_producto_carrito: array_id_producto[i].value, 
                    precio_carrito: array_de_precio[i].value, 
                    precio_real_carrito: array_precio_real_carrito[i].value,
                    cantidad_carrito: array_de_cantidad[i].value,
                    total_carrito: array_total_carrito[i].value,
                    total_real_carrito: array_total_real_carrito[i].value
                }
            );
        };

        var array_json;
        array_json = JSON.stringify(array_general);

        console.log(array_json);

        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                //var respuesta = JSON.parse(this.responseText);
                console.log(this.responseText);
                fk_id_ticket = this.responseText;

                console.log('EL FK_ID_TICKET: '+fk_id_ticket);
                $('#modalVenta').modal('toggle');
            
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
                    } /*else {
                        swal("Your imaginary file is safe!");
                    }*/
                });

                

            }
        }

        xmlhttp.open("POST", ruta, true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("parametros="+array_json);

    }

    function crearTicket(url, id){
        var ruta = url+'backend/PdfTicket/index/'+id;
        //window.print(ruta);
        window.location.assign(ruta);
        /*var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                //var respuesta = JSON.parse(this.responseText);
                window.location.assign("https://www.w3schools.com")
                //console.log(this.responseText);              

            }
        }

        xmlhttp.open("POST", ruta, true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("parametros=123"); */
    }
