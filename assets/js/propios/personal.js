function editarPersonal(id_user)
{
	let base_url = document.getElementById('base_url_input').value;
	let ruta = base_url+'backend/MOD_PERSONAL/Personal/detalle/'+id_user;

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("div-editar-contenido").innerHTML = this.responseText;
            
            $('#modal-editar-personal').modal('show');
        }
    }
    xmlhttp.open("POST", ruta, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send();
}