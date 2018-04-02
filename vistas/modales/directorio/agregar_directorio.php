<?php if ( ! defined( 'URL_APP' ) ) { exit; } ?>
<div class="modal fade" id="myModal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"+ aria-hidden="true">x</button>
				<h4 class="modal-title" id="myModalLabel">
					Añadir nuevo elemento:
				</h4>
			</div>
			<div class="modal-body" id="modal_content">
				<form role="form" id="nuevo_elemento">
					<div class="panel panel-primary">
						<div class="panel-body">
							<div class="row">
                                                        <div class="col-md-12">
                                                               <div class="row">
                                                                      <div class="col-md-6">
                                                                             <div class="form-group">
                                                                                  <label for="nivel_primario">Nivel menú</label>
                                                                                  <input type="text" class="form-control" id="nivel_primario" name="nivel_primario" placeholder="Nivel de menú">
                                                                             </div>
                                                                      </div>
                                                                      <div class="col-md-6">
                                                                             <div class="form-group">
                                                                                  <label for="nivel_filtro">Nivel filtro</label>
                                                                                  <input type="text" class="form-control" id="nivel_filtro" name="nivel_filtro" placeholder="Nivel de filtro">
                                                                             </div>
                                                                      </div>
                                                                      <div class="col-md-6">
                                                                             <div class="form-group">
                                                                                  <label for="nombre">Nombre</label>
                                                                                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                                                                             </div>
                                                                      </div>
                                                                      <div class="col-md-6">
                                                                             <div class="form-group">
                                                                                  <label for="cargo">Cargo</label>
                                                                                  <input type="text" class="form-control" id="cargo" name="cargo" placeholder="Cargo">
                                                                             </div>
                                                                      </div>
                                                               </div>
									  <div class="form-group">
										<label for="informacion">Información</label>
										<input type="text" class="form-control" id="informacion" name="informacion" placeholder="Información">
									  </div>
                                                                 <div class="row">
                                                                        <div class="col-md-6">
                                                                               <div class="form-group">
                                                                                    <label for="correo1">Correo 1</label>
                                                                                    <input type="text" class="form-control" id="correo1" name="correo1" placeholder="Correo 1">
                                                                               </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                               <div class="form-group">
                                                                                    <label for="correo2">Correo 2</label>
                                                                                    <input type="text" class="form-control" id="correo2" name="correo2" placeholder="Correo 2">
                                                                               </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                               <div class="form-group">
                                                                                    <label for="correo3">Correo 3</label>
                                                                                    <input type="text" class="form-control" id="correo3" name="correo3" placeholder="Correo 3">
                                                                               </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                               <div class="form-group">
                                                                                    <label for="correo4">Correo 4</label>
                                                                                    <input type="text" class="form-control" id="correo4" name="correo4" placeholder="Correo 4">
                                                                               </div>
                                                                        </div>
                                                                 </div>
                                                                 <div class="row">
                                                                        <div class="col-md-9">
                                                                               <div class="form-group">
              										<label for="tel1">Teléfono 1</label>
              										<input type="text" class="form-control" id="tel1" name="tel1" placeholder="Teléfono 1">
              									  </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                               <div class="form-group">
              										<label for="ext1">Extensión</label>
              										<input type="text" class="form-control" id="ext1" name="ext1" placeholder="Extensión">
              									  </div>
                                                                        </div>
                                                                        <div class="col-md-9">
                                                                               <div class="form-group">
              										<label for="tel2">Teléfono 2</label>
              										<input type="text" class="form-control" id="tel2" name="tel2" placeholder="Teléfono 2">
              									  </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                               <div class="form-group">
              										<label for="ext2">Extensión</label>
              										<input type="text" class="form-control" id="ext2" name="ext2" placeholder="Extensión">
              									  </div>
                                                                        </div>
                                                                        <div class="col-md-9">
                                                                               <div class="form-group">
              										<label for="tel3">Teléfono 3</label>
              										<input type="text" class="form-control" id="tel3" name="tel3" placeholder="Teléfono 3">
              									  </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                               <div class="form-group">
              										<label for="ext3">Extensión</label>
              										<input type="text" class="form-control" id="ext3" name="ext3" placeholder="Extensión">
              									  </div>
                                                                        </div>
                                                                 </div>
								</div>

								<div class="col-md-6">
									  <div class="form-group">
											<label for="cat_status">Habilitado</label>
											<div class="checkbox">
												<input id="chk_cat_elm" name="chk_cat_elm" type="checkbox" checked value="" style="position:relative; left:20px;" onchange="chk_stat_elm()" class="make-switch" data-size="small" data-on-color="success">
											</div>
									  </div>

								</div>
                                                        <div class="col-md-6">&nbsp;</div>
							</div>
						</div>
					</div>
						<script>
						$(".make-switch").bootstrapSwitch();
						</script>

					<div id="error_alerta" > </div>

					<input type="hidden" id="cat_status" name="cat_status" value="3">

					<div class="modal-footer">
						<button  class="btn btn-ar btn-success" type="button" onclick="graba_dir();">Agregar</button>
						<button  data-dismiss="modal" class="btn btn-ar btn-default" type="button">Cancelar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
