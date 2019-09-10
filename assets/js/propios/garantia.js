function consultarGarantia()
{
	let baseUrl = document.getElementById('input-base-url').value;
	let numeroTicket = document.getElementById('numero-ticket').value;

    let xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function(){
    	if(this.readyState == 4 && this.status == 200){

    	}
    }
    xmlhttp.open("POST", ruta, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("parametros=" + array_json + "&id_vendedor=" + id_vendedor_json + "&id_sucursal_venta=" + id_sucursal_venta);
}