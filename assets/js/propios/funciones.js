var base_url = window.location.href;

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

            //document.getElementById('mostrarSalida').innerHTML = 'asdf';
            /*respuesta = JSON.parse(this.responseText);

            for(x in respuesta){
                console.log(respuesta[x]);
            }
            numRows = respuesta.length;

            document.getElementById('tarjetasPersonal').innerHTML = contenido;


            $('#modal-nuevo-personal').modal('toggle');
            $('.modal-backdrop').remove();

            swal({
                text: "Registrado corectamente",
                icon: "success",
                buttons: true,
            });

            numResultados(numRows);*/
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
            console.log(objetoJson[0].nombre);
            document.getElementById('editar_sucursal').value = objetoJson[0].id_sucursal;
            document.getElementById('editar_usuario').value = objetoJson[0].usuario;
            document.getElementById('editar_nombre').value = objetoJson[0].nombre;
            document.getElementById('editar_ap_paterno').value = objetoJson[0].ap_paterno;
            document.getElementById('editar_ap_materno').value = objetoJson[0].ap_materno;
            document.getElementById('editar_telefono').value = objetoJson[0].telefono;
            document.getElementById('editar_email').value = objetoJson[0].email;

            $('#modal-editar-contacto').modal('show');

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
                                contenido += "<td>Nom. Sucursal </td>";
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