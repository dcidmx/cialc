<?php if ( ! defined( 'URL_APP' ) ) { exit; } ?>
<div class="modal fade" id="myModal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"+ aria-hidden="true">x</button>
				<h4 class="modal-title" id="myModalLabel">
					Nuevo Par
				</h4>
			</div>
			<div class="modal-body" id="modal_content">
				<form role="form" id="nuevo_modelo">	
					<div class="panel panel-primary">
						<div class="panel-body">			
							<div class="row">
								<div class="col-md-12">
									  <div class="form-group">
										<label for="controlador">Controlador</label>
										<input id="controlador" name="controlador" type="text" placeholder="Controlador" class="form-control" value="">
									  </div>
									  <div class="form-group">
										<label for="metodo">Método</label>
										<input id="metodo" name="metodo" type="text" class="form-control" placeholder="Método" value="">
									  </div>
									  <div class="form-group">
										<label for="nombre">Nombre</label>
										<input id="nombre" name="nombre" type="text" class="form-control" placeholder="Nombre" value="">
									  </div>
									  <div class="form-group">
										<label for="descripcion">Descripción</label>
										<textarea id="descripcion" name="descripcion" type="text" class="form-control"  placeholder="Descripción"></textarea>
									  </div>	
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button  onclick="agregar_metodo();" class="btn btn-ar btn-success" type="button">Agregar</button>
						<button  data-dismiss="modal" class="btn btn-ar btn-default" type="button">Cancelar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>