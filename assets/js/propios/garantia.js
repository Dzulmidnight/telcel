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

function devolverProducto(idProducto, piezas, nombreProducto)
{
    let idTicket = document.getElementById("input-id-ticket").value;
    let codigoTicket = document.getElementById("input-codigo-ticket").value;
    let baseUrl = document.getElementById('input-base-url').value;
    let ruta = baseUrl + 'backend/MOD_GARANTIA/Garantia/aplicarDevolucion';
    let datos = {
        idTicket : idTicket,
        ticket : codigoTicket,
        idProducto : idProducto,
        numPiezas : piezas
        
    };
    let parametros = JSON.stringify(datos);    

    if(piezas == 1){
        swal({
            title: "Devolución",
            text: "¿Desear aplicar la devolución del producto: "+nombreProducto+"?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                let xmlhttp = new XMLHttpRequest();

                xmlhttp.onreadystatechange = function(){
                    if(this.readyState == 4 && this.status == 200){
                        respuesta = this.responseText;
                        if(respuesta){
                            document.getElementById("div-resultado-ticket").innerHTML = "";
                            swal("Se ha aplicado la devolución", "success");
                            if(respuesta != "eliminado"){
                                crearTicket(baseUrl, respuesta);
                            }
                        }else{
                            swal("Ha ocurrido un problema con la devolución", "error");
                        }
                    }
                }
                xmlhttp.open("POST", ruta, true);
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xmlhttp.send("parametros="+parametros);
                //document.getElementById(frm).submit();*/
            }
        });
    }else{
        swal({
            title: "Devolución",
            text: "¿Deseas aplicar la devolución del producto: "+nombreProducto+"?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            content: {
                element: "input",
                attributes: {
                    placeholder: "Piezas a devolver"
                }
            } 
        })
        .then((value) => {
            if (value) {
                let xmlhttp = new XMLHttpRequest();

                xmlhttp.onreadystatechange = function(){
                    if(this.readyState == 4 && this.status == 200){
                        let respuesta = this.responseText;
                        document.getElementById("div-resultado-ticket").innerHTML = "";
                        if(respuesta != "eliminado"){
                            crearTicket(baseUrl, respuesta);
                        }
                    }
                }
                xmlhttp.open("POST", ruta, true);
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xmlhttp.send("parametros="+parametros+"&piezas="+value);
                //document.getElementById(frm).submit();*/
            }else{
                swal({
                    text: "Debes ingresar el número de piezas",
                    icon: "warning"
                });
            } /*else {
                swal("Your imaginary file is safe!");
            }*/
        });
    }
    
}

function crearTicket(url, id){
    let ruta = url + "backend/PdfTicket/index/" + id;
    /* abrir en otra ventana
        window.location.assign(ruta);
    */
    document.getElementById("frame_pdf").src = ruta;
    $("#modalPdf").modal("show");

}