<?php if ( ! defined( 'URL_APP' ) ) { exit; } ?>
<div class="modal fade" id="myModal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"+ aria-hidden="true">x</button>
				<h4 class="modal-title" id="myModalLabel">
					Gestionar Roles
				</h4>
			</div>
			<div class="modal-body" id="modal_content">
				<div class="row">
					<div class="col-md-12 column">
						<div class="table-responsive">
							<table id="roles" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th>ID</th>
										<th>Rol</th>
										<th>Tipo</th>
										<th>Permisos</th>
									</tr>
									<tbody>
									<?php
									foreach ($roles as $row) {
										echo "
										<tr>
											<td>".$row->id_rol."</td>
											<td>".$row->descripcion."</td>
											<td>".$row->etiqueta."</td>
											<td>
											<center>
											<a data-dismiss='modal' onclick=\"carga_archivo('contenedor_principal','roles/permisos/".$row->id_rol."')\" 
											href=\"javascript:void(0)\" class='blue'><i class='ace-icon fa fa-key bigger-130'></i></a>
											</center>
											</td>
										</tr>
										";
									}
									?>
									</tbody>
								</thead>
							</table>
						</div>
					</div>
				</div>
				<div class="row" id="add_field" style="display:none;">
					<form id="nuevo_rol">
						<div class="col-md-12 column">
							<div class="panel-body">
								<div class="form-group">
									<div class="row">
										<div class="form-group">
											<label for="descripcion">Nuevo rol</label>
											<input type="text" placeholder="Rol" id="descripcion" name="descripcion" class="form-control">
										</div>	
										<div class="form-group">
											<label for="cat_tiporol">Tipo Rol</label>
											<select  class="form-control" id="cat_tiporol" name="cat_tiporol" style="width: 50% !important;">
											<?php echo $tiporol; ?>
											</select>
										</div>										
										
										<div class="col-md-2 column">
											<button class="btn btn-ar btn-primary" type="button" onclick="graba_rol();">Agregar</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button  class="btn btn-ar btn-success" type="button" id="add">Agregar</button>
					<button  data-dismiss="modal" class="btn btn-ar btn-default" type="button">Cerrar</button>
				</div>				
			</div>
		</div>
	</div>
</div>
