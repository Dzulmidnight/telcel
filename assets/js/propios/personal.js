function editarPersonal(id_user)
{
	let base_url = document.getElementById('base_url_input').value;
	let ruta = base_url+'backend/MOD_PERSONAL/Personal/detalle/'+id_user;

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText);

            document.getElementById("div-editar-contenido").innerHTML = this.responseText;
            
            $('#modal-editar-personal').modal('show');
            /*var objetoJson = JSON.parse(this.responseText);
      

            document.getElementById('editar_sucursal').value = objetoJson[0].id_sucursal;
            document.getElementById('editar_usuario').value = objetoJson[0].username;
            document.getElementById('editar_password').value = objetoJson[0].password;
            document.getElementById('editar_nombre').value = objetoJson[0].nombre;
            document.getElementById('editar_ap_paterno').value = objetoJson[0].ap_paterno;
            document.getElementById('editar_ap_materno').value = objetoJson[0].ap_materno;
            document.getElementById('editar_telefono').value = objetoJson[0].telefono;
            document.getElementById('editar_email').value = objetoJson[0].email;
            document.getElementById('editar_id_usuario').value = objetoJson[0].id_user;

            $('#modal-editar-personal2').modal('show');*/

        }
    }
    xmlhttp.open("POST", ruta, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send();
}