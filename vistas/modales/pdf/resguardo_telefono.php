<?php if ( ! defined( 'URL_APP' ) ) { exit; } ?>
<div class="modal fade" id="myModal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"+ aria-hidden="true">x</button>
				<h4 class="modal-title" id="myModalLabel">
					Opciones de resguardo
				</h4>
			</div>
			<div class="modal-body" id="modal_content">
				<form role="form" id="generar_resguardo">
					<div class="row">
						<div class="col-md-12 column">
								<div class="panel panel-primary">
									<div class="panel-body">			
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label bolder blue" for="autoriza">Autoriza</label>
													<select  class="form-control" id="autoriza" name="autoriza">
														<?php echo $roles; ?>
													</select>
												</div>
												<div class="control-group">
													<label class="control-label bolder blue">Tiempo</label>
													<div class="radio">
														<label>
															<input id="indefinido"  name="tiempo" value="Indefinido" type="radio" class="ace input-lg">
															<span class="lbl bigger-120"> Indefinido</span>
														</label>
														<label>
															<input id="provisional" name="tiempo" value="Provisional" type="radio" class="ace input-lg">
															<span class="lbl bigger-120"> Provisional</span>
														</label>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label bolder blue">Accesorios</label>
													<div class="checkbox">
														<label>
															<input name="accesorios[]" id="cargador" type="checkbox" class="ace input-lg" value="Cargador de pared">
															<span class="lbl bigger-120">Cargador de pared</span>
														</label>
													</div>
													<div class="checkbox">
														<label>
															<input name="accesorios[]" id="usb" type="checkbox" class="ace input-lg" value="Cable USB">
															<span class="lbl bigger-120">Cable USB</span>
														</label>
													</div>
													<div class="checkbox">
														<label>
															<input name="accesorios[]" id="freehand" type="checkbox" class="ace input-lg" value="Manos Libres">
															<span class="lbl bigger-120">Manos Libres</span>
														</label>
													</div>
													<div class="checkbox">
														<label>
															<input name="accesorios[]" id="cargador_auto" type="checkbox" class="ace input-lg" value="Cargador de auto">
															<span class="lbl bigger-120">Cargador de auto</span>
														</label>
													</div>
												</div>
												<div class="control-group">
													<label class="control-label bolder blue">Opciones</label>
													<div class="checkbox">
														<label>
															<input name="opciones[]" id="cancelar_anterior" type="checkbox" class="ace input-lg" value="Este resguardo cancela el resguardo anterior">
															<span class="lbl bigger-120">Cancelar resguardo anterior</span>
														</label>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
						</div>
					</div>
					<div class="modal-footer">					
						<button onclick="genera_resguardo(<?=$id_celular?>);" class="btn btn-ar btn-success" type="button" id="add">Generar resguardo</button>
						<button  data-dismiss="modal" class="btn btn-ar btn-default" type="button">Cerrar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>