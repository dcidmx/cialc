<?php if ( ! defined( 'URL_APP' ) ) { exit; } ?>
<div class="modal fade" id="myModal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"+ aria-hidden="true">x</button>
				<h4 class="modal-title" id="myModalLabel">
					Añadir nuevo proyecto:
				</h4>
			</div>
			<div class="modal-body" id="modal_content">
				<form role="form" id="nuevo_proyecto">
					<input type="hidden" id="cat_status" name="cat_status" value="4">
					<div class="panel panel-primary">
						<div class="panel-body">
							<div class="row">
                <div class="col-md-12">
                       <div class="row">
		                      <div class="col-md-6">
		                             <div class="form-group">
		                                  <label for="investigador">Investigador</label>
		                                  <input type="text" class="form-control" id="investigador" name="investigador" placeholder="Investigador">
		                             </div>
		                      </div>
													<div class="col-md-3">
		                             <div class="form-group">
		                                  <label for="orden">Orden</label>
		                                  <input value="" type="text" class="form-control" id="orden" name="orden" placeholder="Orden">
		                             </div>
		                      </div>
													<div class="col-md-3">
															<div class="form-group">
																<label for="chk_cat_elm">Habilitado</label>
																<div class="checkbox" style="margin-top: 0px;margin-bottom: 0px;">
																	<input id="chk_cat_elm" name="chk_cat_elm" type="checkbox" value="" onchange="chk_stat_pyct()" class="make-switch" data-size="small" data-on-color="success">
																</div>
															</div>
													</div>

													<div class="col-md-12">
		                             <div class="form-group">
		                                  <label for="lineas">Líneas</label>
		                                  <input type="text" class="form-control" id="lineas" name="lineas" placeholder="Líneas">
		                             </div>
		                      </div>
													<div class="col-md-12">
		                             <div class="form-group">
		                                  <label for="area">Área</label>
		                                  <input type="text" class="form-control" id="area" name="area" placeholder="Área">
		                             </div>
		                      </div>
                       </div>
                       	<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label for="proyecto">Proyecto</label>
															<textarea type="text" class="form-control" id="proyecto" name="proyecto" placeholder="Proyecto"></textarea>
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<label for="descripcion">Descripción</label>
															<textarea type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción"></textarea>
														</div>
													</div>
												</div>
								</div>
							</div>
						</div>
					</div>
						<script>
						$(".make-switch").bootstrapSwitch();
						</script>

					<div id="error_alerta" > </div>

					<div class="modal-footer">
						<button  class="btn btn-ar btn-success" type="button" onclick="agregar_proyecto_do();">Agregar</button>
						<button  data-dismiss="modal" class="btn btn-ar btn-default" type="button">Cancelar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
