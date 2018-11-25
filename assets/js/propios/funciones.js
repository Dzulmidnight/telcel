function llamadaAjax(direccion)
{
	var datos = '', parametros = {};
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			myObj = JSON.parse(this.responseText);
			console.log(myObj);
			document.getElementById('mostrarSalida').innerHTML = myObj;
		}
	}

	datos = {"nombre":"yasser", "edad":25}
	parametros = JSON.stringify(datos);
	ruta = direccion+"backend/MOD_PERSONAL/personal/agregar";

	xmlhttp.open("POST", ruta, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("x="+parametros);
}
