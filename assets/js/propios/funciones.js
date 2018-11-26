function llamadaAjax(direccion)
{
	var i = 0; datos = '', parametros = {}, formulario = '';
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if(this.readyState == 4 && this.status == 200){

			document.getElementById('mostrarSalida').innerHTML = 'asdf';

			// acceder a los datos del formulario
			formulario = document.getElementById('frm-nuevo-personal').elements;
			console.log(formulario);

			for(i = 0; i < formulario.length; i++){
				console.log(formulario[i].type+' -- valor: '+formulario[i].value);
			}
			/*$('#modal-nuevo-personal').modal('toggle');
			$('.modal-backdrop').remove();

			swal({
				text: "Registrado corectamente",
				icon: "success",
				buttons: true,
			});*/

		}
	}

	datos = {"nombre":"yasser", "edad":25}
	parametros = JSON.stringify(datos);
	ruta = direccion+"backend/MOD_PERSONAL/personal/agregar";

	xmlhttp.open("POST", ruta, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("x="+parametros);
}