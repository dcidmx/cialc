<?php if ( ! defined( 'URL_APP' ) ) { exit; } ?>
<div class="modal fade" id="myModal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
                     <?php foreach($elm as $dir){ ?>
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"+ aria-hidden="true">x</button>
				<h4 class="modal-title" id="myModalLabel">
					Editando a <?=$dir->nombre?>:
				</h4>
			</div>
			<div class="modal-body" id="modal_content">
				<form role="form" id="elemento_editado">
					<div class="panel panel-primary">
						<div class="panel-body">
							<div class="row">
                                                        <div class="col-md-12">
                                                               <div class="row">
                                                                      <div class="col-md-6">
                                                                             <?php if($dir->image == 'default'){ ?>
                                                                                    <div class="profile-userpic" id="avatar_actual">
                                                                                        <img src="<?=URL_PUBLIC?>frontend/images/directorio/timthumb.png" class="img-responsive" alt="">
                                            						</div>
                                                                             <?php }else{ ?>
                                                                                    <div class="profile-userpic" id="avatar_actual">
                                                                                        <img src="<?=URL_PUBLIC?>frontend/images/directorio/<?=$dir->image?>" class="img-responsive" alt="">
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
                                                                      <div class="col-md-6">
                                                                             <div class="form-group">
                                                                                  <label for="nivel_primario">Nivel menú</label>
                                                                                  <input type="text" class="form-control" id="nivel_primario" name="nivel_primario" placeholder="Nivel de menú" value="<?=$dir->nivel_primario?>">
                                                                             </div>
                                                                      </div>
                                                                      <div class="col-md-6">
                                                                             <div class="form-group">
                                                                                  <label for="nivel_filtro">Nivel filtro</label>
                                                                                  <input type="text" class="form-control" id="nivel_filtro" name="nivel_filtro" placeholder="Nivel de filtro" value="<?=$dir->nivel_filtro?>">
                                                                             </div>
                                                                      </div>
                                                                      <div class="col-md-6">
                                                                             <div class="form-group">
                                                                                  <label for="nombre">Nombre</label>
                                                                                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?=$dir->nombre?>">
                                                                             </div>
                                                                      </div>
                                                                      <div class="col-md-6">
                                                                             <div class="form-group">
                                                                                  <label for="cargo">Cargo</label>
                                                                                  <input type="text" class="form-control" id="cargo" name="cargo" placeholder="Cargo" value="<?=$dir->cargo?>">
                                                                             </div>
                                                                      </div>
                                                               </div>
									  <div class="form-group">
										<label for="informacion">Información</label>
										<input type="text" class="form-control" id="informacion" name="informacion" placeholder="Información" value="<?=$dir->informacion?>">
									  </div>
                                                                 <div class="row">
                                                                        <div class="col-md-6">
                                                                               <div class="form-group">
                                                                                    <label for="correo1">Correo 1</label>
                                                                                    <input type="text" class="form-control" id="correo1" name="correo1" placeholder="Correo 1" value="<?=$dir->correo1?>">
                                                                               </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                               <div class="form-group">
                                                                                    <label for="correo2">Correo 2</label>
                                                                                    <input type="text" class="form-control" id="correo2" name="correo2" placeholder="Correo 2" value="<?=$dir->correo2?>">
                                                                               </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                               <div class="form-group">
                                                                                    <label for="correo3">Correo 3</label>
                                                                                    <input type="text" class="form-control" id="correo3" name="correo3" placeholder="Correo 3" value="<?=$dir->correo3?>">
                                                                               </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                               <div class="form-group">
                                                                                    <label for="correo4">Correo 4</label>
                                                                                    <input type="text" class="form-control" id="correo4" name="correo4" placeholder="Correo 4" value="<?=$dir->correo4?>">
                                                                               </div>
                                                                        </div>
                                                                 </div>
                                                                 <div class="row">
                                                                        <div class="col-md-9">
                                                                               <div class="form-group">
              										<label for="tel1">Teléfono 1</label>
              										<input type="text" class="form-control" id="tel1" name="tel1" placeholder="Teléfono 1" value="<?=$dir->tel1?>">
              									  </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                               <div class="form-group">
              										<label for="ext1">Extensión</label>
              										<input type="text" class="form-control" id="ext1" name="ext1" placeholder="Extensión" value="<?=$dir->ext1?>">
              									  </div>
                                                                        </div>
                                                                        <div class="col-md-9">
                                                                               <div class="form-group">
              										<label for="tel2">Teléfono 2</label>
              										<input type="text" class="form-control" id="tel2" name="tel2" placeholder="Teléfono 2" value="<?=$dir->tel2?>">
              									  </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                               <div class="form-group">
              										<label for="ext2">Extensión</label>
              										<input type="text" class="form-control" id="ext2" name="ext2" placeholder="Extensión" value="<?=$dir->ext2?>">
              									  </div>
                                                                        </div>
                                                                        <div class="col-md-9">
                                                                               <div class="form-group">
              										<label for="tel3">Teléfono 3</label>
              										<input type="text" class="form-control" id="tel3" name="tel3" placeholder="Teléfono 3" value="<?=$dir->tel3?>">
              									  </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                               <div class="form-group">
              										<label for="ext3">Extensión</label>
              										<input type="text" class="form-control" id="ext3" name="ext3" placeholder="Extensión" value="<?=$dir->ext3?>">
              									  </div>
                                                                        </div>
                                                                 </div>
								</div>

								<div class="col-md-6">
									  <div class="form-group">
											<label for="cat_status">Habilitado</label>
											<div class="checkbox">
                                                                                    <?php $checked = ($dir->cat_status == 3)?'checked':''; ?>
												<input id="chk_cat_elm" name="chk_cat_elm" type="checkbox" <?=$checked?> value="" style="position:relative; left:20px;" onchange="chk_stat_elm()" class="make-switch" data-size="small" data-on-color="success">
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

					<input type="hidden" id="cat_status" name="cat_status" value="<?=$dir->cat_status?>">
                                   <input type="hidden" id="id_directorio" name="id_directorio" value="<?=$dir->id_directorio?>">

					<div class="modal-footer">
						<button  class="btn btn-ar btn-success" type="button" onclick="guardar_dir();">Guardar</button>
						<button  data-dismiss="modal" class="btn btn-ar btn-default" type="button">Cancelar</button>
					</div>
				</form>
			</div>
                     <script>
										 $(document).ready(function() {
										   $("#m-dropzone-one").dropzone({
										     url: "directorio/upload_dropzone/<?=$dir->id_directorio?>",
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
										         $('#avatar_actual').html('<center><img src="plugs/timthumb.php?src=frontend/images/directorio/'+img[1]+'&w=230"></center>');
										       });
										     }
										    });
										 });
										 </script>
                     <?php } ?>
		</div>
	</div>
</div>
