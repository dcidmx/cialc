<?php if ( ! defined( 'URL_APP' ) ) { exit; } ?>


<div class="container">
	<section class="margin-bottom">
	<input type="hidden" name="role" id="role" value="<?php echo $rol; ?>">
		<?php
		if($this->tiene_permiso('Roles|clonar')){
		?>
			<h3 class="header lighter green wow fadeInUp animated" style="font-size:2.5em !important; line-height:70px;">
				Clonar para <?=$descripcion?>:
			</h3>
			<div class="wow fadeInUp animated">
				<div class="col-xs-4">
				  <select class="form-control" id="id_rol_clone" name="id_rol_clone">
					<?php echo $roles; ?>
				  </select>
				</div>
				<div class="col-xs-2">
					<button onclick="clonar_rol();" class="btn btn-sm btn-primary">Clonar</button>			
				</div><br>
			</div>
		<?php
		}else{
		?>
			<h3 class="header lighter green wow fadeInUp animated" style="font-size:2.5em !important; line-height:70px;">
			Definir <?=$descripcion?>:
			</h3>
		<?php
		}
		$printhead = 1;
		$titulo = '';
		foreach ($metodos as $num => $metodo){
			if($metodo->controlador != $titulo){$printhead = 1;}
			if($printhead == 1){
				echo '<h3 class="header lighter green wow fadeInUp animated" style="font-size:2.5em !important; line-height:70px;">'.$metodo->controlador.'</h3>';
				$printhead = 0;
				$titulo = $metodo->controlador;
			}
				$permiso = $roles_data->getPermisos($rol,$metodo->id_metodo);
				if($permiso == 1){$checked = 'checked';}else{$checked = '';}
			?>
					
				<div class="text-icon wow fadeInUp animated">
					<span style="float: left; position:relative;">
						<input onchange='setPermission(<?php echo $metodo->id_metodo; ?>)' id="permission_<?php echo $metodo->id_metodo; ?>" name="permission_<?php echo $metodo->id_metodo; ?>" class="make-switch" data-size="small" data-on-color="success" type="checkbox" <?php echo $checked; ?>/>
						<span class="lbl"></span>
					</span>
					<div class="text-icon-content">
						<h4 class="blue">
							&nbsp;&nbsp;&nbsp;<?php echo $metodo->nombre;?>
							<span style="font-size:.6em;">
								(<?php echo $metodo->metodo; ?>)
							</span>									
						</h4>
						
						<div class="profile-activity clearfix" style="height:50px !important;">
							<div>
								<div class="time">
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $metodo->descripcion; ?>
								</div>
							</div>
						</div>
						<?php
						if($metodo->metodo == 'agregar_usuario'){
						?>	
							<div class="well">
								<h4 class="green smaller lighter">Roles que a los que tiene acceso este rol</h4>
								Seleccione los roles que podrán asignar los usuarios vinculados a este rol, cuando esté activa la opción de insertar un usuario y/o la opción de actualizar los datos de un usuario. Tenga en cuenta que si el usuario tiene acceso a este módulo entonces podría modificar estos permisos.<br><br>
								<table class="table_width">
								<?php
									$j=0;
									for($i=0;$i < count($roles_ck); $i++){
										
										$acceso = $roles_data->getAccesos($rol,$roles_ck[$i]['value']);
										if($acceso == 1){$checked_ac = 'checked';}else{$checked_ac = '';}
										
										echo ($j == 0)?'<tr>':'';
										echo '<td>';
										?>
										
											<input onchange='vincular_rol(<?=$roles_ck[$i]['value']?>)' id="accessrol<?=$roles_ck[$i]['value']?>" name="accessrol<?=$roles_ck[$i]['value']?>" class="make-switch" data-size="mini" data-on-color="success" type="checkbox" <?php echo $checked_ac; ?>/>
											<span class="lbl">&nbsp;&nbsp;<?=$roles_ck[$i]['valor']?>&nbsp;&nbsp;(<?=$roles_ck[$i]['etiqueta']?>)</span>
										
										<?php
										echo '</td>';
										echo ($j == 2)?'</tr>':'';
										if($j >= 2){$j = 0;}else{$j++;}
									}								
								?>
								</table>
							</div>
						<?php
						}
						?>
						<script>
						$(".make-switch").bootstrapSwitch();
						</script>
					</div>
				</div>
					
			<?php
		}
		?>
	</section>
</div>
