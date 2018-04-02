<?php if ( ! defined( 'URL_APP' ) ) { exit; } ?>
<div class="modal fade" id="myModal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"  aria-hidden="true">x</button>
				<h4 class="modal-title" id="myModalLabel">
					Edición de <?php echo $modelo[2]; ?>
				</h4>
			</div>
			<div class="modal-body" id="modal_content">
				<form role="form" id="edita_catalogo">
					<div class="panel panel-primary">
						<div class="panel-body">			
							<div class="row">
								<div class="col-md-12">
									  <div class="form-group">
										<label for="id_padre">ID Parent</label>
										<input id="id_padre" name="id_padre" type="text" placeholder="ID Parent" class="form-control" value="<?php echo $modelo[1]; ?>">
									  </div>
									  <div class="form-group">
										<label for="catalogo">Catalogo</label>
										<input id="catalogo" name="catalogo" type="text" class="form-control" placeholder="Catálogo" value="<?php echo $modelo[2]; ?>">
									  </div>
									  <div class="form-group">
										<label for="etiqueta">Etiqueta</label>
										<input id="etiqueta" name="etiqueta" type="text" class="form-control" placeholder="Etiqueta" value="<?php echo $modelo[3]; ?>">
									  </div>
									  <div class="form-group">
											<label for="chk_activo">Activo</label>
											<div class="checkbox">
												<input id="chk_activo" name="chk_activo" type="checkbox" <?php echo $chk_activo; ?> style="position:relative; left:20px;" onchange="func_chk_activo('<?=$activo?>')" class="make-switch" data-size="small" data-on-color="success">
											</div>
									  </div>
										<script>
										$(".make-switch").bootstrapSwitch();
										</script>
									    <div class="col-md-3">
										<div class="form-group">
											<label for="orden">Orden</label>

											<div class="widget-main">
												<input type="text" class="input-sm" id="orden" name="orden"/>
												<div class="space-6"></div>
											</div>

										</div>
										<script type="text/javascript">
											$("#orden").TouchSpin({
												min: 0,
												max: 1000,
												step: 1,
												initval: 0,
												decimals: 0,
												boostat: 5,
												maxboostedstep: 10
											});											
										</script>									
										</div>										
									<div class="col-md-12">
									  <div class="form-group">
										<label for="valor">Valor</label>
										<textarea id="valor" name="valor" type="text" class="form-control"  placeholder="Valor"><?php echo $modelo[6]; ?></textarea>
									  </div>
									</div>
								</div>
							</div>
						</div>
					</div>						
					<div class="modal-footer">
						<input type="hidden" id="activo" name="activo" value="<?php echo $activo; ?>">
						<input id="id_cat" name="id_cat" type="hidden" value="<?php echo $modelo[0]; ?>">
						<button  onclick="editar_catalogo();" class="btn btn-ar btn-success" type="button">Editar</button>
						
						<?php echo $this->tiene_permiso('Catalogo|eliminar_elemento')?"
						<button  onclick='eliminar_elemento();' class='btn btn-ar btn-danger' type='button'>Eliminar elemento</button>
						":""
						?>
						
						
						<button  data-dismiss="modal" class="btn btn-ar btn-default" type="button">Cancelar</button>
					</div>
				</form>
			</div>
		</div>	
	</div>
</div>