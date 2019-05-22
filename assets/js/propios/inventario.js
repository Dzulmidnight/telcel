function localizacionRefaccion(valor){
    if(valor == 'sucursal'){
        document.getElementById('div-listado-sucursal').style.display = 'block';
    }else{
        document.getElementById('div-listado-sucursal').style.display = 'none';
    }
}

function validarInformacion(){
    let localizacion = $('input[name="localizacion_refaccion"]:checked').val();
    let nombrePieza = document.getElementById('nombre_refaccion');
    let modelo = document.getElementById('modelo_refaccion');
    let precio_publico = document.getElementById('precio_publico_refaccion');
    let precio_proveedor = document.getElementById('precio_interno_refaccion');
    let cantidad= document.getElementById('cantidad_refaccion');
    let validacion = true;
    if(localizacion.value == ''){
        alert('Selecciona la localización de la pieza');
        validacion = false;
    }else if(nombrePieza.value == ''){
        validacion = false;
        alert('Completa el campo');
        nombrePieza.focus();
    }else if(modelo.value == ''){
        validacion = false;
        alert('Completa el campo');
        modelo.focus();
    }else if(precio_publico.value == ''){
        validacion = false;
        alert('Completa el campo');
        precio_publico.focus();
    }else if(precio_proveedor.value == ''){
        validacion = false;
        alert('Completa el campo');
        precio_proveedor.focus();
    }else if(cantidad.value == ''){
        validacion = false;
        alert('Completa el campo');
        cantidad.focus();
    }

    if(localizacion == 'sucursal'){
        let sucursal = document.getElementById('id_sucursal_refaccion').value;
        if(sucursal == ''){
            alert('Selecciona la sucursal');
            document.getElementById('id_sucursal_refaccion').focus();
        }
    }
    if(validacion){
        document.getElementById('frm_registro_refaccion').submit();
    }
}

function mostrarCodigoRefaccion(direccion, codigo){
    var codigo = codigo;

    ruta = direccion+'backend/InformacionProducto/index/refaccion';
    codigoBarras = codigo;

    objetoJson = JSON.stringify(codigoBarras);
    var xmlhttp = new XMLHttpRequest();


    xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            //console.log(this.responseText);
            var vista = this.responseText;
      
            document.getElementById('div_informacion_refaccion').innerHTML = vista;
            if(this.responseText == 'Articulo no encontrado'){
                //console.log('no se muestra tabla');
            }

        }
    }

    xmlhttp.open("POST", ruta, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("codigo="+objetoJson);
    


    $('#modalCodigoBarrasRefaccion').modal('show');
    JsBarcode("#barcode2", codigo,{
        displayValue: true
    });
    document.getElementById('codigoBarras').value = codigo;
    document.getElementById('linkPdfRefaccion').href = direccion+'backend/createPdf/index/1/'+codigo+'/'+'refaccion';

}

function enviarForm(id, frm){
    formulario = document.getElementById(frm);
    boton = document.getElementById(id);
    if(boton.click && (boton.value == 'guardarTelefono' || boton.value == 'guardarArticulo') ){
        console.log('se dio click');
        console.log(boton.value);
        console.log(frm);

        function validarInformacion(frm){
            var id = frm;
            var formulario = document.forms[id];
            var numElementos = formulario.elements.length;
            //console.log(formulario);
            //console.log(numElementos);

            for(var i = 0; i < numElementos; i++){
                //console.log(formulario[i].required);
                if(formulario[i].required){
                    if(formulario[i].type == 'select-one'){
                        indice = document.getElementById(formulario[i].id).selectedIndex;
                        if( indice == null || indice == 0 ) {
                            document.getElementById(formulario[i].id).focus();
                        }
                    }else{
                        if(!formulario[i].value){
                            document.getElementById(formulario[i].id).focus();
                            //console.log('falta este: '+formulario[i].id);
                            //console.log('tipo: '+formulario[i].type);
                        }
                    }
                    //console.log(formulario[i].id);
                    //console.log(formulario[i].value);
                }
            }


        }

        document.getElementById(frm).submit();
    }
}

