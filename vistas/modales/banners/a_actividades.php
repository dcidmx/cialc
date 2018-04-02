<?php if ( ! defined( 'URL_APP' ) ) { exit; } ?>
<div class="modal fade" id="myModal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"+ aria-hidden="true">x</button>
				<h4 class="modal-title" id="myModalLabel">
					Añadir nuevo banner de actividades:
				</h4>
			</div>
			<div class="modal-body" id="modal_content">
				<form role="form" id="nuevo_banner">
					<div class="panel panel-primary">
						<div class="panel-body">
							<div class="row">
                <div class="col-md-12">
                       <div class="row">
                              <div class="col-md-6">
                                     <div class="form-group">
                                          <label for="name">Nombre</label>
                                          <input type="text" class="form-control" id="name" name="name" placeholder="Nombre">
                                     </div>
                              </div>
                              <div class="col-md-6">
                                     <div class="form-group">
                                          <label for="alternativo">Texto alternativo</label>
                                          <input type="text" class="form-control" id="alternativo" name="alternativo" placeholder="Texto alternativo">
                                     </div>
                              </div>
                       </div>
                       <div class="row">
                              <div class="col-md-12">
                                     <div class="form-group">
                                          <label for="descripcion">Descripción</label>
                                          <textarea type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción"></textarea>
                                     </div>
                              </div>
                       </div>

								</div>

								<div class="col-md-4">
									  <div class="form-group">
											<label for="status">Habilitado</label>
											<div class="checkbox">
												<input id="chk_cat_elm" name="chk_cat_elm" type="checkbox" value="" style="position:relative; left:20px;" onchange="chk_stat_elm()" class="make-switch" data-size="small" data-on-color="success">
											</div>
									  </div>

								</div>
                <div class="col-md-2">
									<label for="orden">Orden</label>
									<input style="margin-top: 10px;" type="text" placeholder="Orden" id="orden" name="orden" class="form-control">
								</div>
								<div class="col-md-6">&nbsp;</div>
							</div>
						</div>
					</div>
						<script>
						$(".make-switch").bootstrapSwitch();
						</script>

					<div id="error_alerta" > </div>

					<input type="hidden" id="status" name="status" value="4">

					<div class="modal-footer">
						<button  class="btn btn-ar btn-success" type="button" onclick="guardar_banner_act();">Agregar</button>
						<button  data-dismiss="modal" class="btn btn-ar btn-default" type="button">Cancelar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
