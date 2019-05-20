<?php
	$id_user = $detalle_personal->id_user;
	$perfil = $detalle_personal->perfil;
	$usuario = $detalle_personal->username;
	$password = $detalle_personal->password;
	$nombre = $detalle_personal->nombre;
	$ap_paterno = $detalle_personal->ap_paterno;
	$ap_materno = $detalle_personal->ap_materno;
	$email = $detalle_personal->email;
	$telefono = $detalle_personal->telefono;
 ?>
<!-- Editar Personal -->
<div class="modal" id="modal-editar-personal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-popout">
        <div class="modal-content">
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header bg-warning">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title"><i class="fa fa-user-circle push-5-r"></i> Editar Personal</h3>
                </div>
                <div class="block-content">
                    <form id="frm-nuevo-personal" class="form-horizontal push-10-t push-10" action="<?php echo base_url(); ?>backend/MOD_PERSONAL/personal/editar/<?= $id_user; ?>" method="POST">
                        <!--<div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2">
                                <div class="push">
                                    <img class="img-avatar" src="<?php echo base_url(); ?>assets/img/avatars/avatar15.jpg" alt="">
                                </div>
                            </div>
                        </div>-->

                        <div class="form-group">
                            <div class="col-sm-6">
                                <div class="form-material">
                                    <select class="form-control" id="id_sucursal" name="id_sucursal" size="1" style="margin-top: 1.5em;">
                                        <option>...</option>
                                        <?php foreach($row_sucursales as $sucursal): ?>
                                        <?php 
                                        	if($sucursal->id_sucursal == $detalle_personal->id_sucursal){
                                        		echo '<option value="'.$sucursal->id_sucursal.'" selected>'.$sucursal->nombre.'</option>';
                                        	}else{
                                        		echo '<option value="'.$sucursal->id_sucursal.'">'.$sucursal->nombre.'</option>';
                                        	}
                                         ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <label for="id_sucursal">Asignar sucursal</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-material">
                                    <select class="form-control" id="perfil" name="perfil" size="1" style="margin-top: 1.5em;" onchange="tipoUsuario(this.value);">
                                        <option>Lista de perfiles</option>
                                        <option value="administrador" <?php if($perfil == 'administrador'){ echo 'selected'; } ?>>Administrador</option>
                                        <option value="tecnico" <?php if($perfil == 'tecnico'){ echo 'selected'; } ?>>Técnico</option>
                                        <option value="usuario" <?php if($perfil == 'usuario'){ echo 'selected'; } ?>>Usuario</option>
                                    </select>
                                    <label for="perfil">Perfil de usuario</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-6">
                                <label for="username">Usuario</label>
                                <input type="text" class="form-control" name="username" id="username" value="<?php echo $usuario; ?>" placeholder="Escribe aquí">

                            </div>
                            <div class="col-sm-6">
                                <label for="password">Contraseña</label>
                                <input type="text" class="form-control" name="password" id="password" value="<?php echo $password; ?>" placeholder="Escribe aquí">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $nombre; ?>" placeholder="Escribe aquí">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label for="ap_paterno">Apellido Paterno</label>
                                <input type="text" class="form-control" name="ap_paterno" id="ap_paterno" value="<?php echo $ap_paterno; ?>" placeholder="Escribe aquí">
                            </div>
                            <div class="col-sm-6">
                                <label for="ap_materno">Apellido Materno</label>
                                <input type="text" class="form-control" name="ap_materno" id="ap_materno" value="<?php echo $ap_materno; ?>" placeholder="Escribe aquí">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-6">
                                <label for="telefono">Telefono</label>
                                <input type="text" class="form-control" name="telefono" id="telefono" value="<?php echo $telefono; ?>" placeholder="Escribe aquí">
                            </div>
                            <div class="col-sm-6">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email" id="email" value="<?php echo $email; ?>" placeholder="Escribe aquí">
                            </div>
                        </div>
                        <?php 
                        	if($perfil == 'administrador'){
                        	?>
		                        <div id="div_visibilidad_sucursal" class="col-md-12">
		                            <hr>
		                            <h4>Configuración de cuenta</h4>
		                            <p>
		                                Visualizar solo información de las siguiente Sucursales:
		                            </p>
		                            <?php 
										foreach($row_sucursales as $sucursal){
											$accion = '';
											foreach ($row_sucursales_administrador as $sucursal_adm) {
												if($sucursal->id_sucursal == $sucursal_adm->id_sucursal){
													$accion = 'checked';
													break;
												}else{
													$accion = '';
												}
											}
										?>
			                                <label class="css-input css-checkbox css-checkbox-lg css-checkbox-default">
			                                    <input type="checkbox" name="ver_sucursal[]" value="<?= $sucursal->id_sucursal; ?>" <?= $accion; ?>><span></span> <?= $sucursal->nombre; ?>
			                                </label>

			                                <br>
										<?php
										}
		                             ?>
		                        </div>
                        	<?php
                        	}
                         ?>

                        <div class="form-group text-right">
                            <div class="col-sm-12" style="margin-top:2em;">
                                <input type="hidden" name="fecha_registro" value="<?= time() ?>">
                                <button type="submit" class="btn btn-sm btn-primary">
                                    <i class="fa fa-check"></i> Guardar cambios
                                </button>
                                <!--<button id="btn-nuevo-personal" class="btn btn-sm btn-primary" type="button" onclick="insertAjax('frm-nuevo-personal','<?php echo base_url(); ?>backend/MOD_PERSONAL/personal/agregar', funcionMostrar)"><i class="fa fa-check push-5-r"></i> Crear usuario</button>-->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Editar Personal -->