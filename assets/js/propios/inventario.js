function siguienteEtapa(){
    var categoria_producto = document.getElementById('fk_id_categoria_producto').value;
    var sucursal_producto = document.getElementById('fk_id_sucursal').value;
    var proveedor_producto = document.getElementById('fk_id_proveedor').value;

    if(categoria_producto !== '' && sucursal_producto !== '' && proveedor_producto !== '' ){
        console.log('seleccionaste los 3');
        console.log(categoria_producto);
        console.log(sucursal_producto);
        console.log(proveedor_producto);
        document.getElementById('frm_detalle_producto').style.display = 'block';
        if(categoria_producto == '2'){
            document.getElementById('div-categoria').style.display = 'none';
            document.getElementById('datos_telefono').style.display = 'block';
            document.getElementById('fk_id_sub_categoria_producto').style.display = 'none';
        }else{
            document.getElementById('datos_telefono').style.display = 'none';
            document.getElementById('fk_id_sub_categoria_producto').style.display = 'initial';
        }

    }



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