function siguienteEtapa(){
    var categoria_producto = document.getElementById('fk_id_categoria_producto').value;
    var sucursal_producto = document.getElementById('fk_id_sucursal_accesorios').value;
    var proveedor_producto = document.getElementById('fk_id_proveedor_accesorios').value;

    if(categoria_producto !== '' && sucursal_producto !== '' && proveedor_producto !== '' ){
        console.log('seleccionaste los 3');
        console.log(categoria_producto);
        console.log(sucursal_producto);
        console.log(proveedor_producto);
        document.getElementById('frm_detalle_producto').style.display = 'block';
        if(categoria_producto == '3'){
            document.getElementById('tipo_registro').value = 'telefono'
            document.getElementById('div-categoria').style.display = 'none';
            document.getElementById('div-informacion-telefono').style.display = 'block';
            document.getElementById('fk_id_sub_categoria_producto').style.display = 'none';
            document.getElementById('div-informacion-accesorio').style.display = 'none';
        }else{
            document.getElementById('tipo_registro').value = 'accesorio';
            document.getElementById('div-informacion-accesorio').style.display = 'block';
            document.getElementById('div-informacion-telefono').style.display = 'none';
            //document.getElementById('datos_telefono').style.display = 'none';
            //document.getElementById('fk_id_sub_categoria_producto').style.display = 'initial';
        }
    }
}

function numeroCelulares(numero){
    console.log(numero);
    var tabla = document.getElementById('tabla-codigos-telefono');
    var row;


    if(numero > 0){
        for (var i = 1; i < numero; i++) {
            var row = tabla.insertRow(0);
            var celda1 = row.insertCell(0);
            var celda2 = row.insertCell(1);

            celda1.innerHTML = '<input class="form-control" type="text" id="" name="array_codigos[]" value="" placeholder="Codigo telefono">';

            //celda1.innerHTML = "<button type='button' class='btn btn-xs btn-danger' onclick='eliminarColor(this, "+piezas.value+")'><i class='fa fa-close'></i></button> "+color.value;
            celda2.innerHTML = '<input class="form-control" type="text" id="" name="array_imei[]" value="" placeholder="IMEI telefono">';
        };
    }else{
        tabla.innerHTML = '';
        var row = tabla.insertRow(0);
        var celda1 = row.insertCell(0);
        var celda2 = row.insertCell(1);

        celda1.innerHTML = '<input class="form-control" type="text" id="" name="array_codigos[]" value="" placeholder="Codigo telefono">';

        //celda1.innerHTML = "<button type='button' class='btn btn-xs btn-danger' onclick='eliminarColor(this, "+piezas.value+")'><i class='fa fa-close'></i></button> "+color.value;
        celda2.innerHTML = '<input class="form-control" type="text" id="" name="array_imei[]" value="" placeholder="IMEI telefono">';
    }

   /* var celda1 = row.insertCell(0);
    var celda2 = row.insertCell(1);

    celda1.innerHTML = '<input class="form-control" type="text" readonly id="array_codigos[]" name="array_codigos[]" value="" placeholder="Codigo telefono">';
    celda2.innerHTML = '<input class="form-control" type="text" readonly id="array_imei[]" name="array_imei[]" value="" placeholder="IMEI telefono">';*/
}

