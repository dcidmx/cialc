<?php if ( ! defined( 'URL_APP' ) ) { exit; } ?>
<div class="modal fade" id="myModal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"+ aria-hidden="true">x</button>
				<h4 class="modal-title" id="myModalLabel">
					Editar proyecto:
				</h4>
			</div>
			<div class="modal-body" id="modal_content">
				<form role="form" id="editar_proyecto">
					<input type="hidden" id="cat_status" name="cat_status" value="<?=$proyecto[0]->cat_status?>">
					<input type="hidden" id="id_proyecto" name="id_proyecto" value="<?=$proyecto[0]->id_proyecto?>">
					<div class="panel panel-primary">
						<div class="panel-body">
							<div class="row">
                <div class="col-md-12">
                       <div class="row">

												 <div class="col-md-12">
																<div class="row">
																			 <div class="col-md-6">
																							<?php if(!$proyecto[0]->image){ ?>
																										 <div id="image_actual">
																												 <img src="http://ipsumimage.appspot.com/285x190?l=Proyecto" class="img-responsive" alt="">
																										</div>
																							<?php }else{ ?>
																										 <div id="image_actual">
																												 <img src="plugs/timthumb.php?src=content/proyectos/images/<?=$proyecto[0]->image?>&w=280"  alt="">
																										</div>
																							<?php } ?>
																			 </div>
																			 <div class="col-md-6">
																				 <div class="m-form m-form--fit m-form--label-align-right">
																					 <div class="m-portlet__body">
																						 <div class="form-group m-form__group row">
																							 <div class="col-lg-12 col-md-12 col-sm-12">
																								 <div class="m-dropzone dropzone" id="m-dropzone-one">
																									 <div class="m-dropzone__msg dz-message needsclick">
																										 <h3 class="m-dropzone__msg-title">
																											 <i class="fa fa-cloud-upload big-center"></i>
																										 </h3>
																									 </div>
																								 </div>
																							 </div>
																						 </div>
																					 </div>
																				 </div>
																			 </div>
																</div>
												</div>


		                      <div class="col-md-6">
		                             <div class="form-group">
		                                  <label for="investigador">Investigador</label>
		                                  <input value="<?=$proyecto[0]->investigador?>" type="text" class="form-control" id="investigador" name="investigador" placeholder="Investigador">
		                             </div>
		                      </div>
													<div class="col-md-3">
		                             <div class="form-group">
		                                  <label for="orden">Orden</label>
		                                  <input value="<?=$proyecto[0]->orden?>" type="text" class="form-control" id="orden" name="orden" placeholder="Orden">
		                             </div>
		                      </div>
													<div class="col-md-3">
															<div class="form-group">
																<label for="chk_cat_elm">Habilitado</label>
																<div class="checkbox" style="margin-top: 0px;margin-bottom: 0px;">
																	<?php $checked = ($proyecto[0]->cat_status == 3)?'checked':''; ?>
																	<input id="chk_cat_elm" name="chk_cat_elm" type="checkbox"  <?=$checked?>  value="" onchange="chk_stat_pyct()" class="make-switch" data-size="small" data-on-color="success">
																</div>
															</div>
													</div>

													<div class="col-md-12">
		                             <div class="form-group">
		                                  <label for="lineas">Líneas</label>
		                                  <input value="<?=$proyecto[0]->lineas?>" type="text" class="form-control" id="lineas" name="lineas" placeholder="Líneas">
		                             </div>
		                      </div>
													<div class="col-md-12">
		                             <div class="form-group">
		                                  <label for="area">Área</label>
		                                  <input value="<?=$proyecto[0]->area?>" type="text" class="form-control" id="area" name="area" placeholder="Área">
		                             </div>
		                      </div>
                       </div>
                       	<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label for="proyecto">Proyecto</label>
															<textarea type="text" class="form-control" id="proyecto" name="proyecto" placeholder="Proyecto"><?=$proyecto[0]->proyecto?></textarea>
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<label for="descripcion">Descripción</label>
															<textarea type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción"><?=$proyecto[0]->descripcion?></textarea>
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
						<button  class="btn btn-ar btn-success" type="button" onclick="editar_proyecto_do();">Editar</button>
						<button  data-dismiss="modal" class="btn btn-ar btn-default" type="button">Cancelar</button>
					</div>
				</form>
			</div>

			<script>
			$(document).ready(function() {
				$("#m-dropzone-one").dropzone({
					url: "cialc/upload_dropzone/<?=$proyecto[0]->id_proyecto?>",
					paramName: "file",
					maxFiles: 1,
					maxFilesize: 5, // MB
					acceptedFiles: "image/*",
					accept: function(file, done) {
							//console.log(file);
							done();
					},
					init: function() {
						this.on("success", function(statics,file) {
							var img = file.split("|");
							$('#image_actual').html('<center><img src="plugs/timthumb.php?src=content/proyectos/images/'+img[1]+'&w=230"></center>');
						});
					}
				 });
			});
			</script>

		</div>
	</div>
</div>
