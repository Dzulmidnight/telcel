function llamadaAjax(direccion)
{
	var x = 0, i = 0, datos = [], parametros = '', formulario = '', objetoJson, respuesta, numRows, contenido = '';

	// acceder a los datos del formulario
	formulario = document.getElementById('frm-nuevo-personal').elements;

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
			respuesta = JSON.parse(this.responseText);

			for(x in respuesta){
				console.log(respuesta[x]);

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
			numRows = respuesta.length;

			document.getElementById('tarjetasPersonal').innerHTML = contenido;


			$('#modal-nuevo-personal').modal('toggle');
			$('.modal-backdrop').remove();

			swal({
				text: "Registrado corectamente",
				icon: "success",
				buttons: true,
			});

			numResultados(numRows);


		}
	}

	var objetoJson = JSON.stringify(datos);

	ruta = direccion+"backend/MOD_PERSONAL/personal/agregar";

	xmlhttp.open("POST", ruta, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("x=" + objetoJson);
}

function numResultados(num){
	console.log('EL NUMERO DE RESULTADOS ES: '+num);
	document.getElementById('spanResultados').innerHTML = num;
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


function otra(){
        contenido += "<div id='tarjetasPersonal' class='row'>";
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
                            contenido += "<div class='block-title'>NOMBRE DE LA PERSONA</div>";
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
                                        contenido += "<td>TELEFONO</td>";
                                    contenido += "</tr>";
                                contenido += "</tbody>";
                            contenido += "</table>";
                        contenido += "</div>";
                    contenido += "</div>";
                contenido += "</div>";
        contenido += "</div>";

}