function guardarColor(){
    var tabla, color, piezas, totalPiezas, suma = 0, inputPiezas = 0, tempPiezas;

    totalPiezas = document.getElementById('piezas').value;
    tabla = document.getElementById('tabla-colores');
    color = document.getElementById('color');
    piezas = document.getElementById('num_color_piezas');
    tempPiezas = document.getElementById('num_color_piezas').value;

    inputPiezas = document.getElementById('input-piezas').value;

    if(color.value !== '' && piezas.value !== ''){

        suma = parseInt(inputPiezas) + parseInt(tempPiezas);

        if(suma > totalPiezas){
            alert('Verifica que el número de piezas sea correcto');
            document.getElementById('piezas').focus();
        }else{
            var row = tabla.insertRow(1);
            var celda1 = row.insertCell(0);
            var celda2 = row.insertCell(1);

            celda1.innerHTML = '<div class="input-group"><span class="input-group-btn"><button class="btn btn-danger" type="button" onclick="eliminarColor(this, '+piezas.value+')"><i class="fa fa-close"></i></button></span><input class="form-control" type="text" readonly id="array_color[]" name="array_color[]" value="'+color.value+'"></div>';

            //celda1.innerHTML = "<button type='button' class='btn btn-xs btn-danger' onclick='eliminarColor(this, "+piezas.value+")'><i class='fa fa-close'></i></button> "+color.value;
            celda2.innerHTML = '<input class="form-control" readonly id="array_piezas_color[]" name="array_piezas_color[]" value="'+piezas.value+'">';
            document.getElementById('input-piezas').value = suma;
        }
        color.value = '';
        piezas.value = '';
    }


    console.log('Total piezas: '+totalPiezas);
    console.log('La suma: '+suma);
}

function eliminarColor(fila, piezas){
    var row = upTo(fila, 'tr');

    if (row) row.parentNode.removeChild(row);


    var inputPiezas = document.getElementById('input-piezas').value;
    var resta =  parseInt(inputPiezas) - parseInt(piezas);
    document.getElementById('input-piezas').value = resta; 


}




/*function actualizarCantidad(){
    console.log('modificando cantidad');

    $('#modal-actualizar-cantidad').modal('show');
}*/


function mostrar(id_padre, elemento, accion, ocultar){

    console.log('ID: '+id_padre);
    console.log('elemento: '+elemento);
    console.log('accion: '+accion);

    var elemento_padre = document.getElementById(id_padre);
    var bandera = document.getElementById('estado');
    var estado = accion;
    
    if(accion == 'mostrar'){
        document.getElementById(elemento).style.display = 'block';
        document.getElementById('icono_btn').classList.remove('fa-plus');
        document.getElementById('icono_btn').classList.add('text-danger','fa-close',);
        elemento_padre.value = "ocultar";
        document.getElementById('texto-btn').innerHTML = 'Cancelar';
        document.getElementById('id_tipo_accesorio').style.display = 'none';
        document.getElementById('div_lista_categoria').style.display = 'none';
    }else{
        document.getElementById(elemento).style.display = 'none';
        document.getElementById('icono_btn').classList.add('text-success','fa-plus');
        document.getElementById('icono_btn').classList.remove('text-danger','fa-close');
        document.getElementById('texto-btn').innerHTML = 'Nuevo';
        elemento_padre.value = "mostrar";
        document.getElementById('id_tipo_accesorio').style.display = 'block';
        document.getElementById('div_lista_categoria').style.display = 'block';
    }
    /*if(bandera.value == 'oculto'){
        estado = 'mostrar';
    }else{
        estado = 'oculto';
    }*/
    
    bandera.value = estado;

}
function tipoElemento(tipo, seccion){
    var hijos = document.querySelectorAll("div#"+seccion+" > div");
    
    tipo = tipo - 1;
    
    for (var i = 0; i < hijos.length; i++) {
        var div_id = hijos[i].id;
        if(tipo == i ){
            document.getElementById(div_id).style.display = 'block';
        }else{
            document.getElementById(div_id).style.display = 'none';
        }
   
    };
    document.getElementById('btn_guardar').style.display = 'initial';
}
function eliminar(){
    swal({
        title: "¿Estas seguro?",
        text: "Una vez eliminado, no podras recuperar la información",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            swal("Cliente eliminado", {
            icon: "success",
        });
        } else {
            //swal("Your imaginary file is safe!");
        }
    });
}

function registrarServicio(){
    swal({
        title: "Operacion exitosa",
        text: "Se ha registrado la información correctamente",
        icon: "success",
        buttons:{
            imprimir:{
                text: "Imprimir nota",
            },
            nuevo:{
                text: "Nuevo registro",
            },
            confirm: true,
        },

    })
    .then((value) => {
        switch(value){
            case "imprimir":
                swal('Mandaste a imprimir');
                break;
            case "nuevo":
                swal('Nuevo registro');
                break;
        }    
    })
    ;

}