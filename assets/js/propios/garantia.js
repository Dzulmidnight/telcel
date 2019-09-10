function consultarGarantia()
{
	let baseUrl = document.getElementById("input-base-url").value;
    let ruta = baseUrl+"backend/MOD_GARANTIA/Garantia/consultarTicket";
	let numeroTicket = document.getElementById("numero-ticket").value;
    let inputBusqueda = document.getElementById("numero-ticket");

    let divResultado = document.getElementById("div-resultado-ticket");
    let parametros = numeroTicket;

    divResultado.innerHTML = "";
    inputBusqueda.value = "";
    let xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function(){
    	if(this.readyState == 4 && this.status == 200){
            let respuesta = this.responseText;
            if(respuesta){
                divResultado.innerHTML = respuesta;
            }else{
                divResultado.innerHTML = "<b style='color:red;'>No se encontro información</b>";
            }
    	}
    }
    xmlhttp.open("POST", ruta, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("parametros="+parametros);
}