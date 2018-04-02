<?php if ( ! defined( 'URL_APP' ) ) { exit; } ?>
<div class="modal fade" id="myModal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"+ aria-hidden="true">x</button>
				<h4 class="modal-title" id="myModalLabel">
					Edición de <?php echo $usuario['nombres'].' '.$usuario['apellido_paterno'].' '.$usuario['apellido_materno']; ?>
				</h4>
			</div>
			<div class="modal-body" id="modal_content">
				<form role="form" id="edita_usuario">
					<div class="panel panel-primary">
						<div class="panel-body">			
							<div class="row">
								<div class="col-md-6">
									  <div class="form-group">
										<label for="id_ubicacion">Ubicación</label>
										  <select class="form-control" id="id_ubicacion" name="id_ubicacion">
											<?php echo $ubicacion; ?>
										  </select>
									  </div>
									  <div class="form-group">
										<label for="usuario">Usuario</label>
										<input disabled id="usuario" name="usuario" type="text" class="form-control" value="<?php echo $usuario['usuario']; ?>">
									  </div>
									  <div class="form-group">
										<label for="nombres">Nombre</label>
										<input id="nombres" name="nombres" type="text" class="form-control" placeholder="Nombre(s)" value="<?php echo $usuario['nombres']; ?>">
									  </div>
									  <div class="form-group">
										<label for="apellido_paterno">Apellido Paterno</label>
										<input id="apellido_paterno" name="apellido_paterno" type="text" class="form-control" placeholder="Apellido Paterno" value="<?php echo $usuario['apellido_paterno']; ?>">
									  </div>
									  <div class="form-group">
										<label for="apellido_materno">Apellido Materno</label>
										<input id="apellido_materno" name="apellido_materno" type="text" class="form-control" placeholder="Apellido Materno" value="<?php echo $usuario['apellido_materno']; ?>">
									  </div>
									  <div class="form-group">
											<label for="chk_change_pass">Requerir cambio de contraseña</label>
											<div class="checkbox">
												<input id="chk_change_pass" name="chk_change_pass" type="checkbox" <?php echo $chk_change_pass; ?> value="" style="position:relative; left:20px;" onchange="chk_stat_pass()" class="make-switch" data-size="small" data-on-color="success">
											</div>
									  </div>									  
									  
								</div>
								<div class="col-md-6">
									  <div class="form-group">
										<label for="correo">Correo electrónico</label>
										<input id="correo" name="correo" type="email" class="form-control" placeholder="Ingresar correo" value="<?php echo $usuario['correo']; ?>">
									  </div>
									  <div class="form-group">
										<label for="password">Contraseña</label>
										<input id="password" name="password" type="password" class="form-control"  placeholder="Ingrese solo si desea cambiarla">
									  </div>
									  <div class="form-group">
										<label for="password2">Confirmar contraseña</label>
										<input id="password2" name="password2" type="password" class="form-control" placeholder="Confirmar contraseña">
									  </div>
									  <div class="form-group">
										<label for="id_rol">Rol</label>
										  <select class="form-control" id="id_rol" name ="id_rol">
											<?php echo $roles; ?>
										  </select>
									  </div>
									  <div class="form-group">
										<label for="fecha_ingreso">Fecha de ingreso</label>
										  <input readonly type="text" class="form-control date-picker" id="fecha_ingreso" name="fecha_ingreso" placeholder="Seleccione la fecha en que ingresó" value="<?php echo $usuario['fecha_ingreso']; ?>">
									  </div>
										<script type="text/javascript">
											if (jQuery().datepicker) {
												$('.date-picker').datepicker({
													orientation: "left",
													autoclose: true,
													format: 'yyyy-mm-dd'
												});
												$('body').removeClass("modal-open"); // fix bug when inline picker is used in modal
											}										
										</script>
									  <div class="form-group">
											<label for="chk_cat_status">Habilitado</label>
											<div class="checkbox">
												<input id="chk_cat_status" name="chk_cat_status" type="checkbox" <?php echo $chk_cat_status; ?> value="" style="position:relative; left:20px;" onchange="chk_stat_user()" class="make-switch" data-size="small" data-on-color="success">
											</div>
									  </div>
								</div>
							</div>
						</div>
					</div>
					
						<script>
						$(".make-switch").bootstrapSwitch();				
						</script>
						
					<input type="hidden" id="cat_status" name="cat_status" value="<?php echo $cat_status; ?>">
					<input type="hidden" id="change_pass" name="change_pass" value="<?php echo $change_pass; ?>">
					
					<div class="modal-footer">
						<button  onclick="editar_usuario();" class="btn btn-ar btn-success" type="button">Editar</button>
						<button  onclick="baja_usuario();" class="btn btn-ar btn-danger" type="button">Baja</button>
						<button  data-dismiss="modal" class="btn btn-ar btn-default" type="button">Cancelar</button>
					</div>
					<input id="id_usuario" name="id_usuario" type="hidden" value="<?php echo $usuario['id_usuario']; ?>">
				</form>
			</div>
		</div>
	</div>
</div>
