<?php if ( ! defined( 'URL_APP' ) ) { exit; } ?>
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title"> Perfil de usuario
                            <small>configuración de cuenta de usuario</small>
                        </h1>
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN PROFILE SIDEBAR -->
                                <div class="profile-sidebar">
                                    <!-- PORTLET MAIN -->
                                    <div class="portlet light profile-sidebar-portlet ">
                                        <!-- SIDEBAR USERPIC -->

                    										<?php
                    										if ($perfil['avatar']){
                    										?>
                                                <div class="profile-userpic" id="avatar_actual">
                                                <img src="plugs/timthumb.php?src=tmp/<?=$avatar?>&w=300" class="img-responsive" alt="">
                    										</div>

                    										<?php
                    										}else{
                    										?>
                                                <div class="profile-userpic" id="avatar_actual">
                                                <img src="assets/pages/media/profile/profile_user.png" class="img-responsive" alt="">
                    										</div>
                    										<?php
                    										}
                    										?>

                                        <!-- END SIDEBAR USERPIC -->
                                        <!-- SIDEBAR USER TITLE -->
                                        <div class="profile-usertitle">
                                            <div class="profile-usertitle-name"> <?=$usuario_name?> </div>
                                            <div class="profile-usertitle-job"> <?=strtolower($credenciales_top['rol'])?> </div><br><br>
                                        </div>
                                        <!-- END SIDEBAR USER TITLE -->
                                    </div>
                                    <!-- END PORTLET MAIN -->
                                </div>
                                <!-- END BEGIN PROFILE SIDEBAR -->
                                <!-- BEGIN PROFILE CONTENT -->
								<form id="editar_perfil">

                  <input type="hidden" value="activo" id="perfil" name="perfil">
                  <input type="hidden" value="<?=$_SESSION['id_usuario']?>" id="id_usuario" name="id_usuario">

									<div class="profile-content">
										<div class="row">
											<div class="col-md-12">
												<div class="portlet light ">
													<div class="portlet-title tabbable-line">
														<div class="caption caption-md">
															<i class="icon-globe theme-font hide"></i>
															<span class="caption-subject font-blue-madison bold uppercase">Perfil de <?=$usuario_name?></span>
														</div>
														<ul class="nav nav-tabs">
															<li class="active">
																<a href="#tab_1_1" data-toggle="tab">Usuario</a>
															</li>
															<li>
																<a href="#tab_1_2" data-toggle="tab">Configuración</a>
															</li>
															<li>
																<a href="#tab_1_3" data-toggle="tab">Contraseña</a>
															</li>
														</ul>
													</div>
													<div class="portlet-body">
														<div class="tab-content">
															<!-- PERSONAL INFO TAB -->
															<div class="tab-pane active" id="tab_1_1">
																<div class="row">
																	<div class="space-10"></div>
																	<?php
																	if($this->tiene_permiso('Usuarios|upload_avatar')){
																	?>
																	<div class="col-xs-12 col-sm-4">

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

																	<div class="vspace-xs"></div>
																	<?php
																	}
																	?>
																	<div class="col-xs-12 col-sm-8">
																		<div class="form-group">
																			<label class="col-sm-4 control-label no-padding-right" for="form-field-username">Nombre de usuario</label>

																			<div class="col-sm-8">
																				<input readonly class="form-control" type="text" id="usuario" name="usuario" placeholder="Usuario" value="<?=$usuario['usuario']?>" /><br>
																			</div>
																		</div>

																		<div class="space-4"></div>

																		<div class="form-group">
																			<label class="col-sm-4 control-label no-padding-right" for="form-field-first">Nombre</label>

																			<div class="col-sm-8">
																				<input class="form-control" type="text" id="nombres" name="nombres" placeholder="Nombre (s)" value="<?=$usuario['nombres']?>" /><br>
																				<input class="form-control" type="text" id="apellido_paterno" name="apellido_paterno" placeholder="apellido paterno" value="<?=$usuario['apellido_paterno']?>" /><br>
																				<input class="form-control" type="text" id="apellido_materno" name="apellido_materno" placeholder="apellido materno" value="<?=$usuario['apellido_materno']?>" /><br>
																			</div>
																		</div>

																		<div class="form-group">
																			<label class="col-sm-4 control-label no-padding-right" for="form-field-first">Correo</label>

																			<div class="col-sm-8">
																				<input class="form-control" type="email" id="correo" name="correo" placeholder="Correo" value="<?=$usuario['correo']?>" />
																			</div>
																		</div>

																	</div>
																</div>
															</div>
															<!-- END PERSONAL INFO TAB -->
															<!-- CHANGE AVATAR TAB -->
															<div class="tab-pane" id="tab_1_2">
																<div class="row">
																	<div class="space-10"></div>

																	<div>
																		<label class="inline">
																			<input <?php $perfil['activar_paginado'] == 't' ? print 'checked' : print  '' ;?> type="checkbox" name="activar_paginado" id="activar_paginado" class="make-switch" data-size="small" data-on-color="success" />
																			<span class="lbl">Establecer el páginado de forma predeterminada </span>
																		</label>
																		<script>
																		$(".make-switch").bootstrapSwitch();
																		</script>
																		<label class="inline">
																			<span class="space-2 block"></span>

																			en
																			<input type="text" id="paginacion" name="paginacion" class="input-mini" maxlength="3" value="<?=$perfil['paginacion']?>"/>
																			registros por página
																		</label>
																	</div>
																</div>
															</div>
															<!-- END CHANGE AVATAR TAB -->
															<!-- CHANGE PASSWORD TAB -->
															<div class="tab-pane" id="tab_1_3">
																<div class="row">
																	<div class="space-10"></div>

																	<div class="form-group">
																		<label class="col-md-3 col-md-offset-6 control-label no-padding-right" for="form-field-pass1">Nueva contraseña</label>

																		<div class="col-md-3">
																			<input class="form-control" type="password" id="password" name="password" value="no_seas_miron" /><br>
																		</div>
																	</div>

																	<div class="space-4"></div>

																	<div class="form-group">
																		<label class="col-md-3 col-md-offset-6 control-label no-padding-right" for="form-field-pass2">Confirmar contraseña</label>

																		<div class="col-md-3">
																			<input class="form-control" type="password" id="password2" name="password2" value="no_seas_miron" />
																		</div>
																	</div>
																</div>
															</div>
															<!-- END CHANGE PASSWORD TAB -->
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>


                  <?php
									if($this->tiene_permiso('Usuarios|editar_perfil')){
									?>
									<div class="clearfix form-actions">
										<div class="col-md-offset-10 col-md-2">
											<button id="send_info" onclick="editar_perfil();" class="btn green" type="button">
												Guardar
											</button>
										</div>
									</div>
									<?php
									}
									?>

								</form>
                            </div>
                        </div>
                                <!-- END PROFILE CONTENT -->
					</div>
				</div>
<script>
$(document).ready(function() {
  $("#m-dropzone-one").dropzone({
    url: "usuarios/upload_dropzone/<?=$_SESSION['id_usuario']?>",<?php //usuarios/upload_dropzone/estructura|del|directorio/permisos ?>
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
        $('#avatar_actual').html('<center><img src="plugs/timthumb.php?src=tmp/'+img[0]+'&w=230"></center>');
  			$('#avatar_top').attr('src','plugs/timthumb.php?src=tmp/' + img[0] + '&w=32&h=32&a=t');
      });
    }
   });
});
</script>
