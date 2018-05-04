<?php if ( ! defined( 'URL_APP' ) ) { exit; } ?>
<div class="modal fade" id="myModal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
                     <?php foreach($elm as $ban){ ?>
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"+ aria-hidden="true">x</button>
				<h4 class="modal-title" id="myModalLabel">
					Editando a <?=$ban->name?>:
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
                                     <?php if(!$ban->url_full){ ?>
                                            <div id="banner_actual">
                                                <img src="http://ipsumimage.appspot.com/285x190?l=278x295" class="img-responsive" alt="">
          			                            </div>
                                     <?php }else{ ?>
                                            <div id="banner_actual">
                                                <img src="plugs/timthumb.php?src=content/banners/novedades/<?=$ban->url_full?>&w=280"  alt="">
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

								<div class="col-md-12">
											 <div class="row">
															<div class="col-md-6">
																		 <div class="form-group">
																					<label for="name">Nombre</label>
																					<input value="<?=$ban->name?>" type="text" class="form-control" id="name" name="name" placeholder="Nombre">
																		 </div>
															</div>
															<div class="col-md-6">
																		 <div class="form-group">
																					<label for="alternativo">Texto alternativo</label>
																					<input value="<?=$ban->alternativo?>" type="text" class="form-control" id="alternativo" name="alternativo" placeholder="Texto alternativo">
																		 </div>
															</div>
											 </div>
											 <div class="row">
                              <div class="col-md-12">
                                     <div class="form-group">
                                          <label for="url_link">URL Libros UNAM</label>
                                          <input value="<?=$ban->url_link?>" type="text" class="form-control" id="url_link" name="url_link" placeholder="URL Libros UNAM">
                                     </div>
                              </div>
                       </div>
											 <div class="row">
															<div class="col-md-12">
																		 <div class="form-group">
																					<label for="descripcion">Descripción</label>
																					<textarea type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción"><?=$ban->descripcion?></textarea>
																		 </div>
															</div>
											 </div>

								</div>

								<div class="col-md-4">
									  <div class="form-group">
											<label for="cat_status">Habilitado</label>
											<div class="checkbox">
                        <?php $checked = ($ban->status == 3)?'checked':''; ?>
												<input id="chk_cat_elm" name="chk_cat_elm" type="checkbox" <?=$checked?> value="" style="position:relative; left:20px;" onchange="chk_stat_elm()" class="make-switch" data-size="small" data-on-color="success">
											</div>
									  </div>

								</div>
								<div class="col-md-2">
									<label for="orden">Orden</label>
									<input value="<?=$ban->orden?>" style="margin-top: 10px;" type="text" placeholder="Orden" id="orden" name="orden" class="form-control">
								</div>
								<div class="col-md-6">&nbsp;</div>
							</div>
						</div>
					</div>
						<script>
						$(".make-switch").bootstrapSwitch();
						</script>

					<div id="error_alerta" > </div>

					<input type="hidden" id="status" name="status" value="<?=$ban->status?>">
          <input type="hidden" id="id" name="id" value="<?=$ban->id?>">

					<div class="modal-footer">
						<button  class="btn btn-ar btn-success" type="button" onclick="editar_banner_nov();">Guardar</button>
						<button  data-dismiss="modal" class="btn btn-ar btn-default" type="button">Cancelar</button>
					</div>
				</form>
			</div>
                     <script>
										 $(document).ready(function() {
											 $("#m-dropzone-one").dropzone({
												 url: "bannernovedades/upload_dropzone/<?=$ban->id?>",
												 paramName: "file",
												 maxFiles: 1,
												 maxFilesize: 20, // MB 
												 acceptedFiles: "image/*",
												 accept: function(file, done) {
														 //console.log(file);
														 done();
												 },
												 init: function() {
													 this.on("success", function(statics,file) {
														 var img = file.split("|");
														 $('#banner_actual').html('<center><img src="plugs/timthumb.php?src=content/banners/novedades/'+img[1]+'&w=280"></center>');
													 });
												 }
												});
										 });
                     </script>
                     <?php } ?>
		</div>
	</div>
</div>
